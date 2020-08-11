<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Struktur_m extends CI_Model {

    function get($id = null){
        $this->db->from('tb_sekolah_struktur');
        if ($id != null) {
            $this->db->where('id_struktur', $id);
        }else{
            $this->db->order_by('tingkat_prioritas', 'ASC');
        }
        $query = $this->db->get();
        return $query;
    }

    function add($post){
        $params['id_struktur'] = random_string('md5').''.date('dmy');
        $params['jabatan_struktur'] = $post['s_jabatan'];
        $params['nama_pejabat'] = $post['s_name'];
        $params['nip_pejabat'] = $post['s_nip'];
        $params['batas_jabatan'] = $post['s_masajabat'];
        $params['tingkat_prioritas'] = $post['s_prioritas'];
        $params['image_pejabat'] = $post['image'];
        $this->db->insert('tb_sekolah_struktur',$params);
    }

    function edit($post){
        $params['jabatan_struktur'] = $post['s_jabatan'];
        $params['nama_pejabat'] = $post['s_name'];
        $params['nip_pejabat'] = $post['s_nip'];
        $params['batas_jabatan'] = $post['s_masajabat'];
        $params['tingkat_prioritas'] = $post['s_prioritas'];
        $params['image_pejabat'] = $post['image'];
        $this->db->where('id_struktur', $post['id']);
        $this->db->update('tb_sekolah_struktur',$params);
    }

    public function del($id){
        $this->db->where('id_struktur',$id);
        $this->db->delete('tb_sekolah_struktur');
    }
  

}

?>