<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}
	public function totalbahan()
	{
		$query=$this->db->query("SELECT COUNT(id) as toban FROM bmt");
		return $query->result_array();
	}
	public function totalmesin()
	{
		$query=$this->db->query("SELECT COUNT(id) as tomes FROM jenis_bmt");
		return $query->result_array();
	}
	public function totalmaterial()
	{
		$query=$this->db->query("SELECT COUNT(id) as tomat FROM kebutuhan");
		return $query->result_array();
	}
	public function totalpercobaan()
	{
		$query=$this->db->query("SELECT COUNT(id) as toper FROM histori");
		return $query->result_array();
	}
}