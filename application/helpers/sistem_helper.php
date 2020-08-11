<?php

# ================== Function Konfigurasi Sistem ======================

function sistem()
{
    $ci = &get_instance();
    $query = $ci->db->get('tb_sistem');
    return $query->row();
}

function maintenace_mode()
{
    $status = sistem()->maintenance_mode;
    if ($status == 1) {
        redirect('id/maintenance');
    }
}

function profil()
{
    $ci = &get_instance();
    $query = $ci->db->get('tb_sekolah');
    return $query->row();
}

function smtp_email($post)
{ # $post = ['destination' => ?, 'subject' => ?, 'massage'=> ?] 
    $ci = &get_instance();
    $config = [
        'mailtype'  => 'html',
        'charset'   => 'utf-8',
        'protocol'  => 'smtp',
        'smtp_host' => 'smtp.gmail.com',
        'smtp_user' => 'mabes.develover@gmail.com',  // Email gmail
        'smtp_pass'   => 'Masbowo2017',  // Password gmail
        'smtp_crypto' => 'ssl',
        'smtp_port'   => 465,
        'crlf'    => "\r\n",
        'newline' => "\r\n"
    ];

    // Load library email dan konfigurasinya
    $ci->load->library('email', $config);

    // Email dan nama pengirim
    $ci->email->from('mabes.develover@gmail.com', 'Operator Portal Akademik Sekolah ' . profil()->nama_sekolah);

    // Email penerima
    $ci->email->to($post['destination']); // Ganti dengan email tujuan

    // Subject email
    $ci->email->subject($post['subject']);

    // Isi email
    $ci->email->message($post['massage']);

    // Tampilkan pesan sukses atau error
    if ($ci->email->send()) {
        return 1;
    } else {
        return 0;
    }
}

function pengumuman_landing($limit = null)
{
    $ci = &get_instance();
    $ci->db->from('tb_informasi');
    $ci->db->order_by('created_informasi', 'DESC');
    if ($limit == null) {
        $ci->db->where('tipe_informasi', 'thumbnail');
    }
    $query = $ci->db->get();
    return $query;
}

function admin_role($cat)
{
    if ($cat == 1) {
        return 'Operator';
    } else if ($cat == 2) {
        return 'Tata Usaha';
    } else if ($cat == 3) {
        return 'Akademik';
    } else if ($cat == 4) {
        return 'Kesiswaan';
    } else if ($cat == 5) {
        return 'Keuangan';
    } else {
        redirect('admin/auth');
    }
}

function user_profil($id)
{
    $ci = &get_instance();
    $ci->db->from('tb_user_admin');
    $ci->db->where('id_user_admin', $id);
    $query = $ci->db->get();
    return $query->row();
}

function profil_user_student()
{
    $ci = &get_instance();
    $id = $ci->session->userdata('userid');
    $ci->db->from('tb_user');
    $ci->db->join('tb_siswa', 'tb_siswa.id_user = tb_user.id_user');
    $ci->db->where('tb_siswa.id_user', $id);
    $query = $ci->db->get();
    return $query->row();
}

function count_pedik($id_kelas)
{
    $ci = &get_instance();
    $ci->db->from('tb_siswa');
    $ci->db->where('id_kelas', $id_kelas);
    $query = $ci->db->get();
    return $query;
}

function jurusan($std = null)
{
    if ($std == 'IPA') {
        $name = 'Ilmu Pengetahuan Alam';
    } else if ($std == 'MIPA') {
        $name = 'Matematika dan Ilmu Pengetahuan Alam';
    } else if ($std == 'MIA') {
        $name = 'Matematika dan Ilmu Alam';
    } else if ($std == 'IPS') {
        $name = 'Ilmu Pengetahuan Sosial';
    } else {
        $name = $std;
    }
    return $name;
}

function get_wali_kelas($id = null)
{
    $ci = &get_instance();
    $ci->db->from('tb_pendidik');
    if ($id != null) {
        $ci->db->where('id_pendidik', $id);
    }
    $query = $ci->db->get();
    return $query;
}

