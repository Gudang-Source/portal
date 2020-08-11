<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        login_pedik();
        $this->load->model('pelajar/user_m');
	}

	public function index(){
        $id_user = $this->session->userdata('userid');
        $query = $this->user_m->get($id_user);

        $data = [
            'row' => $query->row(),
        ];
		$this->template->load('pelajar/template','pelajar/user/index', $data);
    }
    
    function proses(){
        $post = $this->input->post(null, TRUE);
        if(isset($post['user'])){
            $config['upload_path']    = './assets/uploads/pedik';
            $config['allowed_types']  = 'gif|jpg|png|jpeg';
            $config['max_size']       = 2048;
            $config['file_name']       = $post['p_user'].''.date('dmy');
            $this->load->library('upload', $config);
            $gambar = $this->upload->do_upload('image');

            if($gambar == true){
                $img = $this->user_m->get($post['id'])->row();
                if($img->image_siswa != null){
                    $target_file = './assets/uploads/pedik/'.$img->image_siswa;
                    unlink($target_file); 
                    $post['image'] = $this->upload->data('file_name');
                }else if($img->image_siswa == null){
                    $post['image'] = $this->upload->data('file_name');
                }
                $this->user_m->update_image($post);
            }else{
                $img = $this->user_m->get($post['id'])->row();
                $post['image'] = $img->image_siswa;
                $this->user_m->update_image($post);
            }

            $this->user_m->update($post);
            if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', " Data Profil Akun Berhasil diperbaharui ");
                redirect('pelajar/user?c=1');
            }else{
                $this->session->set_flashdata('error', " Data Profil Akun Gagal diperbaharui, Silahkan periksa kembali");
                redirect('pelajar/user?c=1');
            }
        }else if(isset($post['pass'])){
            if($post['pas_new'] == $post['pas_new_conf']){
                $this->user_m->new_password($post);
                if($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('pas', $post['pas_new']);
                    $this->session->set_flashdata('pas_conf', $post['pas_new_conf']);
                    $this->session->set_flashdata('succes', " Data Password Akun Berhasil diperbaharui ");
                    redirect('pelajar/user?c=2');
                }
            }else{
                $this->session->set_flashdata('error', " Data Password Akun Gagal diperbaharui, <br> Konfirmasi Password tidak sama");
                redirect('pelajar/user?c=2');
            }
        }
    }

	public function log_user(){
        $id = $this->session->userdata('userid');
        $data['row'] = $this->user_m->log_activity($id);
        $this->template->load('pelajar/template', 'pelajar/log_activity', $data);
	}
    
	
}
