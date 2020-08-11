<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_pendidik_m extends CI_Model {

    function get($id = null){
        $this->db->from('tb_user');
        $this->db->join('tb_pendidik','tb_user.id_user = tb_pendidik.id_user');
        if ($id != null) {
            $this->db->where('tb_user.id_user', $id);
        }else{
            $this->db->order_by('tb_pendidik.nama_pendidik');
        }
        $query = $this->db->get();
        return $query;
    }

    function add($post){
        $params = [
            'id_user' => $post['id'],
            'email_user' => $post['up_email'],
            'username_user' => $post['up_nip'],
            'password_user' => sha1($post['up_nip']),
            'role_user' => 1,
            'status_user' => 1,
        ];
        $this->db->insert('tb_user', $params);
    }

    function add_user_pendidik($post){
        $params['id_user'] = $post['id'];
        $this->db->where('nip_pendidik', $post['up_nip']);
        $this->db->update('tb_pendidik',$params);
    }

    function update($post){
        $params = [
            'email_user' => $post['up_email'],
            'username_user' => $post['up_name'],
            'updated_user' => date('Y-m-d H:i:s')
        ];
        if($post['up_pass'] != null){
            $params['password_user'] = sha1($post['up_pass']);
        }
        $this->db->where('id_user', $post['id']);
        $this->db->update('tb_user',$params);
    }

    public function del($id){
        $this->db->where('id_user',$id);
        $this->db->delete('tb_user');
    }

    public function switch($post){
        $params['status_user'] = $post['status'];
        $this->db->where('id_user', $post['id']);
        $this->db->update('tb_user',$params);
    }

    function log_activity($id){
        $this->db->from('tb_user_log');
        $this->db->join('tb_user','tb_user_log.id_user = tb_user.id_user');
        if ($id != null) {
            $this->db->where('tb_user_log.id_user', $id);
        }else{
            $this->db->order_by('tb_user_log.login_date', 'DESC');
        }
        $query = $this->db->get();
        return $query;
    }

}

?>