function cek_wali_kelas($id)
{
    $ci = get_instance();
    $ci->db->from('tb_kelas');
    $ci->db->where('id_pendidik', $id);
    $query = $ci->db->get();
    return $query->num_rows();
}

function cek_kelas($id_kelas = null)
{
    if ($id_kelas != null) {
        $ci = get_instance();
        $ci->db->from('tb_kelas');
        $ci->db->where('id_kelas', $id_kelas);
        $query = $ci->db->get();
        $data =  $query->row();
        return $data->tingkat_kelas . ' ' . $data->jurusan_kelas . ' ' . $data->nama_kelas;
    } else {
        return "Belum ada";
    }
}

function get_kelas($id = null)
{
    $ci = get_instance();
    $ci->db->from('tb_kelas');
    if ($id != null) {
        $ci->db->where('id_kelas', $id);
    } else {
        $ci->db->order_by('tingkat_kelas', 'ASC');
    }
    $query = $ci->db->get();
    return $query;
}

function cek_peserta_kelas($id_kelas)
{
    $ci = get_instance();
    $ci->db->from('tb_siswa');
    $ci->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_siswa.id_kelas');
    $ci->db->where('tb_siswa.id_kelas', $id_kelas);
    $query = $ci->db->get();
    return $query->num_rows();
}

function get_peserta($id)
{
    $ci = get_instance();
    $ci->db->from('tb_siswa');
    $ci->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_siswa.id_kelas');
    $ci->db->where('tb_siswa.id_kelas', $id);
    $query = $ci->db->get();
    return $query;
}

function get_mapel_jurusan($jurusan)
{
    $ci = get_instance();
    $ci->db->from('tb_mapel');
    $ci->db->where('rombel_mapel', $jurusan);
    $ci->db->or_where('rombel_mapel', 'Umum');
    $ci->db->order_by('rombel_mapel', 'ASC');
    $query = $ci->db->get();
    return $query;
}

function reset_kelas()
{
    $ci = get_instance();
    $params['id_kelas'] = null;
    $query = $ci->db->update('tb_siswa', $params);
    return $query;
}

function conv_day($node)
{
    switch ($node) {
        case 1:
            return "Senin";
            break;
        case 2:
            return "Selasa";
            break;
        case 3:
            return "Rabu";
            break;
        case 4:
            return "Kamis";
            break;
        case 5:
            return "Jum'at";
            break;
        case 6:
            return "Sabtu";
            break;
        default:
            return $node;
            break;
    }
}

function get_pengampu($id_kelas, $id_mapel)
{
    $ci = get_instance();
    $ci->db->from('tb_pengampu');
    $ci->db->where('id_kelas', $id_kelas);
    $ci->db->where('id_mapel', $id_mapel);
    $query = $ci->db->get();
    return $query;
}

function pendaftaran_siswa($post)
{
    # $post = ['destination' => ?, 'subject' => ?, 'massage'=> ?]
    $data['destination'] = $post['r_email'];
    $data['subject'] = 'Pendaftaran Akun Baru Peserta Didik Portal Akademik ' . profil()->nama_sekolah;
    $data['massage'] = "
                <p>
                    <html>
                        <body>
                            Hallo, Pendaftaran Akun Baru untuk Peserta didik berhasil, dengan rincian sebagai berikut : <br>
                            No. Pendaftaran  : " . $post['no_reg'] . " <br>
                            NISN Peserta     : " . $post['r_nisn'] . " <br>
                            Expired Aktivasi : " . date('D, d M Y') . " at 23.59 <br>
                            Silahkan Klik Tombol Aktivasi Dibawah ini untuk aktivasi akun anda... <br>
                            <center>
                                <a href='" . site_url('auth/aktivasi/' . $post['id_user']) . '?d=' . date('dmy') . '&w=' . date('hi') . "' target='_blank'> Aktivasi </a>
                            </center>
                        </body>
                    </html>
                </p>
            ";
    return smtp_email($data);
}

