<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Activity_m extends CI_Model {

    function get_admin($id = null){
        $this->db->from('tb_user_log');
        $this->db->join('tb_user_admin','tb_user_log.id_user = tb_user_admin.id_user_admin');
        if ($id != null) {
            $this->db->where('tb_user_log.id_user', $id);
        }else{
            $this->db->order_by('tb_user_log.login_date', 'ASC');
        }
        $query = $this->db->get();
        return $query;
    }

    function get_pendidik($id = null){
        $this->db->from('tb_user_log');
        $this->db->join('tb_pendidik','tb_user_log.id_user = tb_pendidik.id_user');
        $this->db->join('tb_user','tb_user_log.id_user = tb_user.id_user');
        if ($id != null) {
            $this->db->where('tb_user_log.id_user', $id);
        }else{
            $this->db->order_by('tb_pendidik.nip_pendidik', 'ASC');
        }
        $query = $this->db->get();
        return $query;
    }

    function get_pedik($id = null){
        $this->db->from('tb_user_log');
        $this->db->join('tb_siswa','tb_user_log.id_user = tb_siswa.id_user');
        $this->db->join('tb_user','tb_user_log.id_user = tb_user.id_user');
        if ($id != null) {
            $this->db->where('tb_user_log.id_user', $id);
        }else{
            $this->db->order_by('tb_siswa.nisn_siswa', 'ASC');
        }
        $query = $this->db->get();
        return $query;
    }

   
  

}

?>