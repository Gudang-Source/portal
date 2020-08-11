<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun_ajaran extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		login();
        multi_admin();
        $this->load->model('admin/operator/ta_m');
	}

	public function index(){
        $query = $this->ta_m->get();
        $data['row'] = $query;
		$this->template->load('admin/template', 'admin/operator/ta/index', $data);
	}

	public function insert(){
		$this->template->load('admin/template', 'admin/operator/ta/form');
	}

	public function update($id){
		$query = $this->ta_m->get($id);
        $data['row'] = $query->row();
		$this->template->load('admin/template', 'admin/operator/ta/form', $data);
	}

	function proses(){
		$post = $this->input->post(null,TRUE);
		if(isset($post['insert'])){
			$this->ta_m->insert($post);
            if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', " Data Tahun Ajaran Berhasil ditambahkan ");
                redirect('admin/operator/tahun_ajaran');
            }else{
                $this->session->set_flashdata('error', " Data Tahun Ajaran Gagal ditambahkan, Silahkan periksa kembali");
                redirect('admin/operator/tahun_ajaran/insert');
            }
		}else if(isset($post['update'])){
			$this->ta_m->update($post);
            if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', " Data Tahun Ajaran Berhasil diperbaharui ");
                redirect('admin/operator/tahun_ajaran');
            }else{
                $this->session->set_flashdata('error', " Data Tahun Ajaran Gagal diperbaharui, Silahkan periksa kembali");
                redirect('admin/operator/tahun_ajaran/update/'.$post['id']);
            }
		}else{
			redirect('admin/operator/insert');
		}
	}

	function delete($id){
		$this->ta_m->delete($id);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('succes', " Data Tahun Ajaran Berhasil dihapus ");
			redirect('admin/operator/tahun_ajaran');
		}else{
			$this->session->set_flashdata('error', " Data Tahun Ajaran Gagal dihapus");
			redirect('admin/operator/tahun_ajaran');
		}
	}
	
	function on_ta($id){
		nonaktif_ta();
		$this->ta_m->set_ta($id);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('succes', " Data Tahun Ajaran Berhasil Diaktifkan ");
			redirect('admin/operator/tahun_ajaran');
		}else{
			$this->session->set_flashdata('error', " Data Tahun Ajaran Gagal Diaktifkan");
			redirect('admin/operator/tahun_ajaran');
		}
	}
	
}
