<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_report');
	}

	public function index()
	{
		//crmr
		$data['report']=$this->M_report->report();
		$data['rapot']=$this->M_report->reportAll();
		$data['countid']=$this->M_report->countIdGroup();
		$data['totid']=$this->M_report->countIdAll();
		$data['totcr']=$this->M_report->countCrMr();
		$data['thebest']=$this->M_report->bestAll();
		//jmlgenerasi
		$data['reportgen']=$this->M_report->reportgen();
		$data['totgen']=$this->M_report->countGen();
		$data['bestgen']=$this->M_report->bestGen();
		// echo "<pre/>";
		// var_dump($this->M_report->bestCrMr());
		$this->load->view('admin/report', $data);
	}
}