<?php defined('BASEPATH') or exit('No direct script access allowed');

class Cogs_m extends CI_Model
{

    function verif($pas)
    {
        $this->db->from('tb_user_admin');
        $this->db->where('password_user_admin', sha1($pas));
        $query = $this->db->get();
        return $query;
    }

    function set_maintenance($val)
    {
        $params['maintenance_mode'] = $val;
        $this->db->update('tb_sistem', $params);
    }

    function get_pendidik()
    {
        $this->db->from('tb_user');
        $this->db->join('tb_pendidik', 'tb_user.id_user = tb_pendidik.id_user');
        $this->db->order_by('tb_pendidik.nama_pendidik', 'ASC');
        $query = $this->db->get();
        return $query;
    }
}
