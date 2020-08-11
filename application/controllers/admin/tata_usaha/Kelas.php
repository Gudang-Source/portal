<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        login();
        tata_usaha();
        $this->load->model('admin/tata_usaha/kelas_m');
    }

    public function index()
    {
        $data['row'] = $this->kelas_m->get();
        $this->template->load('admin/template', 'admin/tata_usaha/kelas/index', $data);
    }

    public function insert()
    {
        $this->template->load('admin/template', 'admin/tata_usaha/kelas/form');
    }

    public function update($id)
    {
        if ($id != null) {
            $query = $this->kelas_m->get($id)->row();
            $data = [
                'count' => 1,
                'row' => $query
            ];
            $this->template->load('admin/template', 'admin/tata_usaha/kelas/form', $data);
        } else {
            redirect('admin/tata_usaha/pedik');
        }
    }

    function proses()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['insert'])) {
            $this->kelas_m->insert($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', " Data Kelas Baru berhasil Ditambahkan");
                redirect('admin/tata_usaha/kelas');
            } else {
                $this->session->set_flashdata('error', " Data Kelas Baru Gagal Ditambahkan");
                redirect('admin/tata_usaha/kelas/insert');
            }
        } else if (isset($post['update'])) {
            $this->kelas_m->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', " Data Kelas berhasil Diperbaharui");
                redirect('admin/tata_usaha/kelas');
            } else {
                $this->session->set_flashdata('error', " Data Kelas Gagal Diperbaharui");
                redirect('admin/tata_usaha/kelas/update/' . $post['id']);
            }
        }
    }

    function delete($id)
    {
        $this->kelas_m->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', " Data Peserta Didik berhasil Dihapus");
            redirect('admin/tata_usaha/kelas');
        } else {
            $this->session->set_flashdata('error', " Data Peserta Didik Gagal Dihapus");
            redirect('admin/tata_usaha/kelas');
        }
    }
}
