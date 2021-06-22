<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_satuan extends CI_Model{

	public function __construct(){
		parent::__construct();
	}
	public function data_satuan(){
		$query=$this->db->query("SELECT * FROM data_satuan");
		return $query->result();
	}
	public function getMaxId(){
		$this->db->select_max('id_satuan');
		$this->db->from('data_satuan');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function insert($data){
		$this->db->insert('data_satuan', $data);
	}

	public function getKebWhereId($where){
		$query=$this->db->query("SELECT * FROM data_satuan WHERE id_satuan='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id_satuan' => $value->id_satuan,
					'nama_satuan' => $value->nama_satuan,
					'keterangan' => $value->keterangan
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
	public function update($b, $c, $where){
		$data =array(
			'nama_satuan'	=>	$b,
			'keterangan'	=>	$c
		);
		$this->db->set($data);
		$this->db->where("id_satuan", $where);
		$this->db->update('data_satuan', $data);
	}
	public function delete($where){
		$this->db->query("DELETE FROM data_satuan where id_satuan='$where'");
	}
}