<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_history');
		$this->load->model('M_kandopt');
		$this->load->model('M_bmt', 'Bmt');
	}

	public function index()
	{
		$data['history']=$this->M_history->histori();
		$this->load->view('admin/history', $data);
	}

	public function add(){
		$idbmt = $this->input->post('id_bmt');
		$primerbmt = $this->input->post('iddetilbmt');
		$idrekom = $this->input->post('id_rekom');
		$primerrekom = $this->input->post('iddetilrekom');
		$plusbmt = 0;
		$plusrekom = 0;
		$datahistori = array(
			'id'	=>	$this->input->post('id'),
			'popsize'	=>	$this->input->post('popsize'),
			'generasi'	=>	$this->input->post('generasi'),
			'cr'	=>	$this->input->post('cr'),
			'mr'	=>	$this->input->post('mr'),
			'fitness'	=>	$this->input->post('fitness'),
			'id_usia'	=>	$this->input->post('id_usia'),
			'jml_komp'	=>	$this->input->post('jml_komp')
		);
		$this->M_history->insertHistori($datahistori);
		for ($i=0; $i < sizeof($idbmt); $i++) { 
			if($i==0){
				$datahistoribmt = array(
					'id'	=>	$primerbmt,
					'id_bmt'	=>	$idbmt[$i],
					'id_histori'	=>	$this->input->post('id')
				);
			}else{
				$datahistoribmt = array(
					'id'	=>	$primerbmt+$plusbmt,
					'id_bmt'	=>	$idbmt[$i],
					'id_histori'	=>	$this->input->post('id')
				);
			}
			$plusbmt++;
			$this->M_history->insertHistoriBmt($datahistoribmt);
		}
		for ($i=0; $i < sizeof($idrekom); $i++) { 
			if($i==0){
				$datahistorirekom = array(
					'id'	=>	$primerrekom,
					'id_rekom'	=>	$idrekom[$i],
					'id_histori'	=>	$this->input->post('id')
				);
			}else{
				$datahistorirekom = array(
					'id'	=>	$primerrekom+$plusrekom,
					'id_rekom'	=>	$idrekom[$i],
					'id_histori'	=>	$this->input->post('id')
				);
			}
			$plusrekom++;
			$this->M_history->insertHistoriRekom($datahistorirekom);
		}
		redirect('History');
	}

	public function lihatkandungan($idhistori, $idusia){
		$kandopt = array();
		$kandopt=$this->M_kandopt->getIdRekom($idhistori);
		$data['kandopt']=$this->M_kandopt->getKanWhereId($kandopt);
		$data['totkandopt']=$this->M_kandopt->totkandopt($kandopt);
		$totkand=$this->M_kandopt->totkandopt($kandopt);

		$data['uspil']=$this->M_kandopt->getKebWhereId($idusia);
		$arruspil = $this->M_kandopt->getKebWhereId($idusia);
		$butuh=$this->M_kandopt->kebutuhan($arruspil);

		$data['comparison'] = array_combine($butuh, $totkand);

		$data['bmt']=$this->Bmt->bmt();

		$this->load->view('admin/kandopt', $data);
	}

	public function deletehistory($id)
	{
		$this->M_history->delete($id);
		redirect('history');
	}
}