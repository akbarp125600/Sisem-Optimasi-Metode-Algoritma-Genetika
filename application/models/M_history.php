<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_history extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_optimasi');
		$this->load->model('M_kebutuhan');
	}

	public function histori(){
		$query=$this->db->query("SELECT histori.*, histori_detailbmt.idbmt, histori_detailrekom.idrekom FROM histori
		JOIN (SELECT id_histori, GROUP_CONCAT(histori_detailbmt.id_bmt) AS idbmt FROM histori_detailbmt GROUP BY id_histori) histori_detailbmt ON histori.id = histori_detailbmt.id_histori
		LEFT JOIN (SELECT id_histori, GROUP_CONCAT(histori_detailrekom.id_rekom) AS idrekom FROM histori_detailrekom GROUP BY id_histori) histori_detailrekom ON histori.id = histori_detailrekom.id_histori");
		foreach ($query->result() as $value) {
			$dbmt = array();
			$namabmt = array();
			$drekom = array();
			$namarekom = array();

			$dbmt = $value->idbmt;
			$idbmt = explode(",", $dbmt);
			$id_bmt = $this->M_optimasi->getKanWhereId($idbmt);
			foreach ($id_bmt as $val) {
				$namabmt[] = $val['nama'];
			}
			$becomenamabmt = implode(", ", $namabmt);

			$drekom = $value->idrekom;
			$idrekom = explode(",", $drekom);
			$id_rekom = $this->M_optimasi->getKanWhereId($idrekom);
			foreach ($id_rekom as $fal) {
				$namarekom[] = $fal['nama'];
			}
			$becomenamarekom = implode(", ", $namarekom);

			$idusia = $value->id_usia;
			$dusia = $this->M_kebutuhan->getKebWhereId($idusia);
			$becomenamausia = $dusia['nama'];

			$data[]=array(
				'id' => $value->id,
				'popsize' => $value->popsize,
				'generasi' => $value->generasi,
				'cr' => $value->cr,
				'mr' =>	$value->mr,
				'fitness' => $value->fitness,
				'id_usia' => $idusia,
				'nama_usia' => $becomenamausia,
				'id_bmt' =>	$becomenamabmt,
				'jml_komp' => $value->jml_komp,
				'id_rekom' => $becomenamarekom
			);

			$dbmt = array();
			$namabmt = array();
			$drekom = array();
			$namarekom = array();
		}
		return $data;
	}

	public function maxIdHistori()
	{
		$this->db->select_max('id');
		$this->db->from('histori');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function maxIdHistoriBmt()
	{
		$this->db->select_max('id');
		$this->db->from('histori_detailbmt');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function maxIdHistoriRekom()
	{
		$this->db->select_max('id');
		$this->db->from('histori_detailrekom');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function insertHistori($data)
	{
		$this->db->insert('histori', $data);
	}

	public function insertHistoriBmt($data)
	{
		$this->db->insert('histori_detailbmt', $data);
	}

	public function insertHistoriRekom($data)
	{
		$this->db->insert('histori_detailrekom', $data);
	}

	public function delete($id){
		$this->db->query("DELETE histori_detailbmt,histori_detailrekom,histori 
        FROM histori_detailbmt,histori_detailrekom,histori 
        WHERE histori_detailbmt.id_histori=histori.id 
        AND histori_detailrekom.id_histori=histori.id 
        AND histori.id= $id");
	}
}
?>