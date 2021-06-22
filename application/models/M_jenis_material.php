<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jenis_material extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function jenis_material(){
		$query=$this->db->query("SELECT * FROM jenis_bmt");
		return $query->result();
	}

	public function getMaxId(){
		$this->db->select_max('id');
		$this->db->from('jenis_bmt');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function insert($data){
		$this->db->insert('jenis_bmt', $data);
	}

	public function getKebWhereId($where){
		$query=$this->db->query("SELECT * FROM jenis_bmt WHERE id='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id' => $value->id,
					'nama_jenis' => $value->nama_jenis
					/*'umur' => $value->umur,
					'pk' => $value->pk,
					'em' => $value->em,
					'met' => $value->met,
					'lis' => $value->lis,
					'ca' => $value->ca,
					'p' => $value->p*/
				);
			}
		}
		return $data;
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("id", $where);
		$this->db->update('jenis_bmt', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM jenis_bmt where id='$where'");
	}

	public function detail($where){
		$query=$this->db->query("SELECT * FROM jenis_bmt INNER JOIN bmt ON jenis_bmt.id = bmt.id_jenis WHERE jenis_bmt.id = '$where'");
		return $query->result();
		/*if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id' => $value->id,
					'nama' => $value->nama
					'umur' => $value->umur,
					'pk' => $value->pk,
					'em' => $value->em,
					'met' => $value->met,
					'lis' => $value->lis,
					'ca' => $value->ca,
					'p' => $value->p
				);
			}
		}
		return $data;*/
	}
}