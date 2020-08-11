<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		login();
        operator();
        $this->load->model('admin/operator/pengumuman_m');
	}

	public function index(){
        $data['row'] = $this->pengumuman_m->get();
		$this->template->load('admin/template', 'admin/operator/pengumuman/index', $data);
    }
    
    public function insert(){
        $this->template->load('admin/template', 'admin/operator/pengumuman/form');
    }

    public function update($id){
        $data['row'] = $this->pengumuman_m->get($id)->row();
        $this->template->load('admin/template', 'admin/operator/pengumuman/form', $data);
    }

    function proses(){
		$post = $this->input->post(null, TRUE);
		if(isset($post['insert'])){

			$config['upload_path']    = './assets/uploads/pengumuman';
			$config['allowed_types']  = 'jpg|png|jpeg';
			$config['max_size']       = 10000;
			$config['file_name']      = $post['id'].'1'.date('dmY');
			$this->load->library('upload', $config);

			if($this->upload->do_upload('image')){
				$post['image'] = $this->upload->data('file_name');

				$this->pengumuman_m->insert($post);
				if($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('succes', " Data Gambar Pengumuman Berhasil ditambahkan");
					redirect('admin/operator/pengumuman');
				}else{
					$this->session->set_flashdata('error', " Data Gambar Pengumuman Gagal ditambahkan");
					redirect('admin/operator/pengumuman/insert');
				}
			}else{
				$post['image'] = null;
				$this->struktur_m->add($post);
				if($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('warning', " Data Gambar Pengumuman Berhasil ditambahkan tapi image tidak di masukkan");
					redirect('admin/operator/pengumuman');
				}else{
					$this->session->set_flashdata('error', " Data Gambar Pengumuman Gagal ditambahkan, Silahkan periksa kembali");
					redirect('admin/operator/pengumuman/insert');
				}
			}
		}else if(isset($post['update'])){

                $config['upload_path']    = './assets/uploads/pengumuman';
                $config['allowed_types']  = 'jpg|png|jpeg';
                $config['max_size']       = 10000;
                $config['file_name']       = $post['id'].'1'.date('dmY');
                $this->load->library('upload', $config);
                $gambar = $this->upload->do_upload('image');

                if($gambar == true){
                    $gambar = $this->pengumuman_m->get($post['id'])->row();
                    if($gambar->image_berita != null){
                        $target_file = './assets/uploads/pengumuman/'.$gambar->image_berita;
                        unlink($target_file); 
                        $post['image'] = $this->upload->data('file_name');
                    }else if($gambar->image_berita == null){
                        $post['image'] = $this->upload->data('file_name');
                    }
                }else{
                    $gambar = $this->pengumuman_m->get($post['id'])->row();
                    $post['image'] = $gambar->image_berita;
                }

                $this->pengumuman_m->update($post);
                if($this->db->affected_rows() > 0){
                    $this->session->set_flashdata('succes', 'Data Gambar Pengumuman Berhasil diperbaharui');
                    redirect('admin/operator/pengumuman');
                }else{
                    $this->session->set_flashdata('error', 'Data Gambar Pengumuman Gagal ditambahkan');
                    redirect('admin/operator/spengumuman/update/'.$post['id']);
                }
        }
    }
    
    function delete($id){
        $gambar = $this->pengumuman_m->get($id)->row();
        if($gambar->image_berita != null){
            $target_file = './assets/uploads/pengumuman/'.$gambar->image_berita;
            unlink($target_file); 
        }
        $this->pengumuman_m->delete($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', " Data Pengumuman Berhasil dihapus ");
            redirect('admin/operator/pengumuman');
        }else{
            $this->session->set_flashdata('error', " Data Pengumuman Gagal dihapus, Silahkan coba lagi");
            redirect('admin/operator/pengumuman');
        }
    }
    
	
}
