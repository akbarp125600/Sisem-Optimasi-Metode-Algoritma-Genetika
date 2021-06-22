<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_data_satuan');
		$this->load->helper('url');
	}

	public function index(){
		$data['idmax'] = $this->M_data_satuan->getMaxId();
		$data['data_satuan']=$this->M_data_satuan->data_satuan();
		$this->load->view('admin/data satuan/view_data_satuan', $data);
	}

	public function tambah_data_satuan(){
		$dat = array(
			'id_satuan'	=>	$this->input->post('id_satuan'),
			'nama_satuan'	=>	$this->input->post('nama_satuan'),
			'keterangan'	=>	$this->input->post('keterangan')
		);
		$this->M_data_satuan->insert($dat);
		$this->session->set_flashdata('msg','success');
            redirect(site_url('satuan'));
	}

	public function edit_data_satuan(){
		/*$data['data_satuan']=$this->M_data_satuan->getKebWhereId($id_satuan);*/
		// $dat=array(
		// 	'id_satuan'		=>	$this->input->post('id_satuan'),
		// 	'nama_satuan'	=>	$this->input->post('nama_satuan'),
		// 	'keterangan'	=>	$this->input->post('keterangan')
			
		// );
		$a = $this->input->post('id_satuan');
		$b = $this->input->post('nama_satuan');
		$c = $this->input->post('keterangan');

		$where= $a;
		$this->M_data_satuan->update($b, $c, $where);
		$this->session->set_flashdata('msg','edit');
            redirect(site_url('satuan'));
	}
	public function hapus_data_satuan($id_satuan){
		$this->M_data_satuan->delete($id_satuan);
		$this->session->set_flashdata('msg','hapus');
            redirect(site_url('satuan'));
		/*redirect('material');*/
	}
}