<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model{

	function cek_login($uname, $pwd){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('uname', $uname);
		$this->db->where('pwd', md5($pwd));
		return $this->db->get()->row();
	}
}
 ?>
