<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_report extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	//crmr
	public function report()
	{
		$query=$this->db->query("SELECT *, AVG(fitness) as ratafitness FROM histori GROUP BY cr, mr ORDER BY id");
		return $query->result();
	}

	public function countIdGroup()
	{
		$query=$this->db->query("SELECT COUNT(id) as jmlcob FROM histori GROUP BY cr, mr");
		return $query->result_array();
	}

	public function countIdAll()
	{
		$query=$this->db->query("SELECT COUNT(id) as totid FROM histori");
		return $query->result_array();
	}

	//samain kek countGen
	public function countCrMr()
	{
		// $query=$this->db->query("SELECT COUNT(cr) as totcr FROM histori GROUP BY cr, mr");
		// return $query->result_array();
		$query=$this->db->query("SELECT COUNT(jmlcr) as totcr FROM (SELECT COUNT(cr) as jmlcr FROM histori GROUP BY cr,mr) AS countCrMr");
		return $query->result_array();
	}

	//lagi tidak dipakai
	public function bestAvgFitness()
	{
		$query=$this->db->query("SELECT MAX(avg_fitness) as maxavg FROM (SELECT *, AVG(fitness) AS avg_fitness FROM histori GROUP BY cr, mr ORDER BY id) as AvgFitness");
		return $query->result_array();
	}
	//

	public function bestAll()
	{
		$query=$this->db->query("SELECT cr, mr, avgfit FROM (SELECT cr, mr, AVG(fitness) as avgfit FROM histori GROUP BY cr, mr) as AvgVitness WHERE avgfit=(SELECT  MAX(avgfit) FROM (SELECT cr, mr, AVG(fitness) as avgfit FROM histori GROUP BY cr, mr) as AvgVitnese)");
		return $query->result_array();
	}

	public function reportAll()
	{
		$query=$this->db->query("SELECT * FROM histori ORDER BY id");
		return $query->result_array();
	}

	//jmlgenerasi
	public function reportgen()
	{
		$query=$this->db->query("SELECT *, AVG(fitness) as ratafitness FROM histori GROUP BY generasi ORDER BY generasi");
		return $query->result();
	}

	public function countGen()
	{
		$query=$this->db->query("SELECT COUNT(totgen) as jmlgen FROM (SELECT COUNT(generasi) as totgen FROM histori GROUP BY generasi) AS countGenerasi");
		return $query->result_array();
	}

	public function bestGen()
	{
		$query=$this->db->query("SELECT generasi, avgfitnese FROM (SELECT generasi, AVG(fitness) as avgfitnese FROM histori GROUP BY generasi) as AvgVitness WHERE avgfitnese=(SELECT MAX(avgfit) FROM (SELECT AVG(fitness) as avgfit FROM histori GROUP BY generasi) as AvgVitnese)");
		return $query->result_array();
	}
}
?>