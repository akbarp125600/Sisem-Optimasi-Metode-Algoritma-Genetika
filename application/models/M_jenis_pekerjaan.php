<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jenis_pekerjaan extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function jenis_pekerjaan(){
		$query=$this->db->query("SELECT * FROM jenis_pekerjaan ORDER BY id_jenis_pekerjaan ASC");
		return $query->result();
	}

	public function getMaxId(){
		$this->db->select_max('id_jenis_pekerjaan');
		$this->db->from('jenis_pekerjaan');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function insert($data){
		$this->db->insert('jenis_pekerjaan', $data);
	}
	
	public function update($b, $c, $where){
		$data =array(
			'jenis_pekerjaan'	=>	$b,
			'keterangan'	=>	$c
		);
		$this->db->set($data);
		$this->db->where("id_jenis_pekerjaan", $where);
		$this->db->update('jenis_pekerjaan', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM jenis_pekerjaan where id_jenis_pekerjaan='$where'");
	}
}