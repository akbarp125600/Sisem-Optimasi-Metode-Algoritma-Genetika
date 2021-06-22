<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bahan_pekerjaan extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function bahan_pekerjaan(){
		$query=$this->db->query("SELECT bahan_pekerjaan.id_bahan_pekerjaan, jenis_pekerjaan.jenis_pekerjaan, data_pekerjaan.nama_pekerjaan, harga_bahan.nama_bahan FROM bahan_pekerjaan JOIN harga_bahan ON bahan_pekerjaan.id_harga = harga_bahan.id_harga JOIN jenis_pekerjaan ON bahan_pekerjaan.id_jenis_pekerjaan = jenis_pekerjaan.id_jenis_pekerjaan JOIN data_pekerjaan ON bahan_pekerjaan.id_pekerjaan = data_pekerjaan.id_pekerjaan");
		return $query->result();
	}

	public function getMaxId(){
		$this->db->select_max('id_bahan_pekerjaan');
		$this->db->from('bahan_pekerjaan');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function insert($data){
		$this->db->insert('bahan_pekerjaan', $data);
	}

	public function update($b, $c, $d, $where){
		$data =array(
			'id_jenis_pekerjaan'	=>	$b,
			'id_pekerjaan'	=>	$c,
			'id_harga'		=>	$d
		);
		$this->db->set($data);
		$this->db->where("id_bahan_pekerjaan", $where);
		$this->db->update('bahan_pekerjaan', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM bahan_pekerjaan where id_bahan_pekerjaan='$where'");
	}

	public function jenis_pekerjaan(){
		$query=$this->db->query("SELECT * FROM jenis_pekerjaan");
		return $query->result();
	}

	public function nama_pekerjaan(){
		$query=$this->db->query("SELECT * FROM data_pekerjaan");
		return $query->result();
	}

	public function nama_bahan(){
		$query=$this->db->query("SELECT * FROM harga_bahan");
		return $query->result();
	}
}