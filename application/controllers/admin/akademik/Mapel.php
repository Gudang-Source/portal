<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mapel extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        login();
        akademik();
        $this->load->model('admin/akademik/mapel_m');
    }

    public function index()
    {
        $query['row'] = $this->mapel_m->get();
        $this->template->load('admin/template', 'admin/akademik/mapel/index', $query);
    }

    public function insert()
    {
        $this->template->load('admin/template', 'admin/akademik/mapel/form');
    }

    public function update($id)
    {
        $query['row'] = $this->mapel_m->get($id)->row();
        $this->template->load('admin/template', 'admin/akademik/mapel/form', $query);
    }

    function proses()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['insert'])) {
            $this->mapel_m->insert($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', " Data Mata Pelajaran Baru berhasil Ditambahkan");
                redirect('admin/akademik/mapel');
            } else {
                $this->session->set_flashdata('error', " Data Mata Pelajaran Baru Gagal Ditambahkan");
                redirect('admin/akademik/mapel/insert');
            }
        } else if (isset($post['update'])) {
            $this->mapel_m->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', " Data Mata Pelajaran berhasil Diperbaharui");
                redirect('admin/akademik/mapel');
            } else {
                $this->session->set_flashdata('error', " Data Mata Pelajaran Gagal Diperbaharui");
                redirect('admin/akademik/mapel/update/' . $post['id']);
            }
        }
    }

    function delete($id)
    {
        $this->mapel_m->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', " Data Mata Pelajaran berhasil Dihapus");
            redirect('admin/akademik/mapel');
        } else {
            $this->session->set_flashdata('error', " Data Mata Pelajaran Gagal Dihapus");
            redirect('admin/akademik/mapel');
        }
    }
}
