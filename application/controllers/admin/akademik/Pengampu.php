<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pengampu extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        login();
        akademik();
        $this->load->model('admin/tata_usaha/kelas_m');
        $this->load->model('admin/tata_usaha/pendidik_m');
        $this->load->model('admin/akademik/mapel_m');
        $this->load->model('admin/akademik/pengampu_m');
    }

    public function index()
    {
        $first_class = $this->kelas_m->get()->row();
        redirect('admin/akademik/pengampu/data/' . $first_class->id_kelas);
    }

    public function data($id = null)
    {
        $data = [
            'kelas' => $this->kelas_m->get(),
            'row' => $this->pengampu_m->get_by_kelas($id, ta()->id_ta)
        ];
        $this->template->load('admin/template', 'admin/akademik/pengampu/index', $data);
    }

    public function insert($id)
    {
        $data = [
            'id_kelas' => $id,
            'mapel' => $this->mapel_m->get(),
            'pendidik' => $this->pendidik_m->get(),
        ];
        $this->template->load('admin/template', 'admin/akademik/pengampu/form', $data);
    }

    public function update($id)
    {
        $data = [
            'mapel' => $this->mapel_m->get(),
            'pendidik' => $this->pendidik_m->get(),
            'row' => $this->pengampu_m->get_by_id($id)->row()
        ];
        $this->template->load('admin/template', 'admin/akademik/pengampu/form', $data);
    }

    function proses()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['insert'])) {
            $this->pengampu_m->insert($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', " Data Pengampu Mata Pelajaran Baru berhasil Ditambahkan");
                redirect('admin/akademik/pengampu/data/' . $post['id_kelas']);
            } else {
                $this->session->set_flashdata('error', " Data Pengampu Mata Pelajaran Baru Gagal Ditambahkan");
                redirect('admin/akademik/pengampu/insert/' . $post['id_kelas']);
            }
        } else if (isset($post['update'])) {
            $this->pengampu_m->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', " Data Pengampu Mata Pelajaran berhasil Diperbaharui");
                redirect('admin/akademik/pengampu/data/' . $post['id_kelas']);
            } else {
                $this->session->set_flashdata('error', " Data Pengampu Mata Pelajaran Gagal Diperbaharui");
                redirect('admin/akademik/pengampu/update/' . $post['id']);
            }
        }
    }

    function delete($id, $id_kelas)
    {
        $this->pengampu_m->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', " Data Pengampu Mata Pelajaran berhasil Dihapus");
            redirect('admin/akademik/pengampu/data/' . $id_kelas);
        } else {
            $this->session->set_flashdata('error', " Data Pengampu Mata Pelajaran Gagal Dihapus");
            redirect('admin/akademik/pengampu/data/' . $id_kelas);
        }
    }
}
