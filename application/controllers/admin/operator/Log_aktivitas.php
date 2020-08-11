<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Log_aktivitas extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		login();
        operator();
        reset_log();
        $this->load->model('admin/operator/activity_m');
	}

	public function log($cat){
        if ($cat == 'a') {
            $query = $this->activity_m->get_admin();
        }else if($cat == 'b'){
            $query = $this->activity_m->get_pendidik();
        }else if($cat == 'c'){
            $query = $this->activity_m->get_pedik();
        }
        $data = [
            'c' => $cat,
            'row' => $query,
        ];
		$this->template->load('admin/template', 'admin/operator/log_activity/index', $data);
	}
    
	
}
