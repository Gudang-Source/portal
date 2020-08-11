<?php defined('BASEPATH') or exit('No direct script access allowed');

class Jampel_m extends CI_Model
{

    function get_by_day($id)
    {
        $this->db->from('tb_jampel');
        $this->db->where('hari_jampel', $id);
        $this->db->order_by('urutan_jampel', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    function get_by_id($id)
    {
        $this->db->from('tb_jampel');
        $this->db->where('id_jampel', $id);
        $query = $this->db->get();
        return $query;
    }

    function insert($post)
    {
        $params = [
            'id_jampel' => random_string('alnum', 6) . '12' . date('dmy'),
            'id_ta' => ta()->id_ta,
            'hari_jampel' => $post['j_day'],
            'durasi_jampel' => $post['j_durasi'],
            'rentang_jampel' => $post['j_mulai'] . ' - ' . $post['j_selesai'],
            'urutan_jampel' => $post['j_urut'],
        ];
        $this->db->insert('tb_jampel', $params);
    }

    function update($post)
    {
        $data = [
            'durasi_jampel' => $post['j_durasi'],
            'rentang_jampel' => $post['j_mulai'] . ' - ' . $post['j_selesai'],
            'urutan_jampel' => $post['j_urut'],
            'updated_jampel' => date('Y-m-d')
        ];
        $this->db->where('id_jampel', $post['id']);
        $this->db->update('tb_jampel', $data);
    }

    function delete($id)
    {
        $this->db->where('id_jampel', $id);
        $this->db->delete('tb_jampel');
    }
}
