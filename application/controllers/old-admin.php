<?php

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
			$data['title']			=	'Halaman Administrator » Kirim Undangan';
			$data['content']		=	'admin/data/send_invite';
			$data['emails']			=	$this->input->post('penerima');
			$data['invited']		=	$this->madmin->invitedEksternal($kode);
			$data['diundang']		=	$this->madmin->invited($kode);
			$this->load->view('admin/layouts/app', $data);
			$dompdf = new Dompdf\Dompdf();
			$dompdf->loadHtml($this->load->view('admin/data/undangan', $data, TRUE));
			$dompdf->setPaper('A4', 'portrait');
			$dompdf->render();
			$output = $dompdf->output();
			file_put_contents('assets/files/Surat Tugas '.date('d-m-Y').'.pdf', $output);

		} else {

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
			$data['title']			=	'Halaman Administrator » Kirim Undangan';
			$data['content']		=	'admin/data/send_invite';
			$data['emails']			=	$this->input->post('penerima');
			$this->load->view('admin/layouts/app', $data);

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
			$dompdf->loadHtml($this->load->view('admin/data/undangan_eksternal', $data, TRUE));
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
			$this->email->message('Berikut terlampir undangan rapat. Untuk mencatat notulen silahkan klik link <a href="'.base_url().'admin/create_notulenEks/'.$this->input->post('kode_acara').'/?='.sha1($this->input->post('kode_acara')).'">berikut</a> pada tanggal yang tertera diundangan. <i>Note:</i> Batas waktu pencatatan notulen adalah '.TanggalIndo($detail->tanggal_deadline));
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
			redirect('admin/acara_eksternal','refresh');
		}
	}



?>