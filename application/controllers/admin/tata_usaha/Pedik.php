<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pedik extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        login();
        tata_usaha();
		// $this->load->library('Excel/excel');
        $this->load->model('admin/tata_usaha/pedik_m');
	}

	public function index(){
        $data['row'] = $this->pedik_m->get();
		$this->template->load('admin/template', 'admin/tata_usaha/pedik/index', $data);
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
                    'nik_siswa'             => $post['p_nik'][$index],
                    'nama_ayah'             => $post['p_ayah'][$index],
                    'nama_ibu'              => $post['p_ibu'][$index],
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

    public function import(){
        $this->template->load('admin/template','admin/tata_usaha/pedik/import');
    }

    // public function import_proses(){
    //     $post = $this->input->post(null, TRUE);

    //     if (isset($post['import_file'])) {
    //         $pth = $_FILES["berkas"]["name"];
    //         $path = $_FILES["berkas"]["tmp_name"];
    //         $object = PHPExcel_IOFactory::load($path);
    //         foreach ($object->getWorksheetIterator() as $worksheet) {
    //             $highestRow = $worksheet->getHighestRow();
    //             $highestColumn = $worksheet->getHighestColumn();

    //             for($row=7; $row<=$highestRow; $row++){
	// 				$nisn_siswa = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
	// 				$nama_siswa = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
    //                 $tempat_lahir= $worksheet->getCellByColumnAndRow(3, $row)->getValue();
    //                 $tanggal_lahir = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
    //                 $gender_siswa = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
    //                 $alamat_siswa = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
	// 				$data[] = array(
    //                     'id_siswa'              =>  random_string('nozero',20).'0'.date('dmy'),
    //                     'nisn_siswa'		    =>	$nisn_siswa,
    //                     'nama_siswa'            =>  $nama_siswa,
    //                     'tempat_lahir_siswa'    =>	$tempat_lahir,
    //                     'tanggal_lahir_siswa'   =>  date('y-m-d',strtotime($tanggal_lahir)),
    //                     'gender_siswa'		    =>	$gender_siswa,
    //                     'status_siswa'          =>  '1',
    //                     'alamat_siswa'		    =>	$alamat_siswa
	// 				);
	// 			}
    //         }
    //         $this->pedik_m->insert_import($data);
    //         if($this->db->affected_rows() > 0) {
    //             $this->session->set_flashdata('succes', " Data Peserta Didik Baru berhasil Ditambahkan");
    //             redirect('admin/tata_usaha/pedik');
    //         }else{
    //             $this->session->set_flashdata('error', " Data Peserta Didik Baru Gagal Ditambahkan");
    //             redirect('admin/tata_usaha/pedik/import');
    //         }
    //     }
    // }

    public function member_card($id){
        $data['row'] = $this->pedik_m->get($id)->row();
        $this->template->load('admin/template','admin/tata_usaha/pedik/member_card', $data);
    }

    // function generate_barcode($id_siswa){
    //     $this->load->library('Zend-barcode/CI_Zend');
    //     $this->zend->load('Zend-barcode/Zend/Zend_Barcode');
    //     $image_resource = Zend_Barcode::factory('code128', 'image', array('text'=>$id_siswa), array())->draw();
    //     $image_name     = date('dmY').'-'.$id_siswa.'.jpg';
    //     $image_dir      = './assets/uploads/siswa/barcode/'; // penyimpanan file barcode
    //     imagejpeg($image_resource, $image_dir.$image_name); 
        
    //     redirect('admin/tata_usaha/pedik/member_card/'.$id_siswa);
    // }

    function set_kelas(){
        $post = $this->input->post(null, TRUE);
        if(isset($post['choice'])){
            $this->pedik_m->set_kelas($post);
            if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', " Peserta Didik Berhasil Mendapatkan Kelas");
                redirect('admin/tata_usaha/pedik');
            }else{
                $this->session->set_flashdata('error', " Peserta Didik Gagal Mendapatkan Kelas");
                redirect('admin/tata_usaha/pedik');
            }
        }
    }

    function reset_kelas(){
        reset_kelas();
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', " Reset Kelas Peserta Didik Berhasil ");
            redirect('admin/tata_usaha/pedik');
        }else{
            $this->session->set_flashdata('error', " Reset Kelas Peserta Didik Gagal ");
            redirect('admin/tata_usaha/pedik');
        }
    }
	
}
