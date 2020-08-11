<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah_m extends CI_Model {

    function get(){
        $this->db->from('tb_sekolah');
        $query = $this->db->get();
        return $query;
    }

    function update($post){   
        $params['nama_sekolah'] = $post['s_nama'];
        $params['npsn_sekolah'] = $post['s_npsn'];
        $params['kepala_sekolah'] = $post['s_kepsek'];
        $params['bentuk_pendidikan'] = $post['s_bentuk'];
        $params['akreditasi_sekolah'] = $post['s_akreditasi'];
        $params['alamat_sekolah'] = $post['s_alamat'];
        $params['status_sekolah'] = $post['s_status'];
        $params['ta_sekolah'] = $post['s_ta'];
        $params['status_kepemilikan'] = $post['s_milik'];
        $params['instansi_pemerintah'] = $post['s_instansi'];
        $params['sk_pendirian'] = $post['s_skpen'];
        $params['sk_operasional'] = $post['s_skops'];
        $params['waktu_penyelenggaraan'] = $post['s_operasi'];
      
        $this->db->where('id_sekolah',$post['id']);
        $this->db->update('tb_sekolah',$params);
    }

    function update_logo($post){
        $params['logo_sekolah'] = $post['image'];
        $this->db->where('id_sekolah',$post['id']);
        $this->db->update('tb_sekolah',$params);
    }

    
  

}

?>