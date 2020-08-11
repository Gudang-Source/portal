<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Struktur extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		login();
		multi_admin();
        $this->load->model('admin/operator/struktur_m');
	}

	public function index(){
        $data['row'] = $this->struktur_m->get();
		$this->template->load('admin/template', 'admin/operator/struktur/index', $data);
	}
	
	public function insert(){
		$struktur = new stdClass();
		$struktur->id_struktur = null;
		$struktur->jabatan_struktur = null;
		$struktur->nip_pejabat = null;
		$struktur->nama_pejabat = null;
		$struktur->batas_jabatan = null;
		$struktur->tingkat_prioritas = null;
		
		$data = [
			'page' => 'insert',
			'row' => $struktur
		];
		$this->template->load('admin/template', 'admin/operator/struktur/form', $data);
	}

	public function update($id){
		$query = $this->struktur_m->get($id)->row();
		$data = [
			'page' => 'update',
			'row' => $query
		];
		$this->template->load('admin/template', 'admin/operator/struktur/form', $data);
	}

	function proses(){
		$post = $this->input->post(null, TRUE);
		if(isset($post['insert'])){

			$config['upload_path']    = './assets/uploads/struktur';
			$config['allowed_types']  = 'gif|jpg|png|jpeg';
			$config['max_size']       = 2048;
			$config['file_name']       = 'pejabat_'.date('dmY');
			$this->load->library('upload', $config);

			if($this->upload->do_upload('image')){
				$post['image'] = $this->upload->data('file_name');

				$this->struktur_m->add($post);
				if($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('succes', " Data Struktur Sekolah Berhasil ditambahkan");
					redirect('admin/operator/struktur');
				}else{
					$this->session->set_flashdata('error', " Data Struktur Sekolah Gagal ditambahkan");
					redirect('admin/operator/struktur/insert');
				}
			}else{
				$post['image'] = null;
				$this->struktur_m->add($post);
				if($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('warning', " Data Struktur Sekolah Berhasil ditambahkan tapi image tidak di masukkan");
					redirect('admin/operator/struktur');
				}else{
					$this->session->set_flashdata('error', " Data Struktur Sekolah Gagal ditambahkan, Silahkan periksa kembali");
					redirect('admin/operator/struktur/insert');
				}
			}
		}else if(isset($post['update'])){

				$config['upload_path']    = './assets/uploads/struktur';
                $config['allowed_types']  = 'gif|jpg|png|jpeg';
                $config['max_size']       = 2048;
                $config['file_name']       = 'pejabat_'.date('dmY');
                $this->load->library('upload', $config);
                $gambar = $this->upload->do_upload('image');

                if($gambar == true){
                    $struktur = $this->struktur_m->get($post['id'])->row();
                    if($struktur->image_pejabat != null){
                        $target_file = './assets/uploads/struktur/'.$struktur->image_pejabat;
                        unlink($target_file); 
                        $post['image'] = $this->upload->data('file_name');
                    }else if($struktur->image_pejabat == null){
                        $post['image'] = $this->upload->data('file_name');
                    }
                }else{
                    $struktur = $this->struktur_m->get($post['id'])->row();
                    $post['image'] = $struktur->image_pejabat;
                }

                $this->struktur_m->edit($post);
                if($this->db->affected_rows() > 0){
                    $this->session->set_flashdata('succes', 'Data Struktur Sekolah Berhasil diperbaharui');
                    redirect('admin/operator/struktur');
                }else{
                    $this->session->set_flashdata('error', 'Data Struktur Sekolah Gagal ditambahkan');
                    redirect('admin/operator/strufktur/update/'.$post['id']);
                }
        }
	}

	function delete($id){
		$aset = $this->struktur_m->get($id)->row();
        if($aset->image_pejabat != null){
            $target_file = './assets/uploads/struktur/'.$aset->image_pejabat;
            unlink($target_file); 
		}

        $this->struktur_m->del($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', 'Data Struktur Sekolah Berhasil dihapus');
        }else{
            $this->session->set_flashdata('error', 'Data Struktur Sekolah Gagal dihapus');
        }
        redirect('admin/operator/struktur');
	}
	

}
    
   
    
	

