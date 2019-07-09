<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notulis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	}

	public function index()
	{
		$data['title']			=	'Halaman Notulis » Dashboard';
		$data['list_acara']		=	$this->madmin->list_acaraIntIDPembuat();
		$data['acara_internal']	=	$this->madmin->list_acaraInt();
		$data['list_acaraInt']	=	$this->madmin->list_acaraIntID();
		$data['acara_eksternal']=	$this->madmin->list_acaraEks();
		$data['list_acaraEks']	=	$this->madmin->list_acaraEksID();
		$data['list_notulen']	=	$this->madmin->notulenID();
		$data['notulen_ikut']	=	$this->madmin->report_eksternal();
		$data['notulen_all']	=	$this->madmin->notulen();
		$data['content']		=	'notulis/data/dashboard';
		$this->load->view('notulis/layouts/app', $data, FALSE);
	}

	//Change Data Diri
	public function cg_data($id)
	{
		//Validasi
		$valid 	= 	$this->form_validation;
		
		$valid->set_rules(	'nama','Nama','required',
							array(	'required'	=>	'Field Nama tidak valid atau belum diisi.'));
		$valid->set_rules(	'alamat','Alamat','required',
							array(	'required'	=>	'Field Alamat tidak valid atau belum diisi.'));
		$valid->set_rules(	'no_telp','Nomor Telepon','required',
							array(	'required'	=>	'Field Nomor Telepon tidak valid atau belum diisi.'));
		$valid->set_rules(	'email','Email','required|valid_email',
							array(	'required'		=>	'Field email belum diisi.',
									'valid_email'	=>	'Email tidak valid!'));

		if($valid->run()==FALSE){
		//End Validasi

		$data = array(	'title' 	=> 	'Halaman Notulis » Edit Data Diri',
						'show'		=>	$this->madmin->detail_notulis($id),
						'content'	=>	'notulis/data/cg_data'
					);
		$this->load->view('notulis/layouts/app', $data);

		//Masuk Database
		} else {
			$i 				=	$this->input;
			$values			=	array(	
							'id'					=>	$i->post('id'),
							'nama'					=>	$i->post('nama'),
							'alamat'				=>	$i->post('alamat'),
							'no_telp'				=>	$i->post('no_telp'),
							'email'					=>	$i->post('email'),
						);

			$this->madmin->update_notulis($values);
			$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Data berhasil diupdate.');
			redirect('notulis','refresh');
		}
	}

	//Change Password
	public function cg_password($id)
	{
		//Validasi
		$valid 	= 	$this->form_validation;
		
		$valid->set_rules(	'password','Password Baru','required|min_length[3]',
							array(	'required'		=>	'Field Password Baru tidak valid atau belum diisi.',
									'min_length'	=>	'Password minimal 3 karakter!'));
		$valid->set_rules(	'passconf','Konfirmasi Password','required|min_length[3]|matches[password]',
							array(	'required'		=>	'Mohon konfirmasi password baru anda.',
									'min_length'	=>	'Password minimal 3 karakter!',
									'matches'		=>	'Konfirmasi password tidak cocok!'));

		if($valid->run()==FALSE){
		//End Validasi

		$data = array(	'title' 	=> 	'Halaman Notulis » Edit Password',
						'show'		=>	$this->madmin->detail_notulis($id),
						'content'	=>	'notulis/data/cg_password'
					);
		$this->load->view('notulis/layouts/app', $data);

		//Masuk Database
		} else {
			$i 				=	$this->input;
			$values			=	array(	
							'id'					=>	$i->post('id'),
							'password'				=>	sha1($i->post('passconf'))
						);

			$this->madmin->update_notulis($values);
			$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Password berhasil diupdate.');
			redirect('notulis','refresh');
		}
	}

	//List Acara Internal
	public function acara_internal()
	{
		$data['title']			=	'Halaman Notulis » List Acara Internal';
		$data['acara_internal']	=	$this->madmin->list_acaraInt();
		$data['list_pembuat']	=	$this->madmin->list_acaraIntIDPembuat();
		$data['list_notulis']	=	$this->madmin->list_acaraIntID();
		$data['content']		=	'notulis/data/acara_internal';
		$this->load->view('notulis/layouts/app', $data, FALSE);
	}

	//List Acara Eksternal
	public function acara_eksternal()
	{
		$data['title']			=	'Halaman Notulis » List Acara Internal';
		$data['acara_eksternal']=	$this->madmin->list_acaraEks();
		$data['list_eksternal']	=	$this->madmin->list_acaraEksID();
		$data['content']		=	'notulis/data/acara_eksternal';
		$this->load->view('notulis/layouts/app', $data, FALSE);
	}

	//Create Acara Internal
	public function create_acara()
	{
		//Validasi
		$valid 	= 	$this->form_validation;
		$valid->set_rules(	'pemimpin','Pemimpin','required',
							array(	'required'	=>	'Field Pemimpin Acara harus diisi.'));
		$valid->set_rules(	'pengaju','Pengaju','required',
							array(	'required'	=>	'Field Pengaju harus diisi.'));
		$valid->set_rules(	'tempat','Tempat','required',
							array(	'required'	=>	'Field Tempat harus diisi.'));
		$valid->set_rules(	'tanggal','Tanggal','required',
							array(	'required'	=>	'Field Tanggal Mulai harus diisi.'));
		$valid->set_rules(	'pukul','Pukul','required',
							array(	'required'	=>	'Field Pukul Telepon harus diisi.'));
		$valid->set_rules(	'acara','Acara','required',
							array(	'required'		=>	'Field Acara belum diisi.'));

		if($valid->run()==FALSE){
		//End Validasi

		$data = array(	'title' 	=> 	'Halaman Notulis » Tambah Data Acara Internal',
						'content'	=>	'notulis/data/create_acara_internal',
						'users'		=>	$this->madmin->list_users(),
						'kodeauto'	=>	$this->madmin->kode_acara(),
					);
		$this->load->view('notulis/layouts/app', $data);

		//Masuk Database
		} else {
		//Insert Acara
		$values	=	array(	
							'kode'			=>	$this->input->post('kode'),
							'id_notulis'	=>	$this->input->post('id_notulis'),
							'pemimpin'		=>	$this->input->post('pemimpin'),
							'id_pembuat'	=>	$this->input->post('id_pembuat'),
							'pengaju'		=>	$this->input->post('pengaju'),
							'tempat'		=>	$this->input->post('tempat'),
							'tanggal'		=>	$this->input->post('tanggal'),
							'pukul'			=>	$this->input->post('pukul'),
							'acara'			=>	$this->input->post('acara'),
							'jenis'			=>	'Internal'
						);

			$this->db->insert('acara', $values);
			$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Acara berhasil dibuat.');
			redirect('notulis/acara_internal','refresh');	
		}
	}

	//Create Acara Eksternal
	public function create_acaraEks()
	{
		//Validasi
		$valid 	= 	$this->form_validation;
		$valid->set_rules(	'nomor_surat','Nomor Surat','required',
							array(	'required'	=>	'Field Nomor Surat harus diisi.'));
		$valid->set_rules(	'pengaju','Pengaju','required',
							array(	'required'	=>	'Field Pengaju harus diisi.'));
		$valid->set_rules(	'tempat','Tempat','required',
							array(	'required'	=>	'Field Tempat harus diisi.'));
		$valid->set_rules(	'tanggal','Tanggal','required',
							array(	'required'	=>	'Field Tanggal Mulai harus diisi.'));
		$valid->set_rules(	'tanggal_selesai','Tanggal Selesai','required',
							array(	'required'	=>	'Field tanggal_selesai harus diisi.'));
		$valid->set_rules(	'pukul','Pukul','required',
							array(	'required'	=>	'Field Pukul Telepon harus diisi.'));
		$valid->set_rules(	'acara','Acara','required',
							array(	'required'		=>	'Field Acara belum diisi.'));

		if($valid->run()==FALSE){
		//End Validasi

		$data = array(	'title' 	=> 	'Halaman Notulis » Tambah Data Acara Eksternal',
						'content'	=>	'notulis/data/create_acara_eksternal',
						'kodeauto'	=>	$this->madmin->kode_acara(),
					);
		$this->load->view('notulis/layouts/app', $data);

		//Masuk Database
		} else {

		//Insert Acara
		$start_date	=	$this->input->post('tanggal');
		$end_date 	= 	$this->input->post('tanggal_selesai');
		$values		=	array(	
							'kode'				=>	$this->input->post('kode'),
							'id_notulis'		=>	$this->input->post('id_notulis'),
							'id_pembuat'		=>	$this->input->post('id_pembuat'),
							'nomor_surat'		=>	$this->input->post('nomor_surat'),
							'pengaju'			=>	$this->input->post('pengaju'),
							'penanggung_jawab'	=>	$this->input->post('penanggung_jawab'),
							'tempat'			=>	$this->input->post('tempat'),
							'tanggal'			=>	$this->input->post('tanggal'),
							'tanggal_selesai'	=>	$this->input->post('tanggal_selesai'),
							'tanggal_deadline'	=>	date('Y-m-d', strtotime($this->input->post('tanggal_selesai').'+ 5 days')),
							// 'selisih'			=>	((abs(strtotime ($end_date) - strtotime ($start_date)))/(60*60*24)+1),
							'pukul'				=>	$this->input->post('pukul'),
							'acara'				=>	$this->input->post('acara'),
							'jenis'				=>	'Eksternal'
						);

			$this->db->insert('acara', $values);
			$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Acara berhasil dibuat.');
			redirect('notulis/acara_eksternal','refresh');	
		}
	}

	//Update Acara Internal
	public function update_acara($kode)
	{
		//Validasi
		$valid 	= 	$this->form_validation;
		
		$valid->set_rules(	'pengaju','Pengaju','required',
							array(	'required'	=>	'Field Pengaju harus diisi.'));
		$valid->set_rules(	'pemimpin','Pemimpin','required',
							array(	'required'	=>	'Field Pemimpin Acara harus diisi.'));
		$valid->set_rules(	'tempat','Tempat','required',
							array(	'required'	=>	'Field Tempat harus diisi.'));
		$valid->set_rules(	'tanggal','Tanggal','required',
							array(	'required'	=>	'Field Tanggal Mulai harus diisi.'));
		$valid->set_rules(	'pukul','Pukul','required',
							array(	'required'	=>	'Field Pukul Telepon harus diisi.'));
		$valid->set_rules(	'acara','Acara','required',
							array(	'required'		=>	'Field Acara belum diisi.'));
		if($valid->run()==FALSE){
		//End Validasi

		$data = array(	'title' 	=> 	'Halaman Notulis » Edit Data Acara',
						'content'	=>	'notulis/data/update_acara_internal',
						'show'		=>	$this->madmin->detail_acara($kode)
					);
		$this->load->view('notulis/layouts/app', $data);

		//Masuk Database
		} else {
			$i 				=	$this->input;
			$values			=	array(	
								'kode'			=>	$i->post('kode'),
								'pengaju'		=>	$i->post('pengaju'),
								'pemimpin'		=>	$i->post('pemimpin'),
								'tempat'		=>	$i->post('tempat'),
								'tanggal'		=>	$i->post('tanggal'),
								'pukul'			=>	$i->post('pukul'),
								'acara'			=>	$i->post('acara'),
								'status'		=> 	''
							);
			$data = array('kode_acara' => $kode);
			$this->madmin->update_acara($values);
			$this->madmin->delete_undangan($data);
			$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Data berhasil diupdate. <strong>Catatan:</strong> Silahkan undang kembali peserta, dikarenakan data acara telah diubah.');
			redirect('notulis/acara_internal','refresh');
		}
	}

	//Update Acara Eksternal
	public function update_acaraEks($kode)
	{
		//Validasi
		$valid 	= 	$this->form_validation;
		
		$valid->set_rules(	'pengaju','Pengaju','required',
							array(	'required'	=>	'Field Pengaju harus diisi.'));
		$valid->set_rules(	'tempat','Tempat','required',
							array(	'required'	=>	'Field Tempat harus diisi.'));
		$valid->set_rules(	'tanggal','Tanggal','required',
							array(	'required'	=>	'Field Tanggal Mulai harus diisi.'));
		$valid->set_rules(	'tanggal_selesai','Tanggal Selesai','required',
							array(	'required'	=>	'Field tanggal_selesai harus diisi.'));
		$valid->set_rules(	'pukul','Pukul','required',
							array(	'required'	=>	'Field Pukul Telepon harus diisi.'));
		$valid->set_rules(	'acara','Acara','required',
							array(	'required'		=>	'Field Acara belum diisi.'));
		if($valid->run()==FALSE){
		//End Validasi

		$data = array(	'title' 	=> 	'Halaman Notulis » Edit Data Acara',
						'content'	=>	'notulis/data/update_acara_eksternal',
						'show'		=>	$this->madmin->detail_acara($kode)
					);
		$this->load->view('notulis/layouts/app', $data);

		//Masuk Database
		} else {
			$start_date	=	$this->input->post('tanggal');
			$end_date 	= 	$this->input->post('tanggal_selesai');
			$i 				=	$this->input;
			$values			=	array(	
								'kode'				=>	$i->post('kode'),
								'pengaju'			=>	$i->post('pengaju'),
								'penanggung_jawab'	=>	$i->post('penanggung_jawab'),
								'tempat'			=>	$i->post('tempat'),
								'tanggal'			=>	$i->post('tanggal'),
								'tanggal_selesai'	=>	$i->post('tanggal_selesai'),
								'tanggal_deadline'	=>	date('Y-m-d', strtotime($this->input->post('tanggal_selesai').'+ 5 days')),
								'selisih'			=>	((abs(strtotime ($end_date) - strtotime ($start_date)))/(60*60*24)+1),
								'pukul'				=>	$i->post('pukul'),
								'acara'				=>	$i->post('acara'),
								'status'			=> 	''
							);
			$data = array('kode_acara' => $kode);
			$this->madmin->update_acara($values);
			$this->madmin->delete_undangan($data);
			$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Data berhasil diupdate. <strong>Catatan:</strong> Silahkan undang kembali peserta, dikarenakan data acara telah diubah.');
			redirect('notulis/acara_eksternal','refresh');
		}
	}

	//Detail Acara
	public function detail_acara($kode)
	{
		$data = array(	'title' 		=> 	'Halaman Notulis » Detail Acara',
						'show'			=>	$this->madmin->detail_acara($kode),
						'get_notulis'	=>	$this->madmin->get_notulis($kode),
						'get_eventmaker'=>	$this->madmin->get_eventmaker($kode),
						'content'		=>	'notulis/data/detail_acara'
					);
		$this->load->view('notulis/layouts/app', $data);
	}

	//Delete Acara
	public function delete_acara($kode)
	{
		//Unlink Gambar
		$list 	= $this->madmin->gambarID($kode);
		$files 	= $this->madmin->filesID($kode);
		if(!empty($list)){
			foreach ($list as $show) {
				unlink('./assets/img/dokumentasi/'.$show->gambar);
			}
		}

		if (!empty($files)) {
			foreach ($files as $show) {
				unlink('./assets/files/'.$show->file);
			}
		}
		
		$data 	= array('kode' 			=> 	$kode);
		$values	= array('kode_acara'	=>	$kode);
		$this->madmin->delete_acara($data);
		$this->madmin->delete_notulenID($values);
		$this->madmin->delete_gambarID($values);
		$this->madmin->delete_kehadiranID($values);
		$this->madmin->delete_filesID($values);
		$this->madmin->delete_undangan($values);
		$this->madmin->delete_notEksID($values);
		$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Data berhasil dihapus.');
		redirect($this->agent->referrer(),'refresh');
	}

	//Kirim Undangan
	public function send_invite($kode)
	{
		//Validasi
		$valid = $this->form_validation;

		$valid->set_rules(	'undangan[]','Undangan','required',
							array(	'required'	=>	'Field Undangan tidak valid atau belum diisi.'));

		if($valid->run()==FALSE){

			$data['show']		=	$this->madmin->detail_acara($kode);
			$data['umum']		=	$this->madmin->notulis_general();
			$data['akademik']	=	$this->madmin->notulis_akademik();
			$data['dosen']		=	$this->madmin->notulis_dosen();
			$data['bem']		=	$this->madmin->notulis_bem();
			$data['get_notulis']=	$this->madmin->get_notulis($kode);
			$data['title']		=	'Halaman Notulis » Kirim Undangan';
			$data['content']	=	'notulis/data/send_invite';
			$this->load->view('notulis/layouts/app', $data);

			$dompdf = new Dompdf\Dompdf();
		    $dompdf->loadHtml($this->load->view('notulis/data/undangan', $data, TRUE));
		    $dompdf->setPaper('A4', 'portrait');
		    $dompdf->render();
		    $output = $dompdf->output();
		    file_put_contents('assets/files/Undangan Rapat '.date('d-m-Y').'.pdf', $output);

		} else {

			//Multiple Files
			if(!empty($_FILES['berkas']['name'])){
				$filesNumber	=	sizeof($_FILES['berkas']['tmp_name']);
				$files 			=	$_FILES['berkas'];
				$config['upload_path']          = './assets/files/';
                $config['allowed_types']        = 'pdf|doc|docx|xlsx|ppt|jpg|png|mp4';
                $config['max_size']             = 2048;

				for ($i = 0; $i < $filesNumber ; $i++) {
					$_FILES['berkas']['name']		=	$files['name'][$i];
					$_FILES['berkas']['type']		=	$files['type'][$i];
					$_FILES['berkas']['tmp_name']	=	$files['tmp_name'][$i];
					$_FILES['berkas']['error']		=	$files['error'][$i];
					$_FILES['berkas']['size']		=	$files['size'][$i];

					$this->upload->initialize($config);
					if($this->upload->do_upload('berkas')){
						$data = $this->upload->data();

						$insert[$i]['file']			= $data['file_name'];
						$insert[$i]['kode_acara']	= $this->input->post('kode_acara');
					}
				}

				$this->db->insert_batch('files', $insert);
			}

			$data 	= 	array();
			$count 	=	count($this->input->get_post('undangan'));
			for ($i = 0; $i < $count; $i++) {
			$data[]	=	array(	'kode_acara'	=>	$this->input->post('kode_acara'),
								'email_peserta'	=>	$this->input->post('undangan')[$i],
								'status'		=>	'Diundang'
							);	

			$config = Array(
			  'smtp_host' 	=> 'mail.stmik-bandung.online',
			  'smtp_port' 	=> 587,
			  'smtp_user' 	=> 'notulen@stmik-bandung.online',
			  'smtp_pass' 	=> '3P=mbKS{=@Yv',
			  'mailtype' 	=> 'html',
			  'charset' 	=> 'iso-8859-1',
			  'wordwrap' 	=> TRUE
			);

			$files = $this->madmin->filesID($kode);
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");
			$this->email->from('notulen@stmik-bandung.online', $this->session->userdata('nama'));
			$this->email->to($data[$i]['email_peserta']);
			$this->email->subject('Undangan Rapat');
			$this->email->message('Berikut terlampir undangan rapat.');
			$this->email->attach('./assets/files/Undangan Rapat '.date('d-m-Y').'.pdf');
			foreach ($files as $show) {
				$this->email->attach('./assets/files/'.$show->file);
			}
			$this->email->send();
			
			}

			foreach ($files as $show) {
				unlink ('./assets/files/'.$show->file);
			}
			unlink ('./assets/files/Undangan Rapat '.date('d-m-Y').'.pdf');

			$values	=	array(	
								'kode'		=>	$this->input->post('kode_acara'),
								'status'	=>	'Undangan Terkirim'	
							);

			$kode 	=	array('kode_acara'	=>	$kode);
			$this->db->insert_batch('undangan', $data);
			$this->madmin->delete_filesID($kode);
			$this->madmin->update_acara($values);
			$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Undangan berhasil dikirim.');
			redirect('notulis/acara_internal','refresh');
		}
	}

	//Jumlah Invite Eksternal
	public function jumlah_inviteEks($kode)
	{
		$data['title']			=	'Halaman Notulis » Kirim Undangan';
		$data['show']			=	$this->madmin->detail_acara($kode);
		$data['content']		=	'notulis/data/jumlah_invite_eksternal';
		$this->load->view('notulis/layouts/app', $data, FALSE);
	}

	//Kirim Undangan Eksternal
	public function invite_eks($kode)
	{
		//Validasi
		$valid = $this->form_validation;

		$valid->set_rules(	'nama[]','Kode','required',
							array(	'required'	=>	'Field <b>nama</b> penerima undangan harus diisi.'));
		$valid->set_rules(	'jabatan[]','Kode','required',
							array(	'required'	=>	'Field <b>jabatan</b> penerima undangan harus diisi.'));
		$valid->set_rules(	'undangan[]','Kode','required',
							array(	'required'	=>	'Field <b>email</b> penerima undangan harus diisi.'));


		if($valid->run()==FALSE){

			$data['show']			=	$this->madmin->detail_acara($kode);
			$data['title']			=	'Halaman Notulis » Kirim Undangan';
			$data['content']		=	'notulis/data/send_invite';
			$data['emails']			=	$this->input->post('penerima');
			$this->load->view('notulis/layouts/app', $data);

		} else {

			$data 	= 	array();
			$count 	=	count($this->input->get_post('undangan'));
			for ($i = 0; $i < $count; $i++) {
			$data[]	=	array(	'kode_acara'		=>	$this->input->post('kode_acara'),
								'nama_peserta'		=>	$this->input->post('nama')[$i],
								'jabatan_peserta'	=>	$this->input->post('jabatan')[$i],
								'email_peserta'		=>	$this->input->post('undangan')[$i],
								'status'			=>	'Diundang'
							);
			}
			
			$this->db->insert_batch('undangan', $data);
			
			$data['show']			=	$this->madmin->detail_acara($kode);
			$data['invited']		=	$this->madmin->invitedEksternal($kode);
			$data['diundang']		=	$this->madmin->invited($kode);
			$dompdf = new Dompdf\Dompdf();
		    $dompdf->loadHtml($this->load->view('notulis/data/undangan_eksternal', $data, TRUE));
		    $dompdf->setPaper('A4', 'portrait');
		    $dompdf->render();
		    $output = $dompdf->output();
		    file_put_contents('assets/files/Surat Tugas '.date('d-m-Y').'.pdf', $output);

			//Multiple Files
			if(!empty($_FILES['berkas']['name'])){
				$filesNumber	=	sizeof($_FILES['berkas']['tmp_name']);
				$files 			=	$_FILES['berkas'];
				$config['upload_path']          = './assets/files/';
                $config['allowed_types']        = 'pdf|doc|docx|xlsx|ppt|jpg|png|mp4';
                $config['max_size']             = 2048;

				for ($i = 0; $i < $filesNumber ; $i++) {
					$_FILES['berkas']['name']		=	$files['name'][$i];
					$_FILES['berkas']['type']		=	$files['type'][$i];
					$_FILES['berkas']['tmp_name']	=	$files['tmp_name'][$i];
					$_FILES['berkas']['error']		=	$files['error'][$i];
					$_FILES['berkas']['size']		=	$files['size'][$i];

					$this->upload->initialize($config);
					if($this->upload->do_upload('berkas')){
						$data = $this->upload->data();

						$insert[$i]['file']			= $data['file_name'];
						$insert[$i]['kode_acara']	= $this->input->post('kode_acara');
					}
				}

				$this->db->insert_batch('files', $insert);
			}

			for ($i = 0; $i < $count; $i++) {
			$config = Array(
			  'smtp_host' 	=> 'mail.stmik-bandung.online',
			  'smtp_port' 	=> 587,
			  'smtp_user' 	=> 'notulen@stmik-bandung.online',
			  'smtp_pass' 	=> '3P=mbKS{=@Yv',
			  'mailtype' 	=> 'html',
			  'charset' 	=> 'iso-8859-1',
			  'wordwrap' 	=> TRUE
			);

			$files = $this->madmin->filesID($kode);
			$detail = $this->madmin->detail_acara($kode);
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");

			$this->email->from('notulen@stmik-bandung.online', $this->session->userdata('nama'));
			$this->email->to($data[$i]['email_peserta']);
			$this->email->subject('Undangan Penugasan');
			$this->email->message('Berikut terlampir undangan rapat. Untuk mencatat notulen silahkan klik link <a href="'.base_url().'notulis/create_notulenEks/'.$this->input->post('kode_acara').'/?='.sha1($this->input->post('kode_acara')).'">berikut</a> pada tanggal yang tertera diundangan. <i>Note:</i> Batas waktu pencatatan notulen adalah '.TanggalIndo($detail->tanggal_deadline));
			$this->email->attach('./assets/files/Surat Tugas '.date('d-m-Y').'.pdf');
			foreach ($files as $show) {
				$this->email->attach('./assets/files/'.$show->file);
			}
			$this->email->send();
			
			}

			foreach ($files as $show) {
				unlink ('./assets/files/'.$show->file);
			}
			unlink ('./assets/files/Surat Tugas '.date('d-m-Y').'.pdf');

			$values	=	array(	
								'kode'		=>	$this->input->post('kode_acara'),
								'status'	=>	'Undangan Terkirim'	
							);

			$kode 	=	array('kode_acara'	=>	$kode);
			$this->madmin->delete_filesID($kode);
			$this->madmin->update_acara($values);
			$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Undangan berhasil dikirim.');
			redirect('notulis/acara_eksternal','refresh');
		}
	}

	//Tunda Acara
	public function tunda_acara($kode)
	{	
		$values['kode']		= $kode;
		$values['status']	= 'Ditunda';
		$data 				= array('kode_acara' 	=> 	$kode);
		$this->madmin->update_acara($values);
		$this->madmin->delete_undangan($data);
		$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Acara ditunda.');
		redirect($this->agent->referrer(), 'refresh');
	}

	//Cancel Acara
	public function cancel_acara($kode)
	{	
		$values['kode']		= $kode;
		$values['status']	= 'Dibatalkan';
		$data 				= array('kode_acara' 	=> 	$kode);
		$this->madmin->update_acara($values);
		$this->madmin->delete_undangan($data);
		$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Acara dibatalkan.');
		redirect($this->agent->referrer(), 'refresh');
	}

	//Rollback Undangan
	public function rollback_invite($kode)
	{	
		$values['kode']		= $kode;
		$values['status']	= '';
		$data 				= array('kode_acara' 	=> 	$kode);
		$this->madmin->update_acara($values);
		$this->madmin->delete_undangan($data);
		$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Data berhasil dirollback.');
		redirect($this->agent->referrer(),'refresh');
	}

	//Create Notulen
	public function create_notulen($kode)
	{
		//Validasi
		$valid 	= 	$this->form_validation;
		
		$valid->set_rules(	'isi','Isi','required',
							array(	'required'	=>	'Field Isi Notulen belum diisi.'));
		$valid->set_rules(	'nama_notulis','Nama Notulis','required',
							array(	'required'	=>	'Silahkan cantumkan nama lengkap anda.'));
		if($valid->run()==FALSE){
		//End Validasi
		
		$values['kode']		= $kode;
		$values['status']	= 'Sedang Berlangsung';
		$data = array(	'title' 			=> 	'Halaman Notulis » Tambah Data Notulen',
						'content'			=>	'notulis/data/create_notulen',
						'kodeauto'			=>	$this->madmin->kode_notulen(),
						'invited'			=>	$this->madmin->invited($kode),
						'get_notulis'		=>	$this->madmin->get_notulis($kode),
						'show'				=>	$this->madmin->detail_acara($kode)
					);
		$detail = $this->madmin->detail_acara($kode);
		if ($detail->status != 'Notulen Dibuat') {
			$this->madmin->update_acara($values);
		}
		$this->load->view('notulis/layouts/app', $data);

		//Masuk Database
		} else {

			//Multiple Gambar
			if(!empty($_FILES['gambar']['name'])){
				$filesNumber	=	sizeof($_FILES['gambar']['tmp_name']);
				$files 			=	$_FILES['gambar'];
				$config['upload_path']          = './assets/img/dokumentasi/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048;
                $config['encrypt_name']			= true;

				for ($i = 0; $i < $filesNumber ; $i++) {
					$_FILES['gambar']['name']		=	$files['name'][$i];
					$_FILES['gambar']['type']		=	$files['type'][$i];
					$_FILES['gambar']['tmp_name']	=	$files['tmp_name'][$i];
					$_FILES['gambar']['error']		=	$files['error'][$i];
					$_FILES['gambar']['size']		=	$files['size'][$i];

					$this->upload->initialize($config);
					if($this->upload->do_upload('gambar')){
						$data = $this->upload->data();

						$insert[$i]['gambar']		= $data['file_name'];
						$insert[$i]['kode_notulen']	= $this->input->post('kode');
						$insert[$i]['kode_acara']	= $this->input->post('kode_acara');
					}
				}

			//Insert Kehadiran
			$data 	= 	array();
			$count 	=	count($this->input->get_post('kehadiran'));
			for ($i = 0; $i < $count; $i++) {
			$data[]	=	array(	'kode_notulen'	=>	$this->input->post('kode'),
								'kode_acara'	=>	$this->input->post('kode_acara'),
								'email_peserta'	=>	$this->input->post('kehadiran')[$i],
								'status'		=>	'Hadir'
							);
			}

			//Insert Notulen
			$values	=	array(	'kode_acara'	=>	$this->input->post('kode'),
								'id_notulis'	=>	$this->input->post('id_notulis'),
								'nama_notulis'	=>	$this->input->post('nama_notulis'),
								'kode_acara'	=>	$this->input->post('kode_acara'),
								'isi'			=>	$this->input->post('isi'),
								'tanggal_buat'	=>	date('Y-m-d'),
								'status'		=>	'Dibuat'
							);
				$value['kode']		= $kode;
				$value['status']	= 'Notulen Dibuat';
				$this->db->insert('notulen', $values);
				$this->db->insert_batch('kehadiran', $data);
				$this->db->insert_batch('gambar', $insert);
				$this->madmin->update_acara($value);
				$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Notulen berhasil dibuat.');
				redirect('notulis/list_notulen','refresh');
			}
		}
	}

	//List Notulen
	public function list_notulen()
	{
		$data['title']			=	'Halaman Notulis » List Notulen';
		$data['list']			=	$this->madmin->notulenID();
		$data['notulen_ikut']	=	$this->madmin->report_eksternal();
		$data['notulen_all']	=	$this->madmin->notulen();
		$data['content']		=	'notulis/data/list_notulen';
		$this->load->view('notulis/layouts/app', $data, FALSE);
	}

	//Update Notulen
	public function update_notulen($kode)
	{
		//Validasi
		$valid 	= 	$this->form_validation;
		
		$valid->set_rules(	'isi','Isi','required',
							array(	'required'	=>	'Field Isi Notulen harus diisi.'));
		if($valid->run()==FALSE){
		//End Validasi

		$data = array(	'title' 	=> 	'Halaman Notulis » Edit Data Notulen',
						'content'	=>	'notulis/data/update_notulen',
						'show'		=>	$this->madmin->detail_notulen($kode)
					);
		$this->load->view('notulis/layouts/app', $data);

		//Masuk Database
		} else {
			$values	=	array(	'kode'			=>	$this->input->post('kode'),
								'isi'			=>	$this->input->post('isi')
							);
			$this->madmin->update_notulen($values);
			$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Data berhasil diupdate.');
			redirect('notulis/list_notulen','refresh');
		}
	}

	//Update Notulen Eksternal
	public function edit_notEks($id)
	{
		//Validasi
		$valid 	= 	$this->form_validation;
		
		$valid->set_rules(	'notulen','Notulen','required',
							array(	'required'	=>	'Field Notulen harus diisi.'));
		$valid->set_rules(	'tujuan','Tujuan','required',
							array(	'required'	=>	'Field Tujuan harus diisi.'));
		$valid->set_rules(	'pic','Pic','required',
							array(	'required'	=>	'Field Pic harus diisi.'));
		$valid->set_rules(	'due_date','Due Date','required',
							array(	'required'	=>	'Field Due Date harus diisi.'));
		$valid->set_rules(	'status','Status','required',
							array(	'required'	=>	'Field Status harus diisi.'));
		$valid->set_rules(	'keterangan','Keterangan','required',
							array(	'required'	=>	'Field Keterangan diisi.'));
		if($valid->run()==FALSE){
		//End Validasi

		$data = array(	'title' 	=> 	'Halaman Notulis » Edit Data Notulen Eksternal',
						'content'	=>	'notulis/data/update_notulen_eksternal',
						'show'		=>	$this->madmin->detail_notulenEksternal($id)
					);
		$this->load->view('notulis/layouts/app', $data);

		//Masuk Database
		} else {
			$values	=	array(	'id'			=>	$this->input->post('id'),
								'notulen'		=>	$this->input->post('notulen'),
								'tujuan'		=>	$this->input->post('tujuan'),
								'pic'			=>	$this->input->post('pic'),
								'due_date'		=>	$this->input->post('due_date'),
								'status'		=>	$this->input->post('status'),
								'keterangan'	=>	$this->input->post('keterangan')
							);
			$this->madmin->update_notulenEks($values);
			$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Data berhasil diupdate.');
			redirect($this->agent->referrer(),'refresh');
		}
	}


	//Delete Notulen
	public function delete_notulen($kode)
	{
		//Unlink Gambar
		$list 	= $this->madmin->gambar($kode);
		if (!empty($list)) {
			foreach ($list as $show) {
				unlink('./assets/img/dokumentasi/'.$show->gambar);
			}
		}

		$data 	= array('kode_acara'	=> 	$kode);
		$status = array('kode'			=>	$kode,
						'status'		=>	'');
		$this->madmin->delete_notulenID($data);
		$this->madmin->delete_gambarID($data);
		$this->madmin->delete_kehadiranID($data);
		$this->madmin->delete_undanganID($data);
		$this->madmin->delete_notEksID($values);
		$this->madmin->update_acara($status);
		$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Data berhasil dihapus.');
		redirect('notulis/list_notulen','refresh');
	}

	//Detail Notulen
	public function detail_notulen($kode)
	{
		$data = array(	'title' 				=> 	'Halaman Notulis » Detail Notulen',
						'show'					=>	$this->madmin->detail_notulen($kode),
						'images'				=>	$this->madmin->gambar($kode),
						'diundang'				=>	$this->madmin->invited($kode),
						'kehadiran'				=>	$this->madmin->hadir($kode),
						'get_acara'				=>	$this->madmin->get_acara($kode),
						'get_eventmaker'		=>	$this->madmin->get_eventmaker($kode),
						'content'				=>	'notulis/data/detail_notulen'
					);
		$this->load->view('notulis/layouts/app', $data);
	}

	//Detail Notulen Eksternal with Session
	public function detail_notulenEksternal($kode)
	{
		$data = array(	'title' 				=> 	'Halaman Notulis » Detail Notulen',
						'show'					=>	$this->madmin->detail_notulen($kode),
						'images'				=>	$this->madmin->gambar($kode),
						'diundang'				=>	$this->madmin->invited($kode),
						'kehadiran'				=>	$this->madmin->hadir($kode),
						'get_acara'				=>	$this->madmin->get_acara($kode),
						'get_eventmaker'		=>	$this->madmin->get_eventmaker($kode),
						'list'					=>	$this->madmin->list_notEks($kode),
						'content'				=>	'notulis/data/detail_notulen_eksternal'
					);
		$this->load->view('notulis/layouts/app', $data);
	}

	//Send Notulen
	public function send_notulen($kode)
	{
		//Validasi
		$valid = $this->form_validation;

		$valid->set_rules(	'kehadiran[]','Kehadiran','required',
							array(	'required'	=>	'Field Kirimkan Ke harus diisi.'));

		if($valid->run()==FALSE){

			$data['show']				=	$this->madmin->detail_notulen($kode);
			$data['images']				=	$this->madmin->gambar($kode);
			$data['get_acara']			=	$this->madmin->get_acara($kode);
			$data['hadir']				=	$this->madmin->list_users();
			$data['diundang']			=	$this->madmin->invited($kode);
			$data['kehadiran']			=	$this->madmin->hadir($kode);
			$data['list']				=	$this->madmin->list_notEks($kode);
			$data['title']				=	'Halaman Notulis » Kirim Notulen';
			$data['content']			=	'notulis/data/send_notulen';
			$this->load->view('notulis/layouts/app', $data);

			$dompdf = new Dompdf\Dompdf();
		    $dompdf->loadHtml($this->load->view('notulis/data/notulen', $data, TRUE));
		    $dompdf->setPaper('A4', 'portrait');
		    $dompdf->render();
		    $output = $dompdf->output();
		    $detail = $this->madmin->detail_acara($kode);
		    if ($detail->jenis == 'Internal') {
		    	file_put_contents('assets/files/Notulen '.date('d-m-Y').'.pdf', $output);
		    } elseif ($detail->jenis == 'Eksternal') {
		    	file_put_contents('assets/files/Laporan Kegiatan '.date('d-m-Y').'.pdf', $output);
		    }

		} else {

			$data 	= 	array();
			$count 	=	count($this->input->get_post('kehadiran'));
			for ($i = 0; $i < $count; $i++) {
			$data[]	=	array('email_peserta'	=>	$this->input->post('kehadiran')[$i]);	

			$config = Array(
			  'smtp_host' 	=> 'mail.stmik-bandung.online',
			  'smtp_port' 	=> 587,
			  'smtp_user' 	=> 'notulen@stmik-bandung.online',
			  'smtp_pass' 	=> '3P=mbKS{=@Yv',
			  'mailtype' 	=> 'html',
			  'charset' 	=> 'iso-8859-1',
			  'wordwrap' 	=> TRUE
			);
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");

			$this->email->from('notulen@stmik-bandung.online', $this->session->userdata('nama'));
			$this->email->to($data[$i]['email_peserta']);
			$this->email->subject('Notulen Rapat');
			$this->email->message('Berikut terlampir notulen rapat.');
		    $detail = $this->madmin->detail_acara($kode);
		    if ($detail->jenis == 'Internal') {
				$this->email->attach('./assets/files/Notulen '.date('d-m-Y').'.pdf');
			} elseif ($detail->jenis == 'Eksternal') {
				$this->email->attach('./assets/files/Laporan Kegiatan '.date('d-m-Y').'.pdf');
			}
			$this->email->send();
			
			}

			unlink('./assets/files/Notulen '.date('d-m-Y').'.pdf');
			$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Hasil rapat berhasil dikirim.');
			redirect('notulis/list_notulen','refresh');
		}
	}

	//Create Notulen Eksternal
	public function create_notulenEks($kode)
	{
		//Validasi
		$valid 	= 	$this->form_validation;

		$valid->set_rules(	'kode_acara','Kode Acara','required',
							array(	'required'	=>	'Field Kode Acara tidak terdeteksi.'));
		if($valid->run()==FALSE){
		//End Validasi
		
		$values['kode']		= $kode;
		$values['status']	= 'Sedang Berlangsung';
		$data = array(	'title' 	=> 	'Halaman Tamu » Tambah Data Notulen',
						'content'	=>	'guest/data/create_notulen',
						'kodeauto'	=>	$this->madmin->kode_notulen(),
						'invited'	=>	$this->madmin->invitedEksternal($kode),
						'show'		=>	$this->madmin->detail_acara($kode)
					);
		$detail = $this->madmin->detail_acara($kode);
		if ($detail->status != 'Notulen Dibuat') {
			$this->madmin->update_acara($values);
		}
		$this->load->view('guest/layouts/app', $data);

		//Masuk Database
		} else {

			//Multiple Gambar
			if(!empty($_FILES['gambar']['name'])){
				$filesNumber	=	sizeof($_FILES['gambar']['tmp_name']);
				$files 			=	$_FILES['gambar'];
				$config['upload_path']          = './assets/img/dokumentasi/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048;
                $config['encrypt_name']			= true;

				for ($i = 0; $i < $filesNumber ; $i++) {
					$_FILES['gambar']['name']		=	$files['name'][$i];
					$_FILES['gambar']['type']		=	$files['type'][$i];
					$_FILES['gambar']['tmp_name']	=	$files['tmp_name'][$i];
					$_FILES['gambar']['error']		=	$files['error'][$i];
					$_FILES['gambar']['size']		=	$files['size'][$i];

					$this->upload->initialize($config);
					if($this->upload->do_upload('gambar')){
						$data = $this->upload->data();

						$insert[$i]['gambar']		= $data['file_name'];
						$insert[$i]['kode_notulen']	= $this->input->post('kode');
						$insert[$i]['kode_acara']	= $this->input->post('kode_acara');
					}
				}

			//Insert Kehadiran
			$data 	= 	array();
			$count 	=	count($this->input->get_post('kehadiran'));
			for ($i = 0; $i < $count; $i++) {
			$data[]	=	array(	'kode_notulen'	=>	$this->input->post('kode'),
								'kode_acara'	=>	$this->input->post('kode_acara'),
								'email_peserta'	=>	$this->input->post('kehadiran')[$i],
								'status'		=>	'Hadir'
							);
			}

				//Insert Notulen
				$values		=	array(	
								'kode_notulen'	=>	$this->input->post('kode'),
								'kode_acara'	=>	$this->input->post('kode_acara'),
								'notulen'		=>	$this->input->post('notulen'),
								'tujuan'		=>	$this->input->post('tujuan'),
								'pic'			=>	$this->input->post('pic'),
								'due_date'		=>	$this->input->post('due_date'),
								'status_not'	=>	$this->input->post('status'),
								'keterangan'	=>	$this->input->post('keterangan')
							);

				$nilai		=	array(	
								'kode'			=>	$this->input->post('kode'),
								'kode_acara'	=>	$this->input->post('kode_acara'),
								'nama_notulis'	=>	$this->input->post('nama'),
								'tanggal_buat'	=>	date('Y-m-d'),
								'status'		=>	'Dibuat'
							);

				$value['kode']		= $kode;
				$value['status']	= 'Notulen Dibuat';
				$this->db->insert('notulen', $nilai);
				$this->db->insert('eksternal', $values);
				$this->db->insert_batch('kehadiran', $data);
				$this->db->insert_batch('gambar', $insert);
				$this->madmin->update_acara($value);
				$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Notulen berhasil dibuat. Berikut adalah hasilnya.');
				redirect(base_url().'notulis/detail_notulenEks/'.$this->input->post('kode_acara').'/?='.md5($this->input->post('kode_acara')),'refresh');
			}
		}
	}

	//Detail Notulen Eksternal
	public function detail_notulenEks($kode)
	{
		$data = array(	'title' 				=> 	'Halaman Tamu » Detail Notulen',
						'show'					=>	$this->madmin->detail_notulen($kode),
						'images'				=>	$this->madmin->gambar($kode),
						'diundang'				=>	$this->madmin->invited($kode),
						'kehadiran'				=>	$this->madmin->hadir($kode),
						'get_acara'				=>	$this->madmin->get_acara($kode),
						'get_eventmaker'		=>	$this->madmin->get_eventmaker($kode),
						'list'					=>	$this->madmin->list_notEks($kode),
						'content'				=>	'guest/data/detail_notulen'
					);
		$this->load->view('guest/layouts/app', $data);
	}

	//Print Acara Internal
	public function print_internal()
	{
		$data['title']			=	'Halaman Notulis » Cetak Laporan Rapat yang Sudah Diikuti';
		$data['list']			=	$this->madmin->report_internal();
		$this->pdf->setPaper('A4', 'potrait');
	    $this->pdf->filename = 'Laporan Internal - '.date('Y-m-d H:i:s').'.pdf';
	    $this->pdf->load_view('notulis/data/print_internal', $data);
	}

	//Report Internal
	public function report_internal()
	{
		if ($this->input->post('cetak')) {
			$this->print_internal();
		}

		$data['title']			=	'Halaman Notulis » Laporan Acara Internal';
		$data['list']			=	$this->madmin->report_internal();
		$data['content']		=	'notulis/data/report_internal';
		$this->load->view('notulis/layouts/app', $data, FALSE);
	}

	//Print Acara Eksternal
	public function print_eksternal()
	{
		$data['title']			=	'Halaman Notulis » Cetak Laporan Rapat yang Sudah Diikuti';
		$data['list']			=	$this->madmin->report_eksternal();
		$this->pdf->setPaper('A4', 'potrait');
	    $this->pdf->filename = 'Laporan Eksternal - '.date('Y-m-d H:i:s').'.pdf';
	    $this->pdf->load_view('notulis/data/print_eksternal', $data);
	}

	//Report Eksternal
	public function report_eksternal()
	{
		if ($this->input->post('cetak')) {
			$this->print_eksternal();
		}

		$data['title']			=	'Halaman Notulis » Laporan Acara Eksternal';
		$data['list']			=	$this->madmin->report_eksternal();
		$data['content']		=	'notulis/data/report_eksternal';
		$this->load->view('notulis/layouts/app', $data, FALSE);
	}

}

/* End of file Notulis.php */
/* Location: ./application/controllers/Notulis.php */