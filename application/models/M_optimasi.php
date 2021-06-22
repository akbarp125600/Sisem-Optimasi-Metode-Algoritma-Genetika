<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_optimasi extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function getKanWhereId($where)
	{
		$this->db->select('*');
		$this->db->from('bmt');
		$this->db->where_in('id', $where);
		$query = $this->db->get();
		return $query->result_array();
	}

	function getKebWhereId($where){
		$this->db->select('*');
		$this->db->from('kebutuhan');
		$this->db->where('id', $where);
		$query = $this->db->get();
        return $query->result();
	}

	public function getdata1(){
		$query=$this->db->query("SELECT * FROM bmt where id_jenis = '4'");
		return $query->result_array();
	}
	public function getdata2(){
		$query=$this->db->query("SELECT * FROM bmt where id_jenis = '5'");
		return $query->result_array();
	}
	public function getdata3(){
		$query=$this->db->query("SELECT * FROM bmt where id_jenis = '6'");
		return $query->result_array();
	}
	public function getdata4(){
		$query=$this->db->query("SELECT * FROM bmt where id_jenis = '7'");
		return $query->result_array();
	}
	public function getdata5(){
		$query=$this->db->query("SELECT * FROM bmt where id_jenis = '8'");
		return $query->result_array();
	}
	public function getdata6(){
		$query=$this->db->query("SELECT * FROM bmt where id_jenis = '9'");
		return $query->result_array();
	}
	public function getdata7(){
		$query=$this->db->query("SELECT * FROM bmt where id_jenis = '10'");
		return $query->result_array();
	}
	public function getdata8(){
		$query=$this->db->query("SELECT * FROM bmt where id_jenis = '11'");
		return $query->result_array();
	}
	public function getdata9(){
		$query=$this->db->query("SELECT * FROM bmt where id_jenis = '12'");
		return $query->result_array();
	}
	public function getdata10(){
		$query=$this->db->query("SELECT * FROM bmt where id_jenis = '13'");
		return $query->result_array();
	}
	public function getdata11(){
		$query=$this->db->query("SELECT * FROM bmt where id_jenis = '14'");
		return $query->result_array();
	}
	public function getdata12(){
		$query=$this->db->query("SELECT * FROM bmt where id_jenis = '15'");
		return $query->result_array();
	}
}
?>