<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		login_pedik();
	}

	public function index(){
		$this->template->load('pelajar/template','pelajar/dashboard');
	}

	public function faq(){
		$this->template->load('pelajar/template','landing/faq');
	}

	public function pengumuman($id = null){
		if ($id != null) {
			$data['row'] = get_pengumuman($id);
			$this->template->load('pelajar/template','pelajar/pengumuman', $data);
		}else{
			redirect('pelajar');
		}
	}
    
	
}
