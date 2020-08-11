<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        login();
        tata_usaha();
        $this->load->model('admin/tata_usaha/kelas_m');
	}

	public function index(){
        $data['row'] = $this->kelas_m->get();
		$this->template->load('admin/template', 'admin/tata_usaha/peserta_ujian/index', $data);
	}

    public function insert(){
        $post = $this->input->post(null, TRUE);
        if($post['n_pedik'] != null){
            $data = [
                'count' => $post['n_pedik']
            ];
            $this->template->load('admin/template', 'admin/tata_usaha/pedik/form', $data);
        }else{
            $this->session->set_flashdata('error', " Silahkan pilih + Tambah dan masukkan jumlah datanya...");
            redirect('admin/tata_usaha/pedik');
        }
    }

    public function update($id){
        if($id != null){
            $query = $this->pedik_m->get($id)->row();
            $data = [
                'count' => 1,
                'row' => $query
            ];
            $this->template->load('admin/template', 'admin/tata_usaha/pedik/form', $data);
        }else{
            redirect('admin/tata_usaha/pedik');
        }
    }

    function proses(){
        $post = $this->input->post(null, TRUE);
        if(isset($post['insert'])){
            $data = array();
            $nisn = $post['p_nisn'];
    
            $index = 0; // Set index array awal dengan 0
            foreach ($nisn as $key => $data_siswa) {
                array_push($data, array(
                    'id_siswa'              => random_string('nozero',20).'0'.date('dmy'),
                    'nisn_siswa'            => $post['p_nisn'][$index],
                    'nama_siswa'            => $post['p_nama'][$index], 
                    'tempat_lahir_siswa'    => $post['p_tempat'][$index],  
                    'tanggal_lahir_siswa'   => date('y-m-d',strtotime($post['p_tgl'][$index])),
                    'gender_siswa'          => $post['p_gender'][$index],
                    'status_siswa'          => $post['p_status'][$index],
                    'alamat_siswa'          => $post['p_alamat'][$index],  
                ));
                $index++;
            }

            $this->pedik_m->insert($data);
            if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', " Data Peserta Didik Baru berhasil Ditambahkan");
                redirect('admin/tata_usaha/pedik');
            }else{
                $this->session->set_flashdata('error', " Data Peserta Didik Baru Gagal Ditambahkan");
                redirect('admin/tata_usaha/pedik');
            }
        }else if(isset($post['update'])){
            $this->pedik_m->update($post);
            if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', " Data Peserta Didik berhasil Diperbaharui");
                redirect('admin/tata_usaha/pedik');
            }else{
                $this->session->set_flashdata('error', " Data Peserta Didik Gagal Diperbaharui");
                redirect('admin/tata_usaha/pedik/update/'.$post['id']);
            }
        }
    }

    function delete($id){
        $this->pedik_m->delete($id);
            if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', " Data Peserta Didik berhasil Dihapus");
                redirect('admin/tata_usaha/pedik');
            }else{
                $this->session->set_flashdata('error', " Data Peserta Didik Gagal Dihapus");
                redirect('admin/tata_usaha/pedik');
            }
    }

    public function member_card($id){
        $data['row'] = $this->pedik_m->get($id)->row();
        $this->template->load('admin/template','admin/tata_usaha/pedik/member_card', $data);
    }

	
}
