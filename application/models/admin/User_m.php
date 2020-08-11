<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

    function get_user($id = null){
        $this->db->from('tb_user_admin');
        if ($id != null) {
            $this->db->where('id_user_admin', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    function update_profile($post){
        $params = [
            'username_user_admin' => $post['p_username'],
            'nama_depan_user_admin' => $post['p_name1'],
            'nama_belakang_user_admin' => $post['p_name2'],
            'email_user_admin' => $post['p_email'],
            'tempat_lahir_admin' => $post['p_tempat'],
            'tanggal_lahir_admin' => $post['p_tanggal'],
            'telepon_admin' => $post['p_telp'],
            'gender_admin' => $post['p_gen'],
            'alamat_admin' => $post['p_alamat'],
            'image_user_admin' => $post['image'],
            'updated_user_admin' => date('Y-m-d H:i:s'),
        ];

        if($post['p_password'] != null){
            $params['password_user_admin'] = sha1($post['p_password']);
        }
        $this->db->where('id_user_admin', $post['id']);
        $this->db->update('tb_user_admin', $params);
    }

    function del_image($id){
        $params['image_user_admin'] = 'default.png';
        $this->db->where('id_user_admin', $id);
        $this->db->update('tb_user_admin', $params);
    }

    function log_activity($id){
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
        
}
