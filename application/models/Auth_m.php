<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_m extends CI_Model {

	function auth($post){
        $this->db->from('tb_user');
        $this->db->where('username_user', $post['username']);
        $query = $this->db->get();
        return $query;
    }

    function auth_pass($post){
        $this->db->from('tb_user');
        $this->db->where('password_user', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    function get_user_pendidik($id_user){
        $this->db->from('tb_user');
        $this->db->join('tb_pendidik','tb_pendidik.id_user = tb_user.id_user');
        $this->db->where('tb_user.id_user', $id_user);
        $query = $this->db->get();
        return $query;
    }

    function get_user_pedik($id_user){
        $this->db->from('tb_user');
        $this->db->join('tb_siswa','tb_siswa.id_user = tb_user.id_user');
        $this->db->where('tb_user.id_user', $id_user);
        $query = $this->db->get();
        return $query;
    }

    function get_nisn($nisn){
        $this->db->from('tb_siswa');
        $this->db->where('nisn_siswa', $nisn);
        $query = $this->db->get();
        return $query;
    }

    function get_email($email){
        $this->db->from('tb_user');
        $this->db->where('email_user', $email);
        $query = $this->db->get();
        return $query;
    }

    function set_user($post){
        $params = [
            'id_user' => $post['id_user'],
            'email_user' => $post['r_email'],
            'username_user' => $post['r_nisn'],
            'password_user' => sha1($post['r_nisn']),
            'role_user' => 2,
            'status_user' => 0
        ];
        $this->db->insert('tb_user', $params);
    }

    function set_user_siswa($post){
        $params['id_user'] = $post['id_user'];
        $this->db->where('nisn_siswa', $post['r_nisn']);
        $this->db->update('tb_siswa', $params);
    }

    function activate($id){
        $params['status_user'] = 1;
        $this->db->where('id_user', $id);
        $this->db->update('tb_user', $params);
    }
        
}
