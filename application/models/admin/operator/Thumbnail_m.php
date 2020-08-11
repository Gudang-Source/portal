<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Thumbnail_m extends CI_Model {

    function update($post){   
        $params['author_informasi'] = $post['i_author'];
        $params['judul_informasi'] = $post['i_judul'];
        $params['isi_informasi'] = $post['i_isi'];
      
        $this->db->where('id_informasi',$post['id']);
        $this->db->update('tb_informasi',$params);
    }
}