<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

    function get($id){
        $this->db->from('tb_user');
        $this->db->join('tb_siswa','tb_user.id_user = tb_siswa.id_user');
        $this->db->where('tb_siswa.id_user', $id);

        $query = $this->db->get();
        return $query;
    }

    function update($post){
        $params = [
            'email_user' => $post['p_email'],
            'username_user' => $post['p_user'],
            'updated_user' => date('Y-m-d H:i:s'),
        ];
        $this->db->where('id_user', $post['id']);
        $this->db->update('tb_user', $params);
    }

    function update_image($post){
        $params = [
            'image_siswa' => $post['image'],
            'updated_siswa' => date('Y-m-d H:i:s'),
        ];
        $this->db->where('id_user', $post['id']);
        $this->db->update('tb_siswa', $params);
    }

    public function new_password($post){
        $params['password_user'] = sha1($post['pas_new']);
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