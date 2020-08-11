<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        login();
        multi_admin();
        $this->load->model('admin/operator/sekolah_m');
	}

	public function index(){
        $data['row'] = $this->sekolah_m->get()->row();
		$this->template->load('admin/template', 'admin/operator/sekolah/index', $data);
    }
    
    function proses(){
        $post = $this->input->post(null, TRUE);
        if (isset($post['sekolah'])) {
            $this->sekolah_m->update($post);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('succes', 'Data Profil Sekolah Berhasil Diperbaharui, Silahkan periksa kembali... !');
                redirect('admin/operator/sekolah');
            }else{
                $this->session->set_flashdata('error', 'Maaf, Data Profil Sekolah Gagal Diperbaharui, Silahkan periksa kembali !!!');
                redirect('admin/operator/sekolah');
            }
        }
    }

    public function logo(){
        $data['row'] = $this->sekolah_m->get()->row();
		$this->template->load('admin/template', 'admin/operator/sekolah/logo', $data);
    }

    function logo_proses(){
        $post = $this->input->post(null, TRUE);
        if (isset($post['logo'])) {
            $config['upload_path']    = './assets/uploads/sekolah';
            $config['allowed_types']  = 'gif|jpg|png|jpeg';
            $config['max_size']       = 10048;
            $config['file_name']       = 'sekolah_'.date('Ymd');
            $this->load->library('upload', $config);
            $gambar = $this->upload->do_upload('image');

            if($gambar == true){
                $pp_sekolah = $this->sekolah_m->get($post['id'])->row();
                if($pp_sekolah->logo_sekolah != null){
                    $target_file = './assets/uploads/sekolah/'.$pp_sekolah->logo_sekolah;
                    unlink($target_file); 
                    $post['image'] = $this->upload->data('file_name');
                }
                $this->sekolah_m->update_logo($post);
                if($this->db->affected_rows() > 0){
                    $this->session->set_flashdata('succes', 'Data Logo Sekolah Berhasil Diperbaharui, Silahkan periksa kembali... !');
                    redirect('admin/operator/sekolah/logo');
                }else{
                    $this->session->set_flashdata('error', 'Maaf, Data Logo Sekolah Gagal Diperbaharui, Silahkan periksa kembali !!!');
                    redirect('admin/operator/sekolah/logo');
                }
            }else{
                $this->session->set_flashdata('warning', 'Maaf, tidak ada data Logo sekolah yang di upload, silahkan periksa kembali !!!');
                redirect('admin/operator/sekolah/logo');
            }
        }
    }
    
	
}
