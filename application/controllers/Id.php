<?php defined('BASEPATH') or exit('No direct script access allowed');

class Id extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->template->load('landing/template', 'landing/home');
	}

	public function info()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['more'])) {
			$data['row'] = get_more_berita($post['id']);
			$this->template->load('landing/template', 'landing/more_info', $data);
		} else {
			redirect('id');
		}
	}

	public function profil()
	{
		$data['row'] = profil();
		$this->template->load('landing/template', 'landing/profil', $data);
	}

	public function faq()
	{
		$this->template->load('landing/template', 'landing/faq');
	}

	public function error()
	{
		$this->load->view('errors/page/404');
	}

	public function maintenance()
	{
		$this->load->view('errors/page/maintenance');
	}

	public function off()
	{
		$this->load->view('errors/page/off');
	}
}
