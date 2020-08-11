<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_m extends CI_Model {

	function auth($post){
        $this->db->from('tb_user_admin');
        $this->db->where('username_user_admin', $post['username']);
        $query = $this->db->get();
        return $query;
    }

    function auth_pass($post){
        $this->db->from('tb_user_admin');
        $this->db->where('password_user_admin', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    function get_email($post){
        $this->db->from('tb_user_admin');
        $this->db->where('email_user_admin', $post['u_mail']);
        $query = $this->db->get();
        return $query;
    }

    function set_password($post){
        $params = [
            'password_user_admin' => sha1($post['u_pass'])
        ];
        $this->db->where('id_user_admin', $post['id']);
        $this->db->update('tb_user_admin', $params);
    }
        
}