function forogt_reset($post)
{
    # $post = ['destination' => ?, 'subject' => ?, 'massage'=> ?]
    $data['destination'] = $post['r_email'];
    $data['subject'] = 'Pendaftaran Akun Baru Peserta Didik Portal Akademik ' . profil()->nama_sekolah;
    $data['massage'] = "
                <p>
                    <html>
                        <body>
                            Hallo, Permintaan reset Password berhasil, dengan rincian sebagai berikut : <br>
                            Username         : " . $post['username'] . " <br>
                            Level Akun       : " . $post['level'] . " <br>
                            Tanggal Reset    : " . $post['tgl_reset'] . " <br>
                            Expired reset    : " . date('D, d M Y') . " at 23.59 <br>
                            Silahkan Klik Tombol Reset Password Dibawah ini untuk Mereset akun anda... <br>
                            <center>
                                <a href='" . site_url('auth/reset/' . $post['id_user']) . '?d=' . date('dmy') . '&w=' . date('hi') . "' target='_blank'> Reset Password </a>
                            </center>
                        </body>
                    </html>
                </p>
            ";
    return smtp_email($data);
}

function bulan_indo($tanggal)
{
    $day = date('d', strtotime($tanggal));
    $month = date('m', strtotime($tanggal));
    $year = date('Y', strtotime($tanggal));
    $bulan = null;

    switch ($month) {
        case 1:
            $bulan = "Januari";
            break;
        case 2:
            $bulan = "Februari";
            break;
        case 3:
            $bulan = "Maret";
            break;
        case 4:
            $bulan = "April";
            break;
        case 5:
            $bulan = "Mei";
            break;
        case 6:
            $bulan = "Juni";
            break;
        case 7:
            $bulan = "Juli";
            break;
        case 8:
            $bulan = "Agustus";
            break;
        case 9:
            $bulan = "September";
            break;
        case 10:
            $bulan = "Oktober";
            break;
        case 11:
            $bulan = "November";
            break;
        case 12:
            $bulan = "Desember";
            break;
    }

    return $day . ' ' . $bulan . ' ' . $year;
}

function hari($hari)
{
    switch ($hari) {
        case 'Sun':
            $hari_ini = "Minggu";
            break;

        case 'Mon':
            $hari_ini = "Senin";
            break;

        case 'Tue':
            $hari_ini = "Selasa";
            break;

        case 'Wed':
            $hari_ini = "Rabu";
            break;

        case 'Thu':
            $hari_ini = "Kamis";
            break;

        case 'Fri':
            $hari_ini = "Jumat";
            break;

        case 'Sat':
            $hari_ini = "Sabtu";
            break;

        default:
            $hari_ini = "Tidak di ketahui";
            break;
    }

    return $hari_ini;
}

function nonaktif_ta()
{
    $ci = &get_instance();
    $params['status_ta'] = 0;
    $ci->db->update('tb_tahun_ajaran', $params);
}

function ta()
{
    $ci = &get_instance();
    $ci->db->from('tb_tahun_ajaran');
    $ci->db->where('status_ta', 1);
    $query = $ci->db->get();
    return $query->row();
}

function reset_log()
{
    $ci = &get_instance();
    if (date('d') == 1) {
        $ci->db->empty_table('tb_user_log');
    }
}
# ======================= Informasi Akademik ==========================

function get_masuk()
{
    $ci = &get_instance();
    $ci->db->from('tb_informasi');
    $ci->db->where('tipe_informasi', 1);
    $query = $ci->db->get();
    $date = $query->row()->tanggal_informasi;
    return hari(date('D', strtotime($date))) . ', ' . bulan_indo($date);
}

function get_libur()
{
    $ci = &get_instance();
    $ci->db->from('tb_informasi');
    $ci->db->where('tipe_informasi', 2);
    $query = $ci->db->get();
    $date = $query->row()->tanggal_informasi;
    return hari(date('D', strtotime($date))) . ', ' . bulan_indo($date);
}

function get_raport()
{
    $ci = &get_instance();
    $ci->db->from('tb_informasi');
    $ci->db->where('tipe_informasi', 3);
    $query = $ci->db->get();
    $date = $query->row()->tanggal_informasi;
    return hari(date('D', strtotime($date))) . ', ' . bulan_indo($date);
}

# ================ Function Management Akses User =====================

