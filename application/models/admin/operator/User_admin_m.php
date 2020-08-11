<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_admin_m extends CI_Model {

    function get($id = null){
        $this->db->from('tb_user_admin');
        if ($id != null) {
            $this->db->where('id_user_admin', $id);
        }else{
            $this->db->order_by('nama_depan_user_admin', 'ASC');
        }
        $query = $this->db->get();
        return $query;
    }

    function add($post){
        $params = [
            'id_user_admin' => random_string('alnum').''.date('dmy'),
            'username_user_admin' => $post['p_username'],
            'password_user_admin' => sha1($post['p_password']),
            'role_user_admin' => $post['p_role'],
            'nama_depan_user_admin' => $post['p_name1'],
            'nama_belakang_user_admin' => $post['p_name2'],
            'email_user_admin' => $post['p_email'],
            'tempat_lahir_admin' => $post['p_tempat'],
            'tanggal_lahir_admin' => $post['p_tanggal'],
            'telepon_admin' => $post['p_telp'],
            'gender_admin' => $post['p_gen'],
            'alamat_admin' => $post['p_alamat'],
            'image_user_admin' => 'default.png',
            'updated_user_admin' => date('Y-m-d H:i:s'),
        ];
        $this->db->insert('tb_user_admin', $params);
    }

    function edit($post){
        $params = [
            'username_user_admin' => $post['p_username'],
            'role_user_admin' => $post['p_role'],
            'nama_depan_user_admin' => $post['p_name1'],
            'nama_belakang_user_admin' => $post['p_name2'],
            'email_user_admin' => $post['p_email'],
            'tempat_lahir_admin' => $post['p_tempat'],
            'tanggal_lahir_admin' => $post['p_tanggal'],
            'telepon_admin' => $post['p_telp'],
            'gender_admin' => $post['p_gen'],
            'alamat_admin' => $post['p_alamat'],
            'updated_user_admin' => date('Y-m-d H:i:s'),
        ];
        if($post['p_password'] != null){
            $params['password_user_admin'] = sha1($post['p_password']);
        }
        $this->db->where('id_user_admin', $post['id']);
        $this->db->update('tb_user_admin',$params);
    }

    public function del($id){
        $this->db->where('id_user_admin',$id);
        $this->db->delete('tb_user_admin');
    }

    public function switch($post){
        $params['status_user_admin'] = $post['status'];
        $this->db->where('id_user_admin', $post['id']);
        $this->db->update('tb_user_admin',$params);
    }


}
