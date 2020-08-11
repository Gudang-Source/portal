<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidik extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        login();
        tata_usaha();
        $this->load->model('admin/tata_usaha/pendidik_m');
	}

	public function index(){
        $data['row'] = $this->pendidik_m->get();
		$this->template->load('admin/template', 'admin/tata_usaha/pendidik/index', $data);
	}

    public function insert(){
        $this->template->load('admin/template', 'admin/tata_usaha/pendidik/form');
    }

    public function update($id){
        if($id != null){
            $query = $this->pendidik_m->get($id)->row();
            $data = [
                'count' => 1,
                'row' => $query
            ];
            $this->template->load('admin/template', 'admin/tata_usaha/pendidik/form', $data);
        }else{
            redirect('admin/tata_usaha/pedik');
        }
    }

    function proses(){
        $post = $this->input->post(null, TRUE);
        if(isset($post['insert'])){
            $post['id_user'] = random_string('nozero',6).'-'.date('dmy').'-'.random_string('alnum',6);
            $this->pendidik_m->insert($post);
            if($this->db->affected_rows() > 0) {
                $this->pendidik_m->set_user($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('succes', " Data Tenaga Pendidik Baru berhasil Ditambahkan, Gunakan NIP sebagai Username dan Password");
                }else{
                    $this->session->set_flashdata('warning', " Data Tenaga Pendidik Baru berhasil Ditambahkan, Namun Akun pengguna tidak dapat dibuat");
                }
                redirect('admin/tata_usaha/pendidik');
            }else{
                $this->session->set_flashdata('error', " Data Tenaga Pendidik Baru Gagal Ditambahkan");
                redirect('admin/tata_usaha/pendidik');
            }
        }else if(isset($post['update'])){
            $this->pendidik_m->update($post);
            if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', " Data Tenaga Pendidik berhasil Diperbaharui");
                redirect('admin/tata_usaha/pendidik');
            }else{
                $this->session->set_flashdata('error', " Data Tenaga Pendidik Gagal Diperbaharui");
                redirect('admin/tata_usaha/pendidik/update/'.$post['id']);
            }
        }
    }

    function delete($id){
        $this->pendidik_m->delete($id);
            if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', " Data Peserta Didik berhasil Dihapus");
                redirect('admin/tata_usaha/pendidik');
            }else{
                $this->session->set_flashdata('error', " Data Peserta Didik Gagal Dihapus");
                redirect('admin/tata_usaha/pendidik');
            }
    }

    public function member_card($id){
        $data['row'] = $this->pendidik_m->get($id)->row();
        $this->template->load('admin/template','admin/tata_usaha/pendidik/member_card', $data);
    }
	
}
