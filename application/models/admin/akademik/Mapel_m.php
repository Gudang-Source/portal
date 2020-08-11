<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mapel_m extends CI_Model
{

    function get($id = null)
    {
        $this->db->from('tb_mapel');
        $this->db->join('tb_tahun_ajaran', 'tb_tahun_ajaran.id_ta = tb_mapel.id_ta');
        if ($id != null) {
            $this->db->where('tb_mapel.id_mapel', $id);
        } else {
            $this->db->where('tb_tahun_ajaran.status_ta', 1);
            $this->db->order_by('nama_mapel', 'ASC');
        }
        $query = $this->db->get();
        return $query;
    }

    function insert($post)
    {
        $params = [
            'id_mapel' => random_string('alnum', 16) . '0' . date('dmy'),
            'id_ta' => ta()->id_ta,
            'kode_mapel' => $post['m_kode'],
            'nama_mapel' => $post['m_mapel'],
            'inisial_mapel' => $post['m_inisial'],
            'rombel_mapel' => $post['m_rombel'],
        ];
        $this->db->insert('tb_mapel', $params);
    }

    function update($post)
    {
        $data = [
            'kode_mapel' => $post['m_kode'],
            'nama_mapel' => $post['m_mapel'],
            'rombel_mapel' => $post['m_rombel'],
            'inisial_mapel' => $post['m_inisial'],
            'updated_mapel' => date('Y-m-d')
        ];
        $this->db->where('id_mapel', $post['id']);
        $this->db->update('tb_mapel', $data);
    }

    function delete($id)
    {
        $this->db->where('id_mapel', $id);
        $this->db->delete('tb_mapel');
    }
}
