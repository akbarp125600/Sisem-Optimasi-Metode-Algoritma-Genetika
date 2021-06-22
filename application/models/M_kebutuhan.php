<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kebutuhan extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function kebutuhan()
	{
		$query=$this->db->query("SELECT * FROM kebutuhan");
		return $query->result();
	}

	public function getKebWhereId($where)
	{
		$query=$this->db->query("SELECT * FROM kebutuhan WHERE id='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id' => $value->id,
					'nama' => $value->nama,
					'umur' => $value->umur,
					'pk' => $value->pk,
					'em' => $value->em,
					'met' => $value->met,
					'lis' => $value->lis,
					'ca' => $value->ca,
					'p' => $value->p,
				);
			}
		}
		return $data;
	}

	public function insert($data)
	{
		$this->db->insert('kebutuhan', $data);
	}

	public function getMaxId()
	{
		$this->db->select_max('id');
		$this->db->from('kebutuhan');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("id", $where);
		$this->db->update('kebutuhan', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM kebutuhan where id='$where'");
	}

}
?>