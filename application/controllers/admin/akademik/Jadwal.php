<?php defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        login();
        akademik();
        // $this->load->model('admin/akademik/jadwal_m');
    }

    public function index()
    {
        $data = [
            'row' => null
        ];
        $this->template->load('admin/template', 'admin/akademik/jadwal/index', $data);
    }

    public function insert($day)
    {
        $data['day'] = $day;
        $this->template->load('admin/template', 'admin/akademik/jadwal/form', $data);
    }

    public function update($day, $id)
    {
        $data = [
            'row' => $this->jadwal_m->get_by_id($id)->row(),
            'day' => $day
        ];
        $this->template->load('admin/template', 'admin/akademik/jadwal/form', $data);
    }

    function proses()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['insert'])) {
            $this->jadwal_m->insert($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', " Data Mata Pelajaran Baru berhasil Ditambahkan");
                redirect('admin/akademik/jadwal/hari/' . $post['j_day']);
            } else {
                $this->session->set_flashdata('error', " Data Mata Pelajaran Baru Gagal Ditambahkan");
                redirect('admin/akademik/jadwal/insert/' . $post['j_day']);
            }
        } else if (isset($post['update'])) {
            $this->jadwal_m->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', " Data Mata Pelajaran berhasil Diperbaharui");
                redirect('admin/akademik/jadwal/hari/' . $post['j_day']);
            } else {
                $this->session->set_flashdata('error', " Data Mata Pelajaran Gagal Diperbaharui");
                redirect('admin/akademik/jadwal/update/' . $post['id']);
            }
        }
    }

    function delete($day, $id)
    {
        $this->jadwal_m->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', " Data Mata Pelajaran berhasil Dihapus");
            redirect('admin/akademik/jadwal/hari/' . $day);
        } else {
            $this->session->set_flashdata('error', " Data Mata Pelajaran Gagal Dihapus");
            redirect('admin/akademik/jadwal/hari/' . $day);
        }
    }
}
