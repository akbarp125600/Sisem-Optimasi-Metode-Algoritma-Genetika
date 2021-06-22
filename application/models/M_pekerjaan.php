<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pekerjaan extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function pekerjaan(){
		$query=$this->db->query("SELECT data_pekerjaan.id_pekerjaan, data_pekerjaan.nama_pekerjaan, data_pekerjaan.keterangan, jenis_pekerjaan.jenis_pekerjaan from data_pekerjaan INNER jOIN jenis_pekerjaan ON jenis_pekerjaan.id_jenis_pekerjaan = data_pekerjaan.id_jenis_pekerjaan");
		return $query->result();
	}

	public function jenis_pekerjaan(){
		$query=$this->db->query("SELECT * FROM jenis_pekerjaan");
		return $query->result();
	}

	public function getMaxId(){
		$this->db->select_max('id_pekerjaan');
		$this->db->from('data_pekerjaan');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function insert($data){
		$this->db->insert('data_pekerjaan', $data);
	}

	public function update($b, $c, $d, $where){
		$data =array(
			'id_jenis_pekerjaan'	=>	$b,
			'nama_pekerjaan'		=>	$c,
			'keterangan'			=>	$d
		);
		$this->db->set($data);
		$this->db->where("id_pekerjaan", $where);
		$this->db->update('data_pekerjaan', $data);
	}
	public function delete($where){
		$this->db->query("DELETE FROM data_pekerjaan where id_pekerjaan='$where'");
	}
}