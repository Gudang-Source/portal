<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pedik_m extends CI_Model
{

    function get($id = null)
    {
        $this->db->from('tb_siswa');
        if ($id != null) {
            $this->db->where('id_siswa', $id);
        } else {
            $this->db->order_by('nisn_siswa', 'ASC');
        }
        $query = $this->db->get();
        return $query;
    }

    function insert($post)
    {
        $this->db->insert_batch('tb_siswa', $post);
    }

    function update($post)
    {
        $data = [
            'nisn_siswa' => $post['p_nisn'][0],
            'nama_siswa' => $post['p_nama'][0],
            'tempat_lahir_siswa' => $post['p_tempat'][0],
            'tanggal_lahir_siswa' => $post['p_tgl'][0],
            'gender_siswa' => $post['p_gender'][0],
            'nik_siswa' => $post['p_kk'][0],
            'nama_ayah' => $post['p_ayah'][0],
            'nama_ibu' => $post['p_ibu'][0],
            'status_siswa' => $post['p_status'][0],
            'alamat_siswa' => $post['p_alamat'][0],
        ];
        $this->db->where('id_siswa', $post['id']);
        $this->db->update('tb_siswa', $data);
    }

    function insert_import($data)
    {
        $this->db->insert_batch('tb_siswa', $data);
    }

    function delete($id)
    {
        $this->db->where('id_siswa', $id);
        $this->db->delete('tb_siswa');
    }

    function set_kelas($post)
    {
        $params['id_kelas'] = $post['kelas'];
        $this->db->where('id_siswa', $post['id_siswa']);
        $this->db->update('tb_siswa', $params);
    }
}
