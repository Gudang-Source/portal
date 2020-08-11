<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		login();
		akademik();
	}

	public function index()
	{
		$this->template->load('admin/template', 'admin/akademik/dashboard');
	}
}
