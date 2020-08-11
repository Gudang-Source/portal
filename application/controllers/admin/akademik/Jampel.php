<?php defined('BASEPATH') or exit('No direct script access allowed');

class Jampel extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        login();
        akademik();
        $this->load->model('admin/akademik/jampel_m');
    }

    public function hari($day)
    {
        $data = [
            'row' => $this->jampel_m->get_by_day($day)
        ];
        $this->template->load('admin/template', 'admin/akademik/jampel/index', $data);
    }

    public function insert($day)
    {
        $data['day'] = $day;
        $this->template->load('admin/template', 'admin/akademik/jampel/form', $data);
    }

    public function update($day, $id)
    {
        $data = [
            'row' => $this->jampel_m->get_by_id($id)->row(),
            'day' => $day
        ];
        $this->template->load('admin/template', 'admin/akademik/jampel/form', $data);
    }

    function proses()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['insert'])) {
            $this->jampel_m->insert($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', " Data Mata Pelajaran Baru berhasil Ditambahkan");
                redirect('admin/akademik/jampel/hari/' . $post['j_day']);
            } else {
                $this->session->set_flashdata('error', " Data Mata Pelajaran Baru Gagal Ditambahkan");
                redirect('admin/akademik/jampel/insert/' . $post['j_day']);
            }
        } else if (isset($post['update'])) {
            $this->jampel_m->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', " Data Mata Pelajaran berhasil Diperbaharui");
                redirect('admin/akademik/jampel/hari/' . $post['j_day']);
            } else {
                $this->session->set_flashdata('error', " Data Mata Pelajaran Gagal Diperbaharui");
                redirect('admin/akademik/jampel/update/' . $post['id']);
            }
        }
    }

    function delete($day, $id)
    {
        $this->jampel_m->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', " Data Mata Pelajaran berhasil Dihapus");
            redirect('admin/akademik/jampel/hari/' . $day);
        } else {
            $this->session->set_flashdata('error', " Data Mata Pelajaran Gagal Dihapus");
            redirect('admin/akademik/jampel/hari/' . $day);
        }
    }
}