function login()
{
    $ci = &get_instance();
    $id = $ci->session->userdata('userid');
    $email = $ci->session->userdata('email');

    if ($id == null) {
        $ci->session->set_flashdata('login', 'Silahkan Login untuk mengakses Portal Akademik !');
        redirect('admin/auth');
    }
}

function session_expire()
{
    $ci = &get_instance();
    $sess_id = $ci->session->userdata('userid');
    if ($sess_id == null) {
        $ci->session->set_flashdata('warning', 'Sesi Waktu Sudah Kadalwarsa, <br> Silahkan Login Kembali...');
        redirect('id');
    }
}

function get_identity_user_admin($id_user)
{
    $ci = &get_instance();
    $ci->db->from('tb_user_admin');
    $ci->db->where('id_user_admin', $id_user);
    $query = $ci->db->get();
    return $query;
}

function get_identity_user($id_user)
{
    $ci = &get_instance();
    $ci->db->from('tb_user');
    $ci->db->where('id_user', $id_user);
    $query = $ci->db->get();
    return $query;
}

function already()
{
    $ci = &get_instance();
    $id = $ci->session->userdata('userid');

    if (get_identity_user_admin($id)->num_rows() > 0) {
        if ($id != null) {
            echo "<script>alert('Masih Login dalam Sistem, Silahkan Logout untuk Keluar')</script>";
            redirect('admin/' . (admin_role($ci->session->userdata('level')) == 'Tata Usaha' ? 'tata_usaha' : admin_role($ci->session->userdata('level'))) . '/dashboard');
        } else {
            $params = array('userid', 'username', 'level', 'first_name', 'full_name', 'second_name', 'email');
            $ci->session->unset_userdata($params);
            redirect('id');
        }
    } else if (get_identity_user($id)->num_rows() > 0) {
        if ($ci->session->userdata('level') == 1) {
            echo "<script>alert('Masih Login dalam Sistem, Silahkan Logout untuk Keluar')</script>";
            redirect('pendidik/dashboard');
        } else  if ($ci->session->userdata('level') == 2) {
            echo "<script>alert('Masih Login dalam Sistem, Silahkan Logout untuk Keluar')</script>";
            redirect('pelajar/dashboard');
        } else {
            $params = array('userid', 'username', 'level', 'first_name', 'full_name', 'second_name', 'email');
            $ci->session->unset_userdata($params);
            redirect('id');
        }
    }
}

function set_login($post)
{
    $ci = get_instance();
    $ci->load->library('user_agent');

    $params = [
        'id_user_log' => $post['id'],
        'id_user' => $post['id_client'],
        'browser_user' => $ci->agent->browser() . '-' . $ci->agent->version(),
        'os_user' => $ci->agent->platform(),
        'ip_user' => $ci->input->ip_address(),
    ];
    $ci->db->insert('tb_user_log', $params);
}

function set_logout($id)
{
    $ci = get_instance();
    $params['logout_date'] = date('Y-m-d H:i:s');
    $ci->db->where('id_user_log', $id);
    $ci->db->update('tb_user_log', $params);
}

function logout_sistem()
{
    $ci = get_instance();
    $id = $ci->session->userdata('userid');

    $ci->db->from('tb_user_log');
    $ci->db->where('id_user', $id);
    $query = $ci->db->get();

    $data = $query->row();

    if ($data->logout_date != null) {
        redirect('admin/auth/logout');
    }
}

function forced_logout($id)
{
    $ci = get_instance();
    $params['logout_date'] = date('Y-m-d H:i:s');
    $ci->db->where('id_user', $id);
    $ci->db->update('tb_user_log', $params);
}

function operator()
{
    $ci = get_instance();

    if ($ci->session->userdata('level') != 1) {
        redirect('id/error');
    }
}

function tata_usaha()
{
    $ci = get_instance();

    if ($ci->session->userdata('level') != 2) {
        redirect('id/error');
    }
}

function akademik()
{
    $ci = get_instance();

    if ($ci->session->userdata('level') != 3) {
        redirect('id/error');
    }
}

