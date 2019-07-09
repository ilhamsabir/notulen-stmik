<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Muser extends CI_Model {

	//Cek User
	public function cek_user($data){
		$query = $this->db->get_where('users', $data);
		return $query;
	}

}

/* End of file Muser.php */
/* Location: ./application/models/Muser.php */