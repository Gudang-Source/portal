<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_pedik_m extends CI_Model {

    function get($id = null){
        $this->db->from('tb_siswa');
        $this->db->join('tb_user','tb_user.id_user = tb_siswa.id_user');
        if ($id != null) {
            $this->db->where('tb_user.id_user', $id);
        }else{
            $this->db->order_by('tb_siswa.nama_siswa','ASC');
        }
        $query = $this->db->get();
        return $query;
    }

    function add($post){
        $params = [
            'id_user' => $post['id'],
            'email_user' => $post['up_email'],
            'username_user' => $post['up_nisn'],
            'password_user' => sha1($post['up_nisn']),
            'role_user' => 2,
            'status_user' => 1,
        ];
        $this->db->insert('tb_user', $params);
    }

    function add_user_siswa($post){
        $params['id_user'] = $post['id'];
        $this->db->where('nisn_siswa', $post['up_nisn']);
        $this->db->update('tb_siswa',$params);
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