<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_admin');		
                $this->load->helper('url');
	}
	public function index()
	{	
		$data['toper']=$this->M_admin->totalpercobaan();
		$data['tomat']=$this->M_admin->totalmaterial();
		$data['tomes']=$this->M_admin->totalmesin();
		$data['toban']=$this->M_admin->totalbahan();
		$this->load->view('index',$data);
	}

	/*public function logout(){
		$this->session->sess_destroy();
		redirect('login/logout');
	}*/
}