<?php defined('BASEPATH') or exit('No direct script access allowed');

class Cogs extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        login();
        operator();
        $this->load->dbutil();
        $this->load->model('admin/operator/cogs_m');
        #$this->load->library('recurseZip_lib');
    }

    public function db()
    {
        $this->template->load('admin/template', 'admin/operator/cogs/db');
    }

    function import_field($tb_name)
    {
        $query  =  $this->db->get($tb_name);
        print_r($this->dbutil->csv_from_result($query));
    }

    function backup_db()
    {
        $prefs = array(
            'format' => 'zip',
            'filename' => 'my_db_backup.sql'
        );

        $backup = &$this->dbutil->backup($prefs);

        $db_name = 'backup-on-' . date("Y-m-d-H-i-s") . '.zip'; // file name
        $save  = 'backup/db/' . $db_name; // dir name backup output destination

        $this->load->helper('file');
        write_file($save, $backup);

        $this->load->helper('download');
        force_download($db_name, $backup);
    }

    function maintenance()
    {
        $this->template->load('admin/template', 'admin/operator/cogs/main');
    }

    function maintenance_proses()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['verif'])) {
            $pas = $post['pass'];
            $query = $this->cogs_m->verif($pas);
            if ($query->num_rows() > 0) {
                if (sistem()->maintenance_mode == 0) {
                    $interupt = 1;
                    $this->cogs_m->set_maintenance($interupt);
                    $this->session->set_flashdata('succes', 'Mode Perbaikan Berhasil di Aktifkan');
                    redirect('admin/operator/cogs/maintenance');
                } else if (sistem()->maintenance_mode == 1) {
                    $interupt = 0;
                    $this->cogs_m->set_maintenance($interupt);
                    $this->session->set_flashdata('succes', 'Mode Perbaikan Berhasil di Non-Aktifkan');
                    redirect('admin/operator/cogs/maintenance');
                }
            } else {
                $this->session->set_flashdata('error', 'Password yang dimasukkan salah, coba kembali...');
                redirect('admin/operator/cogs/maintenance');
            }
        }
    }
}
