<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kandopt extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_kandopt');
		$this->load->model('M_bmt');
		$this->load->model('M_history');
		$this->load->model('M_bahan');
	}

	public function index()
	{
		$kandopt = array();
		$kandopt=$this->input->post('bmtopt');
		$data['kandopt']=$this->M_kandopt->getKanWhereId($kandopt);
		$data['totkandopt']=$this->M_kandopt->totkandopt($kandopt);
		$totkand=$this->M_kandopt->totkandopt($kandopt);

		$idusia=$this->input->post('uspil');
		$data['uspil']=$this->M_kandopt->getKebWhereId($idusia);
		$arruspil = $this->M_kandopt->getKebWhereId($idusia);
		$butuh=$this->M_kandopt->kebutuhan($arruspil);

		$data['comparison'] = array_combine($butuh, $totkand);

		$data['bmt']=$this->M_bmt->bmt();

		//forsavehistory
		$data['tohistory'] = array(
			'id_rekom'	=>	$this->input->post('bmtopt'),
			'id_usia'	=>	$this->input->post('uspil'),
			'id_bmt'	=>	$this->input->post('id_bmt'),
			'jml_komp'	=>	$this->input->post('jml_komp'),
			'popsize'	=>	$this->input->post('popsize'),
			'generasi'	=>	$this->input->post('generasi'),
			'cr'	=>	$this->input->post('cr'),
			'mr'	=>	$this->input->post('mr'),
			'fitness'	=>	$this->input->post('fitness'),
			'idmaxhistori'	=>	$this->M_history->maxIdHistori(),
			'idmaxhistoribmt'	=>	$this->M_history->maxIdHistoriBmt(),
			'idmaxhistorirekom'	=>	$this->M_history->maxIdHistoriRekom()
		);

		$this->load->view('admin/kandopt', $data);
	}
}