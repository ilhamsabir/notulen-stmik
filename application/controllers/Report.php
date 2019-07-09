<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function undangan_admin($kode)
	{
		$data = array(	'show'			=>	$this->madmin->detail_acara($kode),
						'get_notulis'	=>	$this->madmin->get_notulis($kode)
					);
		$this->pdf->setPaper('A4', 'portrait');
	    $this->pdf->filename = 'Undangan Rapat - '.date('Y-m-d').'.pdf';
	    $this->pdf->load_view('admin/data/undangan', $data);
	}

	public function undangan_adminEks($kode)
	{
		$data = array(	'show'			=>	$this->madmin->detail_acara($kode),
						'invited'		=>	$this->madmin->invitedEksternal($kode),
						'diundang'		=>	$this->madmin->invited($kode),
						'get_notulis'	=>	$this->madmin->get_notulis($kode)
					);
		$this->pdf->setPaper('A4', 'portrait');
	    $this->pdf->filename = 'Surat Tugas - '.date('Y-m-d').'.pdf';
	    $this->pdf->load_view('admin/data/undangan_eksternal', $data);
	}

	public function notulen_admin($kode)
	{
		$data = array(	'show'					=>	$this->madmin->detail_notulen($kode),
						'images'				=>	$this->madmin->gambar($kode),
						'diundang'				=>	$this->madmin->invited($kode),
						'kehadiran'				=>	$this->madmin->hadir($kode),
						'list'					=>	$this->madmin->list_notEks($kode),
						'get_acara'				=>	$this->madmin->get_acara($kode)
					);
		$this->pdf->setPaper('F4', 'potrait');
	    $this->pdf->filename = 'Notulen - '.date('Y-m-d').'.pdf';
	    $this->pdf->load_view('admin/data/notulen', $data);
	}

	public function undangan_notulis($kode)
	{
		$data = array(	'show'			=>	$this->madmin->detail_acara($kode),
						'get_notulis'	=>	$this->madmin->get_notulis($kode)
					);
		$this->pdf->setPaper('A4', 'portrait');
	    $this->pdf->filename = 'Undangan Rapat - '.date('Y-m-d').'.pdf';
	    $this->pdf->load_view('notulis/data/undangan', $data);
	}

	public function undangan_notulisEks($kode)
	{
		$data = array(	'show'			=>	$this->madmin->detail_acara($kode),
						'invited'		=>	$this->madmin->invitedEksternal($kode),
						'diundang'		=>	$this->madmin->invited($kode),
						'get_notulis'	=>	$this->madmin->get_notulis($kode)
					);
		$this->pdf->setPaper('A4', 'portrait');
	    $this->pdf->filename = 'Surat Tugas - '.date('Y-m-d').'.pdf';
	    $this->pdf->load_view('notulis/data/undangan_eksternal', $data);
	}

	public function notulen_notulis($kode)
	{
		$data = array(	'show'					=>	$this->madmin->detail_notulen($kode),
						'images'				=>	$this->madmin->gambar($kode),
						'diundang'				=>	$this->madmin->invited($kode),
						'kehadiran'				=>	$this->madmin->hadir($kode),
						'list'					=>	$this->madmin->list_notEks($kode),
						'get_acara'				=>	$this->madmin->get_acara($kode)
					);
		$this->pdf->setPaper('F4', 'potrait');
	    $this->pdf->filename = 'Notulen - '.date('Y-m-d').'.pdf';
	    $this->pdf->load_view('notulis/data/notulen', $data);
	}

	public function notulen_guest($kode)
	{
		$data = array(	'show'					=>	$this->madmin->detail_notulen($kode),
						'images'				=>	$this->madmin->gambar($kode),
						'diundang'				=>	$this->madmin->invited($kode),
						'kehadiran'				=>	$this->madmin->hadir($kode),
						'list'					=>	$this->madmin->list_notEks($kode),
						'get_acara'				=>	$this->madmin->get_acara($kode)
					);
		$this->pdf->setPaper('F4', 'potrait');
	    $this->pdf->filename = 'Notulen - '.date('Y-m-d').'.pdf';
	    $this->pdf->load_view('guest/data/notulen', $data);
	}

}

/* End of file Report.php */
/* Location: ./application/controllers/Report.php */