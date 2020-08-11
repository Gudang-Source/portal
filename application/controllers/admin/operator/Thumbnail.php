<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Thumbnail extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        login();
        operator();
		$this->load->model('admin/operator/thumbnail_m');
	}

	public function index(){
		$this->template->load('admin/template', 'admin/operator/thumbnail/index');
    }
    
	function proses(){
        $post = $this->input->post(null, TRUE);
        if (isset($post['up_thumbnail'])) {
            $this->thumbnail_m->update($post);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('succes', 'Data Thumbail Informasi Berhasil Diperbaharui, <br> Silahkan periksa kembali... !');
                redirect('admin/operator/thumbnail');
            }else{
                $this->session->set_flashdata('error', 'Maaf, Data Thumbail Informasi Gagal Diperbaharui, <br> Silahkan periksa kembali !!!');
                redirect('admin/operator/thumbnail');
            }
        }
    }

}
