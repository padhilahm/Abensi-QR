<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model {

	public function login($kondisi)
	{
		$query =  $this->db->get_where('akun', $kondisi);
		return $query->row();
	}	

}

/* End of file M_home.php */
/* Location: ./application/models/M_home.php */