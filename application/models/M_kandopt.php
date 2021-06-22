<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kandopt extends CI_Model{

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

	public function getKebWhereId($where){
		$this->db->select('*');
		$this->db->from('kebutuhan');
		$this->db->where('id', $where);
		$query = $this->db->get();
        return $query->result();
	}


	public function totkandopt($arr){
		$kanbmtrekom = $this->M_kandopt->getKanWhereId($arr);
		$total = array();
		/*$total[] = $this->pk($kanbmtrekom);
		$total[] = $this->em($kanbmtrekom);
		$total[] = $this->met($kanbmtrekom);
		$total[] = $this->lis($kanbmtrekom);
		$total[] = $this->ca($kanbmtrekom);
		$total[] = $this->pe($kanbmtrekom);*/
		$total[] = $this->harga($kanbmtrekom);
		$total[] = $this->waktu($kanbmtrekom);
		return $total;
	}

	public function kebutuhan($arr){
		foreach ($arr as $value) {
			/*$butuhnya[] = $value->pk;
			$butuhnya[] = $value->em;
			$butuhnya[] = $value->met;
			$butuhnya[] = $value->lis;
			$butuhnya[] = $value->ca;
			$butuhnya[] = $value->p;*/
			$butuhnya[] = $value->harga;
			$butuhnya[] = $value->waktu;
		}
		return $butuhnya;
	}

	public function pk($arr){
		foreach ($arr as $value) {
			$pk[] = $value['pk'];
		}
		return array_sum($pk);
	}

	public function em($arr){
		foreach ($arr as $value) {
			$em[] = $value['em'];
		}
		return array_sum($em);
	}

	public function met($arr){
		foreach ($arr as $value) {
			$met[] = $value['met'];
		}
		return array_sum($met);
	}

	public function lis($arr){
		foreach ($arr as $value) {
			$lis[] = $value['lis'];
		}
		return array_sum($lis);
	}

	public function ca($arr){
		foreach ($arr as $value) {
			$ca[] = $value['ca'];
		}
		return array_sum($ca);
	}

	public function pe($arr){
		foreach ($arr as $value) {
			$pe[] = $value['p'];
		}
		return array_sum($pe);
	}

	public function harga($arr){
		foreach ($arr as $value) {
			$harga[] = $value['harga'];
		}
		return array_sum($harga);
	}
	public function waktu($arr){
		foreach ($arr as $value) {
			$waktu[] = $value['waktu'];
		}
		return array_sum($waktu);
	}

	public function getIdRekom($where)
	{
		$this->db->select('GROUP_CONCAT(histori_detailrekom.id_rekom) as idrekom');
		$this->db->from('histori');
		$this->db->join('histori_detailrekom','histori.id=histori_detailrekom.id_histori');
		$this->db->where('histori.id', $where);
		$this->db->group_by('histori.id');
		$query = $this->db->get();
        foreach ($query->result() as $value){
        	$drekom = $value->idrekom;
			$idrekom = explode(",", $drekom);
        }
        return $idrekom;
	}	
}
?>