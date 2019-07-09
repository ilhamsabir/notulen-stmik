<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin extends CI_Model {

	//List Notulis
	public function list_notulis()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id !=', $this->session->userdata('id'));
		$this->db->order_by('role', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	//List Users
	public function list_users()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->order_by('nama', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	//List Notulis General
	public function notulis_general()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('role', 'General');
		$query = $this->db->get();
		return $query->result();
	}

	//List Notulis Akademik
	public function notulis_akademik()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('role', 'Akademik');
		$query = $this->db->get();
		return $query->result();
	}

	//List Notulis BEM
	public function notulis_bem()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('role', 'BEM');
		$query = $this->db->get();
		return $query->result();
	}

	//List Notulis Dosen
	public function notulis_dosen()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('role', 'Dosen');
		$query = $this->db->get();
		return $query->result();
	}

	//Detail Notulis
	public function detail_notulis($id)
	{
		$query = $this->db->get_where('users', array('id' => $id));
		return $query->row();
	}

	//Add Notulis
	public function add_notulis($data)
	{
		$this->db->insert('users', $data);
	}

	//Update Notulis
	public function update_notulis($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('users', $data);
	}

	//Delete Notulis
	public function delete_notulis($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->delete('users', $data);
	}

	//List Acara
	public function list_acara()
	{
		$this->db->select('*');
		$this->db->from('acara');
		$this->db->order_by('date(tanggal)', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//List Acara by ID
	public function list_acaraID()
	{
		$this->db->select('*');
		$this->db->from('acara');
		$this->db->where('id_notulis', $this->session->userdata('id'));
		$this->db->where('id_pembuat', $this->session->userdata('id'));
		$this->db->order_by('date(tanggal)', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//List Acara Internal
	public function list_acaraInt()
	{
		$this->db->select('*');
		$this->db->from('acara');
		$this->db->where('jenis', 'Internal');
		$this->db->order_by('date(tanggal)', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//List Acara Internal by ID
	public function list_acaraIntID()
	{
		$where = array('jenis' => 'Internal', 'id_notulis' => $this->session->userdata('id'));
		$this->db->select('*');
		$this->db->from('acara');
		$this->db->where($where);
		$this->db->order_by('date(tanggal)', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//List Acara Internal by ID Pembuat
	public function list_acaraIntIDPembuat()
	{
		$where = array('jenis' => 'Internal', 'id_pembuat' => $this->session->userdata('id'));
		$this->db->select('*');
		$this->db->from('acara');
		$this->db->where($where);
		$this->db->order_by('date(tanggal)', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//List Acara Eksternal
	public function list_acaraEks()
	{
		$this->db->select('*');
		$this->db->from('acara');
		$this->db->where('jenis', 'Eksternal');
		$this->db->order_by('date(tanggal)', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//List Acara Eksternal by ID
	public function list_acaraEksID()
	{
		$where = array('jenis' => 'Eksternal', 'id_pembuat' => $this->session->userdata('id'));
		$this->db->select('*');
		$this->db->from('acara');
		$this->db->where($where);
		$this->db->order_by('date(tanggal)', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//Detail Acara
	public function detail_acara($kode)
	{
		$this->db->select('*');
		$this->db->from('acara');
		$this->db->where('acara.kode', $kode);
		$query = $this->db->get();
		return $query->row();
	}

	//Add Acara
	public function add_acara($data)
	{
		$this->db->insert('acara', $data);
	}

	//Update Acara
	public function update_acara($data)
	{
		$this->db->where('kode', $data['kode']);
		$this->db->update('acara', $data);
	}

	//Delete Acara
	public function delete_acara($data)
	{
		$this->db->where('kode', $data['kode']);
		$this->db->delete('acara', $data);
	}

	//Delete Undangan
	public function delete_undangan($data)
	{
		$this->db->where('kode_acara', $data['kode_acara']);
		$this->db->delete('undangan', $data);
	}

	//List Invited
	public function invited($kode){
		$this->db->select('*');
		$this->db->from('users');	
		$this->db->join('undangan', 'undangan.email_peserta = users.email', 'left');
		$this->db->join('acara', 'acara.kode = undangan.kode_acara', 'left');
		$this->db->where('acara.kode', $kode);
		$query = $this->db->get();
		return $query->result();
	}

	//List Invited Eksternal
	public function invitedEksternal($kode){
		$this->db->select('*');
		$this->db->from('undangan');
		$this->db->join('acara', 'acara.kode = undangan.kode_acara', 'left');
		$this->db->where('acara.kode', $kode);
		$query = $this->db->get();
		return $query->result();
	}

	//List Gambar
	public function gambar($kode){
		$this->db->select('*');
		$this->db->from('gambar');	
		$this->db->join('notulen', 'notulen.kode_acara = gambar.kode_acara', 'left');
		$this->db->where('notulen.kode_acara', $kode);
		$query = $this->db->get();
		return $query->result();
	}

	//List Notulen Eksternal
	public function list_notEks($kode){
		$this->db->select('*');
		$this->db->from('eksternal');	
		$this->db->join('notulen', 'notulen.kode_acara = eksternal.kode_acara', 'left');
		$this->db->where('notulen.kode_acara', $kode);
		$query = $this->db->get();
		return $query->result();
	}

	//List Gambar by ID
	public function gambarID($kode){
		$this->db->select('*');
		$this->db->from('gambar');	
		$this->db->join('acara', 'acara.kode = gambar.kode_acara', 'left');
		$this->db->where('acara.kode', $kode);
		$query = $this->db->get();
		return $query->result();
	}

	//List Files by ID
	public function filesID($kode)
	{
		$this->db->select('*');
		$this->db->from('files');	
		$this->db->join('acara', 'acara.kode = files.kode_acara', 'left');
		$this->db->where('acara.kode', $kode);
		$query = $this->db->get();
		return $query->result();
	}

	//List Hadir
	public function hadir($kode){
		$this->db->select('*');
		$this->db->from('users');	
		$this->db->join('kehadiran', 'kehadiran.email_peserta = users.email', 'left');
		$this->db->join('acara', 'acara.kode = kehadiran.kode_acara', 'left');
		$this->db->where('acara.kode', $kode);
		$query = $this->db->get();
		return $query->result();
	}

	//List Notulen
	public function notulen(){
		$this->db->select('*');
		$this->db->from('notulen');	
		$this->db->join('acara', 'notulen.kode_acara = acara.kode', 'left');
		$this->db->order_by('date(tanggal)', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//List Notulen by ID
	public function notulenID(){
		$this->db->select('*');
		$this->db->from('notulen');
		$this->db->join('acara', 'acara.kode = notulen.kode_acara', 'left');
		$this->db->where('notulen.id_notulis', $this->session->userdata('id'));
		$this->db->order_by('date(tanggal)', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//Report Internal
	public function report_internal(){
		$tglmin	=	$_POST['tglmin'];
		$tglmax	=	$_POST['tglmax'];
		$where 	= 	array('acara.id_notulis' => $this->session->userdata('id'), 'acara.status' => 'Notulen Dibuat', 'jenis' => 'Internal');
		$this->db->select('*');
		$this->db->from('acara');
		$this->db->join('notulen', 'notulen.kode_acara = acara.kode', 'left');
		$this->db->where($where, FALSE);
		if(!empty($tglmin) && !empty($tglmax)) {
			$this->db->where('date(tanggal) >=', $tglmin);
			$this->db->where('date(tanggal) <=', $tglmax);
		}
		$this->db->order_by('date(tanggal)', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//Report Eksternal
	public function report_eksternal(){
		$tglmin	=	$_POST['tglmin'];
		$tglmax	=	$_POST['tglmax'];
		$where = array('kehadiran.email_peserta' => $this->session->userdata('email'), 'acara.status' => 'Notulen Dibuat', 'jenis' => 'Eksternal');
		$this->db->select('*');
		$this->db->from('acara');
		$this->db->join('kehadiran', 'kehadiran.kode_acara = acara.kode', 'left');
		$this->db->where($where, FALSE);
		if(!empty($tglmin) && !empty($tglmax)) {
			$this->db->where('date(tanggal) >=', $tglmin);
			$this->db->where('date(tanggal) <=', $tglmax);
		}
		$this->db->order_by('date(tanggal)', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//Report Internal Admin
	public function report_internal_admin(){
		$tglmin	=	$_POST['tglmin'];
		$tglmax	=	$_POST['tglmax'];
		$this->db->select('*');
		$this->db->from('acara');
		$this->db->where('jenis', 'Internal');
		if(!empty($tglmin) && !empty($tglmax)) {
			$this->db->where('date(tanggal) >=', $tglmin);
			$this->db->where('date(tanggal) <=', $tglmax);
		}
		$this->db->order_by('date(tanggal)', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//Report Eksternal Admin
	public function report_eksternal_admin(){
		$tglmin	=	$_POST['tglmin'];
		$tglmax	=	$_POST['tglmax'];
		$this->db->select('*');
		$this->db->from('acara');
		$this->db->where('jenis', 'Eksternal');
		if(!empty($tglmin) && !empty($tglmax)) {
			$this->db->where('date(tanggal) >=', $tglmin);
			$this->db->where('date(tanggal) <=', $tglmax);
		}
		$this->db->order_by('date(tanggal)', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//Delete Notulen
	public function delete_notulen($data)
	{
		$this->db->where('kode', $data['kode']);
		$this->db->delete('notulen', $data);
	}

	//Delete Notulen by ID
	public function delete_notulenID($data)
	{
		$this->db->where('kode_acara', $data['kode_acara']);
		$this->db->delete('notulen', $data);
	}

	//Delete Gambar by ID
	public function delete_gambarID($data)
	{
		$this->db->where('kode_acara', $data['kode_acara']);
		$this->db->delete('gambar', $data);
	}

	//Delete Eksternal by ID
	public function delete_notEksID($data)
	{
		$this->db->where('kode_acara', $data['kode_acara']);
		$this->db->delete('eksternal', $data);
	}

	//Delete Files by ID
	public function delete_filesID($data)
	{
		$this->db->where('kode_acara', $data['kode_acara']);
		$this->db->delete('files', $data);
	}

	//Delete Kehadiran by ID
	public function delete_kehadiranID($data)
	{
		$this->db->where('kode_acara', $data['kode_acara']);
		$this->db->delete('kehadiran', $data);
	}

	//Delete Undangan by ID
	public function delete_undanganID($data)
	{
		$this->db->where('kode_acara', $data['kode_acara']);
		$this->db->delete('undangan', $data);
	}

	//Detail Notulen
	public function detail_notulen($kode)
	{
		$this->db->select('*');
		$this->db->from('acara');
		$this->db->join('notulen', 'notulen.kode_acara = acara.kode', 'inner');
		$this->db->where('acara.kode', $kode);
		$query = $this->db->get();
		return $query->row();
	}

	//Detail Notulen Eksternal
	public function detail_notulenEksternal($id)
	{
		$query = $this->db->get_where('eksternal', array('id' => $id));
		return $query->row();
	}

	//Get Acara
	public function get_acara($kode)
	{
		$this->db->select('*');
		$this->db->from('acara');	
		$this->db->join('notulen', 'notulen.kode_acara = acara.kode', 'left');
		$this->db->where('notulen.kode_acara', $kode);
		$query = $this->db->get();
		return $query->row();
	}

	//Get Acara
	public function get_notulis($kode)
	{
		$this->db->select('*');
		$this->db->from('acara');	
		$this->db->join('users', 'users.id = acara.id_notulis', 'left');
		$this->db->where('acara.kode', $kode);
		$query = $this->db->get();
		return $query->row();
	}

	//Get Eventmaker
	public function get_eventmaker($kode)
	{
		$this->db->select('*');
		$this->db->from('acara');	
		$this->db->join('users', 'users.id = acara.id_pembuat', 'left');
		$this->db->where('acara.kode', $kode);
		$query = $this->db->get();
		return $query->row();
	}

	//Update Notulen
	public function update_notulen($data)
	{
		$this->db->where('kode_acara', $data['kode']);
		$this->db->update('notulen', $data);
	}

	//Update Notulen Eksternal
	public function update_notulenEks($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('eksternal', $data);
	}


	//Kodeauto Notulen
	public function kode_notulen()
	{
		$this->db->select('RIGHT(notulen.kode, 2) as kode', FALSE);
		$this->db->order_by('kode','DESC');    
		$this->db->limit(1);
		$query = $this->db->get('notulen');
		if($query->num_rows() <> 0){     
	   		$data = $query->row();      
	   		$kode = intval($data->kode) + 1;
	   	} else {     
	   		$kode = 1;
	   	}

	  	$kodemax = str_pad($kode, 4, "000", STR_PAD_LEFT);    
	  	$kodejadi = "NT".$kodemax;     
	  	return $kodejadi;
	}

	//Kodeauto Acara
	public function kode_acara()
	{
		$this->db->select('RIGHT(acara.kode, 2) as kode', FALSE);
		$this->db->order_by('kode','DESC');    
		$this->db->limit(1);
		$query = $this->db->get('acara');
		if($query->num_rows() <> 0){     
	   		$data = $query->row();      
	   		$kode = intval($data->kode) + 1;
	   	} else {     
	   		$kode = 1;
	   	}

	  	$kodemax = str_pad($kode, 4, "000", STR_PAD_LEFT);    
	  	$kodejadi = "AC".$kodemax;     
	  	return $kodejadi;
	}

}

/* End of file Madmin.php */
/* Location: ./application/models/Madmin.php */