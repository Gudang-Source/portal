<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pendidik_m extends CI_Model
{

    function get($id = null)
    {
        $this->db->from('tb_pendidik');
        if ($id != null) {
            $this->db->where('id_pendidik', $id);
        } else {
            $this->db->order_by('nip_pendidik', 'ASC');
        }
        $query = $this->db->get();
        return $query;
    }

    function insert($post)
    {
        $params = [
            'id_pendidik' => random_string('alnum', 16) . '11' . date('Ymd'),
            'id_user' => $post['id_user'],
            'nip_pendidik' => $post['g_nip'],
            'nama_pendidik' => $post['g_nama'],
            'tempat_lahir_pendidik' => $post['g_tempat'],
            'tanggal_lahir_pendidik' => $post['g_tgl'],
            'pendidikan_terakhir' => $post['g_riwayat'],
            'gender_pendidik' => $post['g_gender'],
            'status_pendidik' => $post['g_status'],
            'alamat_pendidik' => $post['g_alamat'],
        ];
        $this->db->insert('tb_pendidik', $params);
    }

    function update($post)
    {
        $data = [
            'nip_pendidik' => $post['g_nip'],
            'nama_pendidik' => $post['g_nama'],
            'tempat_lahir_pendidik' => $post['g_tempat'],
            'tanggal_lahir_pendidik' => $post['g_tgl'],
            'pendidikan_terakhir' => $post['g_riwayat'],
            'gender_pendidik' => $post['g_gender'],
            'status_pendidik' => $post['g_status'],
            'alamat_pendidik' => $post['g_alamat'],
            'updated_pendidik' => date('Y-m-d')
        ];
        $this->db->where('id_pendidik', $post['id']);
        $this->db->update('tb_pendidik', $data);
    }

    function delete($id)
    {
        $this->db->where('id_pendidik', $id);
        $this->db->delete('tb_pendidik');
    }

    function set_user($post)
    {
        $params = [
            'id_user' => $post['id_user'],
            'username_user' => $post['g_nip'],
            'password_user' => sha1($post['g_nip']),
            'role_user' => 1,
            'status_user' => 1,
        ];
        $this->db->insert('tb_user', $params);
    }
}
