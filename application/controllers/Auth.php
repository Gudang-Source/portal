<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function process(){
		$post = $this->input->post(null, TRUE); 
		if(isset($post['submit'])){
			$this->load->model('auth_m');
			$query = $this->auth_m->auth($post);
			if($query->num_rows() > 0){
				$query_pas = $this->auth_m->auth_pass($post);
				if($query_pas->num_rows() > 0){
					$row = $query->row();
					if ($row->status_user == 1) {

						$id_client = random_string('nozero', 10);
						$log = [
							'id' => $id_client,
							'id_client' => $row->id_user,
						];
                        set_login($log);
                        
                        if($row->role_user == 1){
                            $data = $this->auth_m->get_user_pendidik($row->id_user);
                            $params = array(
                                'userid' => $row->id_user,
                                'username' => $row->username_user, 
                                'level' => $row->role_user,
                                'full_name' => $row->nama_pendidik,
                                'email' =>  $row->email,
                                'log' => $id_client
                            );
                        }else if($row->role_user == 2){
                            $data = $this->auth_m->get_user_pedik($row->id_user);
                            $params = array(
                                'userid' => $row->id_user,
                                'username' => $row->username_user, 
                                'level' => $row->role_user,
                                'full_name' => $row->nama_siswa,
                                'email' =>  $row->email,
                                'log' => $id_client
                            );
                        }

						$this->session->set_userdata($params);

						maintenace_mode();
						if ($row->role_user == 1) {
							redirect('pendidik/dashboard');
						}else if($row->role_user == 2){
							redirect('pelajar/dashboard');
						}else{
							redirect('id');
						}
					}else{
						$this->session->set_flashdata('u-ser', $post['username']);
						$this->session->set_flashdata('u-pas', $post['password']);
						$this->session->set_flashdata('aktivasi', 'Akun Belum Aktif, <br> Silahkan periksa Email terdaftar untuk Aktivasi');
						redirect('id');
					}
				}else{
					$this->session->set_flashdata('u-ser', $post['username']);
					$this->session->set_flashdata('u-pas', $post['password']);
					$this->session->set_flashdata('password', 'Maaf Password yang dimasukkan salah !!!');
					redirect('id');
				}
			}else{
				$this->session->set_flashdata('u-ser', $post['username']);
				$this->session->set_flashdata('u-pas', $post['password']);
				$this->session->set_flashdata('username', 'Maaf username yang dimasukkan salah !!!');
				redirect('id');
			}
		}
	}
    
	function logout(){
		$id = $this->session->userdata('userid');
		set_logout($this->session->userdata('log'));

        $params = array('userid','username','level','full_name','email','log');
		$this->session->unset_userdata($params);
		redirect('id');
	}
	
	function register(){
		$this->template->load('landing/template','landing/register');
	}

	function proses_registrasi(){
		$post = $this->input->post(null, TRUE);
		if(isset($post['register'])){
			$this->load->model('auth_m');
			$nisn = $this->auth_m->get_nisn($post['r_nisn']);
			if($nisn->num_rows() > 0){
				$email = $this->auth_m->get_email($post['r_email']);
				if($email->num_rows() > 0){
					$this->session->set_flashdata('reg_nisn', $post['r_nisn']);
					$this->session->set_flashdata('reg_email', $post['r_email']);
					$this->session->set_flashdata('email', 'Maaf E-Mail Sudah terdaftar pada sistem, Silahkan Gunakan Email Baru !');
					redirect('auth/register');
				}else{
					$post['id_user'] = random_string('nozero', 8).''.date('dmyhis');
					$smtp = pendaftaran_siswa($post);
					if($smtp){
						$this->auth_m->set_user($post);
						if($this->db->affected_rows() > 0){
							$this->auth_m->set_user_siswa($post);
							$this->session->set_flashdata('reg_nisn', $post['r_nisn']);
							$this->session->set_flashdata('reg_email', $post['r_email']);
							$this->session->set_flashdata('succes', 'Pendaftaran Akun Baru Berhasil, <br> Gunakan NISN sebagai Username dan Password serta Periksa Email untuk Aktivasi !');
							redirect('auth/register');
						}else{
							$this->session->set_flashdata('reg_nisn', $post['r_nisn']);
							$this->session->set_flashdata('reg_email', $post['r_email']);
							$this->session->set_flashdata('error', 'Pendaftaran Akun Baru Gagal, <br> Periksa Koneksi Internet Anda');
							redirect('auth/register');
						}
					}else{
						$this->session->set_flashdata('error', 'Pendaftaran Akun Baru Gagal, Periksa Koneksi Internet Anda');
						redirect('auth/register');
					}
				}
			}else{
				$this->session->set_flashdata('reg_nisn', $post['r_nisn']);
				$this->session->set_flashdata('reg_email', $post['r_email']);
				$this->session->set_flashdata('nisn', 'Maaf NISN tidak terdaftar pada sistem !');
				redirect('auth/register');
			}
		}else{
			redirect('auth/register');
		}
	}

	function aktivasi($id){
		$expired = $_GET['d'];
		$today =date('dmy');

		if($expired == $today){
			$this->load->model('auth_m');
			$this->auth_m->activate($id);
			$this->session->set_flashdata('succes', 'Aktivasi Akun Berhasil, <br> Silahkan Login dan Perbaharui Informasi Anda!');
			redirect('id');
		}else{
			$this->session->set_flashdata('error', 'Aktivasi Akun Gagal,<br> Kode Aktivasi sudah Usang, Silahkan Hubungi Admin Untuk Aktivasi Manual!');
			redirect('id');
		}
	}

	function forgot(){
		$this->template->load('landing/template','landing/forgot');
	}

	function proses_forgot(){
		$post = $this->input->post(null, TRUE);
		if(isset($post['forgot'])){
			$this->load->model('auth_m');
			$email = $this->auth_m->get_email($post['r_email']);
			if($email->num_rows() == 0){
				$this->session->set_flashdata('reg_email', $post['r_email']);
				$this->session->set_flashdata('email', 'Maaf E-Mail Tidak terdaftar pada sistem, Silahkan Gunakan yang sudah terdaftar !');
				redirect('auth/forgot');
			}else{
				$post['r_email'] = $post['r_email'];
				$post['id_user'] = $email->row()->id_user;
				$post['username'] = $email->row()->username_user ;
				$post['level'] = $email->row()->role_user == 1 ? 'Tenaga Pendidik' : 'Peserta Didik';
				$post['tgl_reset'] = date('d m Y H:i');
				$smtp = forogt_reset($post);
				
			}
		}else{
			redirect('auth/forgot');
		}
	}

}