function kesiswaan()
{
    $ci = get_instance();

    if ($ci->session->userdata('level') != 4) {
        redirect('id/error');
    }
}

function keuangan()
{
    $ci = get_instance();

    if ($ci->session->userdata('level') != 5) {
        redirect('id/error');
    }
}

function multi_admin()
{
    $ci = get_instance();

    if ($ci->session->userdata('level') != 1) {
        if ($ci->session->userdata('level') != 2) {
            redirect('id/error');
        }
    }
}

function all_admin()
{
    $ci = get_instance();

    if ($ci->session->userdata('level') != 1) {
        if ($ci->session->userdata('level') != 2) {
            if ($ci->session->userdata('level') != 3) {
                if ($ci->session->userdata('level') != 4) {
                    if ($ci->session->userdata('level') != 5) {
                        redirect('id/error');
                    }
                }
            }
        }
    }
}

// ======================== Management Peserta Didik ===========================

function login_pedik()
{
    $ci = &get_instance();
    $id = $ci->session->userdata('userid');

    if ($id == null) {
        $ci->session->set_flashdata('login', 'Silahkan Login untuk mengakses Portal Akademik !');
        redirect('id');
    }
}

function get_login_pedik($id_user)
{
    $ci = &get_instance();

    $ci->db->from('tb_user_log');
    $ci->db->where('id_user', $id_user);
    $ci->db->order_by('login_date', 'ASC');
    $ci->db->limit(1);
    $query = $ci->db->get();
    return $query->row();
}

function get_peserta_nisn($nisn)
{
    $ci = &get_instance();

    $ci->db->from('tb_siswa');
    $ci->db->where('nisn_siswa', $nisn);
    $query = $ci->db->get();
    return $query;
}

function get_pendidik_nip($nip)
{
    $ci = &get_instance();

    $ci->db->from('tb_pendidik');
    $ci->db->where('nip_pendidik', $nip);
    $query = $ci->db->get();
    return $query;
}

function get_berita($limit = null)
{
    $ci = &get_instance();

    $ci->db->from('tb_pengumuman_berita');
    $ci->db->join('tb_user_admin', 'tb_pengumuman_berita.id_user_admin = tb_user_admin.id_user_admin');
    $ci->db->where('cat_berita', 1);
    $ci->db->order_by('tb_pengumuman_berita.created_berita', 'DESC');
    if ($limit != null) {
        $ci->db->limit($limit);
    }
    $query = $ci->db->get();
    return $query;
}

function get_more_berita($id)
{
    $ci = &get_instance();

    $ci->db->from('tb_pengumuman_berita');
    $ci->db->join('tb_user_admin', 'tb_pengumuman_berita.id_user_admin = tb_user_admin.id_user_admin');
    $ci->db->where('id_berita', $id);
    $query = $ci->db->get();
    return $query->row();
}

function jenis_berita($role)
{
    $ci = &get_instance();
    if ($role == 1) {
        return 'Portal Akademik';
    } else if ($role == 2) {
        return 'Administrasi';
    } else if ($role == 3) {
        return 'Akademik';
    } else if ($role == 4) {
        return 'Kesiswaan';
    } else if ($role == 5) {
        return 'Finansial';
    }
}

function icon_berita($role)
{
    $ci = &get_instance();
    if ($role == 1) {
        return 'fa fa-cogs';
    } else if ($role == 2) {
        return 'fa fa-university';
    } else if ($role == 3) {
        return 'fa fa-book-reader';
    } else if ($role == 4) {
        return 'fa fa-users';
    } else if ($role == 5) {
        return 'fa fa-money-bill-alt';
    }
}

function get_pengumuman($id = null)
{
    $ci = &get_instance();

    $ci->db->from('tb_pengumuman_berita');
    $ci->db->join('tb_user_admin', 'tb_pengumuman_berita.id_user_admin = tb_user_admin.id_user_admin');
    $ci->db->order_by('tb_pengumuman_berita.created_berita', 'DESC');
    if ($id != null) {
        $ci->db->where('tb_pengumuman_berita.id_berita', $id);
    }
    $query = $ci->db->get();
    return $query->row();
}
