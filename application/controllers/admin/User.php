<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct(){
		parent::__construct();
		$this->load->model('admin/user_m');
		$this->load->helper('string');
		login();
	}

	function profil(){
		$role = $this->uri->segment(2);
		$id = $this->session->userdata('userid');

		$data = $this->user_m->get_user($id);
		if($data->num_rows() > 0){
            $row['row'] = $data->row();
			$this->template->load('admin/template','admin/auth/profil', $row);
		}else{
			redirect('admin/'.$role,'/dashboard');
		}
	}

	function update_profile(){
		$post = $this->input->post(null, TRUE);

		$config['upload_path']    = './assets/uploads/admin';
		$config['allowed_types']  = 'gif|jpg|png|jpeg';
		$config['max_size']       = 2048;
		$config['file_name']       = 'admin_'.random_string('alnum', 12);
		$this->load->library('upload', $config);
		$gambar = $this->upload->do_upload('image');

		if($gambar == true){
			$pp_user = $this->user_m->get_user($post['id'])->row();
			if($pp_user->image_user_admin != null){
				$target_file = './assets/uploads/admin/'.$pp_user->image_user_admin;
				unlink($target_file); 
				$post['image'] = $this->upload->data('file_name');
			}else if($pp_user->image_user_admin == null){
				$post['image'] = $this->upload->data('file_name');
			}
		}else{
			$pp_user = $this->user_m->get_user($post['id'])->row();
			$post['image'] = $pp_user->image_user_admin;
		}
		$this->user_m->update_profile($post);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('succes', 'Data Profil Berhasil Diperbaharui, Silahkan periksa kembali... !');
			redirect('admin/user/profil');
		}else{
			$this->session->set_flashdata('error', 'Maaf, Data Profil Gagal Diperbaharui, Silahkan periksa kembali !!!');
			redirect('admin/user/profil');
		}
	}

	function del_image(){
		$id = $this->session->userdata('userid');
		$pp_user = $this->user_m->get_user($id)->row();
		$target_file = './assets/uploads/admin/'.$pp_user->image_user_admin;
		unlink($target_file); 
		$this->user_m->del_image($id);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('succes', 'Data Image Profil Berhasil Diperbaharui, Silahkan periksa kembali... !');
			redirect('admin/user/profil');
		}else{
			$this->session->set_flashdata('error', 'Maaf, Data Image Profil Gagal Diperbaharui, Silahkan periksa kembali !!!');
			redirect('admin/user/profil');
		}
	}

	public function log_user($id = null){
        $data['row'] = $this->user_m->log_activity($id);
        $this->template->load('admin/template', 'admin/auth/log_activity', $data);
	}
	
	function forced($id){
        forced_logout($id);
        redirect('admin/user/log_user/'.$id);
    }
}

?>