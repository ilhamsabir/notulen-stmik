<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		//Validasi
		$valid 	= 	$this->form_validation;
		$valid->set_rules(	'email','Email','required',
							array('required'	=>	'Email harus diisi.'));
		$valid->set_rules(	'password','Password','required',
							array('required'	=>	'Password harus diisi.'));

		if($valid->run()) {

			$data = array(
				'email' => $this->input->post('email', TRUE),
				'password' => sha1($this->input->post('password', TRUE))
			);
			$hasil = $this->muser->cek_user($data);
			if ($hasil->num_rows() == 1){
				foreach($hasil->result() as $sess)
				{
					$sess_data['logged_in'] 	= 'Anda sudah login.';
					$sess_data['id']			= $sess->id;
					$sess_data['nama'] 			= $sess->nama;
					$sess_data['email'] 		= $sess->email;
					$sess_data['alamat'] 		= $sess->alamat;
					$sess_data['no_telp'] 		= $sess->no_telp;
					$sess_data['role'] 			= $sess->role;
					$this->session->set_userdata($sess_data);
				}

				if ($this->session->userdata('role')=='Admin'){
					$this->session->set_flashdata('sukses', 'Anda berhasil login. Akses level: Admin');
					redirect(base_url('admin'));
				} elseif ($this->session->userdata('role')!='Admin'){
					$this->session->set_flashdata('sukses', 'Anda berhasil login. Akses level: Notulis');
					redirect(base_url('notulis'));
				} else {
					$this->session->set_flashdata('sukses', 'Maaf, anda tidak memiliki akses masuk.');
					redirect(base_url('login'));
				}
			} else {
				$this->session->set_flashdata('sukses', 'Maaf, kombinasi email dan password salah.');
				redirect(base_url('login'), 'refresh');
			}
	}

		$data = array(	'title' 	=> 	'Aplikasi Notulen » Login User');
		$this->load->view('login', $data);
	}

	//Logout
	public function logout()
	{
		$this->session->set_flashdata('sukses', 'Terimakasih, anda telah berhasil logout.');
		$this->session->sess_destroy();
		redirect('login');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */