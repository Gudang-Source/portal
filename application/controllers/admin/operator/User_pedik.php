<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_pedik extends CI_Controller {
	
	function __construct(){
        parent::__construct();
        login();
        operator();
        $this->load->model('admin/operator/user_pedik_m');
	}

	public function index(){
        $data['row'] = $this->user_pedik_m->get();
		$this->template->load('admin/template', 'admin/operator/user_pedik/index', $data);
    }

    function switch($id){
        $query = $this->user_pedik_m->get($id)->row();

        if($query->status_user == 1){
            $status = 0;
        }else if($query->status_user == 0){
            $status = 1;
        }
        $params = [
            'id' => $query->id_user,
            'status' => $status,
        ];

        $this->user_pedik_m->switch($params);
        redirect('admin/operator/user_pedik');
    }

    public function insert(){
        $this->template->load('admin/template', 'admin/operator/user_pedik/form');
    }

    public function update($id){
        $data['row'] = $this->user_pedik_m->get($id)->row();
        $this->template->load('admin/template', 'admin/operator/user_pedik/form', $data);
    }

    function proses(){
        $post = $this->input->post(null, true);
        if (isset($post['insert'])) {
            $query = get_peserta_nisn($post['up_nisn']);
            if($query->num_rows() > 0){
                $post['id'] = random_string('alnum',10).''.date('dmy');
                $this->user_pedik_m->add($post);
                if($this->db->affected_rows() > 0) {
                    $this->user_pedik_m->add_user_siswa($post);
                    $this->session->set_flashdata('succes', " Data User Peserta Didik Berhasil ditambahkan ");
                    redirect('admin/operator/user_pedik');
                }else{
                    $this->session->set_flashdata('nisn',$post['up_nisn']);
                    $this->session->set_flashdata('email',$post['up_email']);
                    $this->session->set_flashdata('error', " Data User Peserta Didik Gagal ditambahkan, Silahkan periksa kembali");
                    redirect('admin/operator/user_pedik/insert');
                }
            }else{
                $this->session->set_flashdata('c_nisn', " NISN Tidak terdaftar, Silahkan Hunungi Bagian Tata Usaha ");
                $this->session->set_flashdata('nisn',$post['up_nisn']);
                $this->session->set_flashdata('email',$post['up_email']);
                redirect('admin/operator/user_pedik/insert');
            }
           
        }else if(isset($post['update'])){
            $this->user_pedik_m->update($post);
            if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', " Data User Peserta Didik Berhasil diperbaharui ");
                redirect('admin/operator/user_pedik');
            }else{
                $this->session->set_flashdata('error', " Data User Peserta Didik Gagal diperbaharui, Silahkan periksa kembali");
                redirect('admin/operator/user_pedik/update/'.$post['id']);
            }
        }
    }

    function delete($id){
        $this->user_pedik_m->del($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', " Data User Peserta Didik Berhasil dihapus ");
            redirect('admin/operator/user_pedik');
        }else{
            $this->session->set_flashdata('error', " Data User Peserta Didik Gagal dihapus, Silahkan coba lagi");
            redirect('admin/operator/user_pedik');
        }
    }

    public function log_user($id){
        $data['row'] = $this->user_pedik_m->log_activity($id);
        $this->template->load('admin/template', 'admin/operator/user_pedik/log_activity', $data);
	}

}
