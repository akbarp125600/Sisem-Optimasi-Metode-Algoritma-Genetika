<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mesin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_kebutuhan');
	}

	public function index()
	{
		$data['mesin']=$this->M_kebutuhan->kebutuhan();
		$this->load->view('admin/jenis mesin/view_mesin', $data);
	}

	public function tambah(){
		$data['idmax'] = $this->M_kebutuhan->getMaxId();
		$this->load->view('admin/jenis mesin/tambah_mesin', $data);
	}

	public function tambah_mesin(){
		$dat = array(
			'id'	=>	$this->input->post('id'),
			'nama'	=>	$this->input->post('nama'),
			'umur'	=>	$this->input->post('umur'),
			'pk'	=>	$this->input->post('pk'),
			'em'	=>	$this->input->post('em'),
			'met'	=>	$this->input->post('met'),
			'lis'	=>	$this->input->post('lis'),
			'ca'	=>	$this->input->post('ca'),
			'p'	=>	$this->input->post('p')
		);
		$this->M_kebutuhan->insert($dat);
		redirect('mesin');
	}

	public function edit($id){
		$data['mesin']=$this->M_kebutuhan->getKebWhereId($id);
		$this->load->view('admin/jenis mesin/edit_mesin', $data);
	}

	public function edit_mesin(){
		$dat=array(
			'id'	=>	$this->input->post('id'),
			'nama'	=>	$this->input->post('nama'),
			'umur'	=>	$this->input->post('umur'),
			'pk'	=>	$this->input->post('pk'),
			'em'	=>	$this->input->post('em'),
			'met'	=>	$this->input->post('met'),
			'lis'	=>	$this->input->post('lis'),
			'ca'	=>	$this->input->post('ca'),
			'p'	=>	$this->input->post('p')
		);
		$where=$this->input->post('id');
		$this->M_kebutuhan->update($dat, $where);
		redirect('mesin');
	}

	public function hapus_mesin($id){
		$this->M_kebutuhan->delete($id);
		redirect('mesin');
	}
}