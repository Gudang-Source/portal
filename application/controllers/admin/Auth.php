<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index(){
		already();
		$this->load->view('admin/auth/index');
	}

	function authentication(){
		$post = $this->input->post(null, TRUE); 
		if(isset($post['submit'])){
			$this->load->model('admin/auth_m');
			$query = $this->auth_m->auth($post);
			if($query->num_rows() > 0){
				$query_pas = $this->auth_m->auth_pass($post);
				if($query_pas->num_rows() > 0){
					$row = $query->row();
					if ($row->status_user_admin == 1) {

						$id_client = random_string('nozero', 10);
						$log = [
							'id' => $id_client,
							'id_client' => $row->id_user_admin,
						];
						set_login($log);

						$params = array(
							'userid' => $row->id_user_admin,
							'username' => $row->username_user_admin, 
							'level' => $row->role_user_admin,
							'first_name' => $row->nama_depan_user_admin,
							'second_name' => $row->nama_belakang_user_admin,
							'email' =>  $row->email_user_admin,
							'log' => $id_client
						);
						$this->session->set_userdata($params);

						if ($row->role_user_admin == 1) {
							redirect('admin/operator/dashboard');
						}else if($row->role_user_admin == 2){
							redirect('admin/tata_usaha/dashboard');
						}else if($row->role_user_admin == 3){
							redirect('admin/akademik/dashboard');
						}else if($row->role_user_admin == 4){
							redirect('admin/kesiswaan/dashboard');
						}else if($row->role_user_admin == 5){
							redirect('admin/keuangan/dashboard');
						}else{
							redirect('admin/auth/logout');
						}
					}else{
						$this->session->set_flashdata('u-ser', $post['username']);
						$this->session->set_flashdata('u-pas', $post['password']);
						$this->session->set_flashdata('aktivasi', 'Maaf Belum Aktif, Silahkan Hubungi Admin');
						redirect('admin/auth');
					}
				}else{
					$this->session->set_flashdata('u-ser', $post['username']);
					$this->session->set_flashdata('u-pas', $post['password']);
					$this->session->set_flashdata('password', 'Maaf Password yang dimasukkan salah !!!');
					redirect('admin/auth');
				}
			}else{
				$this->session->set_flashdata('u-ser', $post['username']);
				$this->session->set_flashdata('u-pas', $post['password']);
				$this->session->set_flashdata('username', 'Maaf username yang dimasukkan salah !!!');
				redirect('admin/auth');
			}
		}
	}
    
	function logout(){
		$id = $this->session->userdata('userid');
		set_logout($this->session->userdata('log'));

		$params = array('userid','username','level','level','first_name', 'second_name','email');
		$this->session->unset_userdata($params);
		redirect('admin/auth');
	}

	public function forgot_email(){
		$post = $this->input->post(null, TRUE);
		if (isset($post['f_email'])) {
			$this->load->model('admin/auth_m');
			$row = $this->auth_m->get_email($post);
			if ($row->num_rows() > 0) {
				$message = 
					'<b><h3>Permintaan Reset Password Disetujui Oleh Sistem....</h3></b><br>
					Id User : '.$row->row()->id_user_admin.'<br> 
					Nama    : '.$row->row()->nama_depan_user_admin.' '.$row->row()->nama_belakang_user_admin.'<br>
					E-Mail  : '.$row->row()->email_user_admin.'<br>
					Silahkan Klik <b> <a href="'.site_url('admin/auth/forgot_repass?id='.$row->row()->id_user_admin.'&exp='.date('d-m')).'"> Link ini </a> </b> untuk memuat Laman Reset Password Baru';
				$destination = $row->row()->email_user_admin;
				$subject = 'Permintaan Reset Password Baru ...';
				$post = [
					'destination' => $destination,
					'subject' => $subject,
					'massage' => $message
				];

				$sender = smtp_email($post); # $post = ['destination' => ?, 'subject' => ?, 'massage'=> ?] 
				if ($sender == 1) {
					$this->session->set_flashdata('email', '* Silahkan Periksa E-Mail Anda untuk Mendapatkan Kode Verifikasi');
					$this->load->view('admin/auth/forgot');
				}else{
					$this->session->set_flashdata('email', '* Permintaan Gagal Dikirim, Periksa apakah E-Mail sudah benar dan pastikan anda terhubung internet');
					redirect('admin/auth/forgot_email');
				}
			}else{
				$this->session->set_flashdata('email', '* E-Mail tidak terdaftar pada sistem, Silahkan coba lagi...');
				redirect('admin/auth/forgot_email');
			}
		}else {
			$this->load->view('admin/auth/forgot');
		}
	}

	public function forgot_repass(){
		$post = $this->input->post(null, TRUE);
		if (isset($post['f_repass'])) {
			$this->load->model('admin/auth_m');
			$this->auth_m->set_password($post);

			$this->session->set_flashdata('values', '* Password Berhasil Diperbaharui, Klik Tombol unutk kembali ke menu login ..');
			redirect('admin/auth/forgot_success');
		}else{
			$data['id'] = $_GET['id'];
			$expire = $_GET['exp'];
			
			if($expire == date('d-m')){
				$this->load->view('admin/auth/forgot', $data);
			}else{
				$this->session->set_flashdata('email', '* Link Pengalihan sudah Expired, Silahkan Ulangi Proses Reset Password....');
				redirect('admin/auth/forgot_email');
			}
		}
	}

	public function forgot_success(){
		$this->load->view('admin/auth/forgot');
	}


	public function reset_password($id){
		if($id != null){
			$data['id'] = $id;
			$this->load->view('admin/auth/new_password', $data);
		}else{
			redirect('admin/auth/forgot_admin');
		}
	}

	function proses_renew(){
		$this->load->model('admin/auth_m');
		$post = $this->input->post(null, TRUE);
		$this->form_validation->set_rules('u_pass', 'Password', 'required|min_length[8]',
				array('min_length' => 'Panjang Minimal Password 8 Karakter'));
		$this->form_validation->set_rules('u_repass', 'Repassword', 'required|matches[u_pass]',
				array('matches' => 'Perulangan Password tidak sesuai'));
		if ($this->form_validation->run() == TRUE){
			$this->auth_m->set_password($post);
			redirect('admin/auth');
		}else{
			redirect('admin/auth/reset_password/'.$post['id']);
		}
	}

	public function not_found(){
		$this->load->view('errors/page/404');
	}

}
