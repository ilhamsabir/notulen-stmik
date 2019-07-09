<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notfound extends CI_Controller {

	public function index()
	{
		$data['title']		=	'≡ Halaman Tidak Ditemukan ≡';
		$data['content']	=	'404';

		if ($this->session->userdata('role')=='Admin') {
			$this->load->view('admin/layouts/app', $data);
		} elseif($this->session->userdata('role')!='Admin') {
			$this->load->view('notulis/layouts/app', $data);
		} elseif($this->session->userdata('role')=='') {
			$this->load->view('guest/layouts/app', $data);
		}	
	}

}

/* End of file Notfound.php */
/* Location: ./application/controllers/Notfound.php */