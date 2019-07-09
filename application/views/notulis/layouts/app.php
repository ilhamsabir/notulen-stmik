<?php

	//Proteksi Halaman
	if(	$this->session->userdata('email')=='' && 
		$this->session->userdata('role')==''){
		$this->session->set_flashdata('sukses','<strong>Eits!</strong> Anda melanggar otorisasi.');
		redirect(base_url('login'));
	}

	require_once('head.php');

	//Wrapper
	echo '<div id="wrapper">';
	require_once('navbar.php');
	require_once('sidebar.php');
	require_once('content.php');
	echo '</div>';

	require_once('footer.php');
	require_once('scripts.php');
?>