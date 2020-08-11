<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman_m extends CI_Model {

    function get($id = null){
        $this->db->from('tb_pengumuman_berita');
        $this->db->join('tb_user_admin', 'tb_pengumuman_berita.id_user_admin = tb_user_admin.id_user_admin');
        if($id != null){
            $this->db->where('tb_pengumuman_berita.id_berita', $id);
        }else{
            $this->db->where('tb_pengumuman_berita.cat_berita',1);
            $this->db->order_by('tb_pengumuman_berita.created_berita','DESC');
        }
        $query = $this->db->get();
        return $query;
    }

    function insert($post){
        $params['id_berita'] = random_string('alnum',10).'1'.date('dmY');
        $params['id_user_admin'] = $this->session->userdata('userid');
        $params['judul_berita'] = $post['p_judul'];
        $params['isi_berita'] = $post['p_isi'];
        $params['cat_berita'] = 1;
        $params['image_berita'] = $post['image'];
      
        $this->db->insert('tb_pengumuman_berita', $params);
    }

    function update($post){   
        $params['judul_berita'] = $post['p_judul'];
        $params['isi_berita'] = $post['p_isi'];
        $params['image_berita'] = $post['image'];
        $params['updated_berita'] = date('Y-m-d H:i:s');
      
        $this->db->where('id_berita',$post['id']);
        $this->db->update('tb_pengumuman_berita',$params);
    }

    public function delete($id){
        $this->db->where('id_berita',$id);
        $this->db->delete('tb_pengumuman_berita');
    }
}