<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pengampu_m extends CI_Model
{

    function get_by_kelas($id_kelas, $id_ta)
    {
        $this->db->from('tb_pengampu');
        $this->db->join('tb_pendidik', 'tb_pengampu.id_pendidik = tb_pendidik.id_pendidik');
        $this->db->join('tb_kelas', 'tb_pengampu.id_kelas = tb_kelas.id_kelas');
        $this->db->join('tb_mapel', 'tb_pengampu.id_mapel = tb_mapel.id_mapel');
        $this->db->where('tb_pengampu.id_ta', $id_ta);
        $this->db->where('tb_kelas.id_kelas', $id_kelas);
        $query = $this->db->get();
        return $query;
    }

    function get_by_id($id_pengampu)
    {
        $this->db->from('tb_pengampu');
        $this->db->join('tb_pendidik', 'tb_pengampu.id_pendidik = tb_pendidik.id_pendidik');
        $this->db->join('tb_kelas', 'tb_pengampu.id_kelas = tb_kelas.id_kelas');
        $this->db->join('tb_mapel', 'tb_pengampu.id_mapel = tb_mapel.id_mapel');
        $this->db->where('tb_pengampu.id_pengampu', $id_pengampu);
        $query = $this->db->get();
        return $query;
    }

    function insert($post)
    {
        $params = [
            'id_pengampu' => random_string('alnum', 8) . '0' . date('dmy'),
            'id_ta' => ta()->id_ta,
            'id_kelas' => $post['id_kelas'],
            'id_pendidik' => $post['p_pendidik'],
            'id_mapel' => $post['p_mapel'],
            'jumlah_jam' => $post['p_jam'],
        ];
        $this->db->insert('tb_pengampu', $params);
    }

    function update($post)
    {
        $data = [
            'id_pendidik' => $post['p_pendidik'],
            'id_mapel' => $post['p_mapel'],
            'jumlah_jam' => $post['p_jam'],
            'updated_pengampu' => date('Y-m-d')
        ];
        $this->db->where('id_pengampu', $post['id']);
        $this->db->update('tb_pengampu', $data);
    }

    function delete($id)
    {
        $this->db->where('id_pengampu', $id);
        $this->db->delete('tb_pengampu');
    }
}
