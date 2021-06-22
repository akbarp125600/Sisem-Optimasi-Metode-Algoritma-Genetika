<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_harga_bahan extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function harga_bahan(){
		$query=$this->db->query("SELECT * FROM harga_bahan");
		return $query->result();
	}

	public function getMaxId(){
		$this->db->select_max('id_harga');
		$this->db->from('harga_bahan');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function insert($data){
		$this->db->insert('harga_bahan', $data);
	}

	public function update($b, $c, $d, $e, $f, $where){
		$data =array(
			'nama_bahan'	=>	$b,
			'satuan'		=>	$c,
			'harga'			=>	$d,
			'tahun'			=>	$e,
			'keterangan'	=>	$f
		);
		$this->db->set($data);
		$this->db->where("id_harga", $where);
		$this->db->update('harga_bahan', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM harga_bahan where id_harga='$where'");
	}
}