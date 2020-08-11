<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_admin extends CI_Controller {
	
	function __construct(){
        parent::__construct();
        login();
        operator();
        $this->load->model('admin/operator/user_admin_m');
	}

	public function index(){
        $data['row'] = $this->user_admin_m->get();
		$this->template->load('admin/template', 'admin/operator/user_admin/index', $data);
    }

    function switch($id){
        $query = $this->user_admin_m->get($id)->row();

        if($query->status_user_admin == 1){
            $status = 0;
        }else if($query->status_user_admin == 0){
            $status = 1;
        }
        $params = [
            'id' => $query->id_user_admin,
            'status' => $status,
        ];

        $this->user_admin_m->switch($params);
        redirect('admin/operator/user_admin');
    }

    public function insert(){
        $user = new stdClass;
        $user->id_user_admin = null;
        $user->role_user_admin = null;
        $user->nama_depan_user_admin = null;
        $user->nama_belakang_user_admin = null;
        $user->email_user_admin = null;
        $user->telepon_admin = null;
        $user->tempat_lahir_admin = null;
        $user->tanggal_lahir_admin = null;
        $user->gender_admin = null;
        $user->alamat_admin = null;
        $user->username_user_admin = null;
        $data['row'] = $user;
        $this->template->load('admin/template', 'admin/operator/user_admin/form', $data);
    }

    public function update($id){
        $data['row'] = $this->user_admin_m->get($id)->row();
        $this->template->load('admin/template', 'admin/operator/user_admin/form', $data);
    }

    function proses(){
        $post = $this->input->post(null, true);
        if (isset($post['insert'])) {
            $this->user_admin_m->add($post);
            if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', " Data Pengelola Sekolah Berhasil ditambahkan ");
                redirect('admin/operator/user_admin');
            }else{
                $this->session->set_flashdata('error', " Data Pengelola Sekolah Gagal ditambahkan, Silahkan periksa kembali");
                redirect('admin/operator/user_admin/insert');
            }
        }else if(isset($post['update'])){
            $this->user_admin_m->edit($post);
            if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', " Data Pengelola Sekolah Berhasil diperbaharui ");
                redirect('admin/operator/user_admin');
            }else{
                $this->session->set_flashdata('error', " Data Pengelola Sekolah Gagal diperbaharui, Silahkan periksa kembali");
                redirect('admin/operator/user_admin/update/'.$post['id']);
            }
        }
    }

    function delete($id){
        $this->user_admin_m->del($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', " Data Pengelola Sekolah Berhasil dihapus ");
            redirect('admin/operator/user_admin');
        }else{
            $this->session->set_flashdata('error', " Data Pengelola Sekolah Gagal dihapus, Silahkan periksa kembali");
            redirect('admin/operator/user_admin');
        }
    }

}

?>  