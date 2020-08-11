<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		login();
		tata_usaha();
	}

	public function index(){
		$this->template->load('admin/template', 'admin/tata_usaha/dashboard');
	}
    
	
}
