<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_pendidik extends CI_Controller {
	
	function __construct(){
        parent::__construct();
        login();
        operator();
        $this->load->model('admin/operator/user_pendidik_m');
	}

	public function index(){
        $data['row'] = $this->user_pendidik_m->get();
		$this->template->load('admin/template', 'admin/operator/user_pendidik/index', $data);
    }

    function switch($id){
        $query = $this->user_pendidik_m->get($id)->row();

        if($query->status_user == 1){
            $status = 0;
        }else if($query->status_user == 0){
            $status = 1;
        }
        $params = [
            'id' => $query->id_user,
            'status' => $status,
        ];

        $this->user_pendidik_m->switch($params);
        redirect('admin/operator/user_pendidik');
    }

    public function insert(){
        $this->template->load('admin/template', 'admin/operator/user_pendidik/form');
    }

    public function update($id){
        $data['row'] = $this->user_pendidik_m->get($id)->row();
        $this->template->load('admin/template', 'admin/operator/user_pendidik/form', $data);
    }

    function proses(){
        $post = $this->input->post(null, true);
        if (isset($post['insert'])) {
            $query = get_pendidik_nip($post['up_nip']);
            if($query->num_rows() > 0){
                $post['id'] = random_string('alnum',14).''.date('dmy');
                $this->user_pendidik_m->add($post);
                if($this->db->affected_rows() > 0) {
                    $this->user_pendidik_m->add_user_pendidik($post);
                    $this->session->set_flashdata('succes', " Data User Tenaga Pendidik Berhasil ditambahkan ");
                    redirect('admin/operator/user_pendidik');
                }else{
                    $this->session->set_flashdata('nip',$post['up_nip']);
                    $this->session->set_flashdata('email',$post['up_email']);
                    $this->session->set_flashdata('error', " Data User Tenaga Pendidik Gagal ditambahkan, Silahkan periksa kembali");
                    redirect('admin/operator/user_pendidik/insert');
                }
            }else{
                $this->session->set_flashdata('c_nip', " NIP Tidak terdaftar, Silahkan Hunungi Bagian Tata Usaha ");
                $this->session->set_flashdata('nip',$post['up_nip']);
                $this->session->set_flashdata('email',$post['up_email']);
                redirect('admin/operator/user_pendidik/insert');
            }
           
        }else if(isset($post['update'])){
            $this->user_pendidik_m->update($post);
            if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', " Data User Tenaga Pendidik Berhasil diperbaharui ");
                redirect('admin/operator/user_pendidik');
            }else{
                $this->session->set_flashdata('error', " Data User Tenaga Pendidik Gagal diperbaharui, Silahkan periksa kembali");
                redirect('admin/operator/user_pendidik/update/'.$post['id']);
            }
        }
    }

    function delete($id){
        $this->user_pendidik_m->del($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', " Data User Tenaga Pendidik Berhasil dihapus ");
            redirect('admin/operator/user_pendidik');
        }else{
            $this->session->set_flashdata('error', " Data User Tenaga Pendidik Gagal dihapus, Silahkan periksa kembali");
            redirect('admin/operator/user_pendidik');
        }
    }

    public function log_user($id){
        $data['row'] = $this->user_pendidik_m->log_activity($id);
        $this->template->load('admin/template', 'admin/operator/user_pendidik/log_activity', $data);
	}

}
