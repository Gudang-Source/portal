<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ta_m extends CI_Model {

    function get($id = null){
        $this->db->from('tb_tahun_ajaran');
        if ($id != null) {
            $this->db->where('id_ta', $id);
        }else{
            $this->db->order_by('tahun_ajaran','DESC');
        }
        $query = $this->db->get();
        return $query;
    }

    function insert($post){
        $params = [
            'id_ta'         => random_string('alnum', 10),
            'tahun_ajaran'  => $post['ta_tahun'],
            'semester_ta'   => $post['ta_semester'],
            'mulai_ta'      => $post['ta_mulai'],
            'selesai_ta'    => $post['ta_selesai'],
            'status_ta'     => 0,
        ];
        $this->db->insert('tb_tahun_ajaran', $params);
    }

    function update($post){
        $params = [
            'tahun_ajaran'  => $post['ta_tahun'],
            'semester_ta'   => $post['ta_semester'],
            'mulai_ta'      => $post['ta_mulai'],
            'selesai_ta'    => $post['ta_selesai'],
            'updated_ta'    => date('Y-m-d H:i:s'),
        ];
        $this->db->where('id_ta', $post['id']);
        $this->db->update('tb_tahun_ajaran', $params);
    }

    function delete($id){
        $this->db->where('id_ta', $id);
        $this->db->delete('tb_tahun_ajaran');
    }

    function set_ta($id){
        $params['status_ta'] = 1;
        $this->db->where('id_ta', $id);
        $this->db->update('tb_tahun_ajaran', $params);
    }

}
