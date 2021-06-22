<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bmt extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function bmt()
	{
		$query=$this->db->query("SELECT * FROM bmt ");
		return $query->result();
	}

	public function bmt2()
	{
		$query=$this->db->query("SELECT * FROM bmt WHERE id_jenis = '6'");
		return $query->result();
	}

	public function getBmtWhereId($where)
	{
		$query=$this->db->query("SELECT * FROM bmt WHERE id='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id' => $value->id,
					'nama' => $value->nama,
					'pk' => $value->pk,
					'em' => $value->em,
					'met' => $value->met,
					'lis' => $value->lis,
					'ca' => $value->ca,
					'p' => $value->p,
					'harga' => $value->harga,
					'id_jenis' => $value->id_jenis
				);
			}
		}
		return $data;
	}

	public function jenisBmt()
	{
		$query=$this->db->query("SELECT * FROM jenis_bmt");
		return $query->result();
	}

	public function insert($data)
	{
		$this->db->insert('bmt', $data);
	}

	public function getMaxId()
	{
		$this->db->select_max('id');
		$this->db->from('bmt');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("id", $where);
		$this->db->update('bmt', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM bmt where id='$where'");
	}

}
?>