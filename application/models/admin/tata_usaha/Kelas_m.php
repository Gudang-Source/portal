<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kelas_m extends CI_Model
{

    function get($id = null)
    {
        $this->db->from('tb_kelas');
        $this->db->join('tb_pendidik', 'tb_pendidik.id_pendidik = tb_kelas.id_pendidik');
        if ($id != null) {
            $this->db->where('id_kelas', $id);
        } else {
            $this->db->order_by('tingkat_kelas', 'ASC');
        }
        $query = $this->db->get();
        return $query;
    }

    function insert($post)
    {
        $params = [
            'id_kelas' => random_string('alnum', 16) . '0' . date('dmy'),
            'id_pendidik' => $post['k_wali'],
            'tingkat_kelas' => $post['k_tingkat'],
            'jurusan_kelas' => $post['k_jurusan'],
            'nama_kelas' => $post['k_nama'],
            'kapasitas_kelas' => $post['k_kapasitas'],
        ];
        $this->db->insert('tb_kelas', $params);
    }

    function update($post)
    {
        $data = [
            'id_pendidik' => $post['k_wali'],
            'tingkat_kelas' => $post['k_tingkat'],
            'jurusan_kelas' => $post['k_jurusan'],
            'nama_kelas' => $post['k_nama'],
            'kapasitas_kelas' => $post['k_kapasitas'],
            'updated_kelas' => date('Y-m-d')
        ];
        $this->db->where('id_kelas', $post['id']);
        $this->db->update('tb_kelas', $data);
    }

    function delete($id)
    {
        $this->db->where('id_kelas', $id);
        $this->db->delete('tb_kelas');
    }

    function get_kelas($id)
    {
        $this->db->from('tb_siswa');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_siswa.id_kelas');
        $this->db->join('tb_pendidik', 'tb_pendidik.id_pendidik = tb_kelas.id_pendidik');
        $this->db->where('tb_siswa.id_kelas', $id);
        $this->db->order_by('tb_siswa.nisn_siswa', 'ASC');
        $query = $this->db->get();
        return $query;
    }
}
