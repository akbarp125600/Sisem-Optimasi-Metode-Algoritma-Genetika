<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_pekerjaan');
		$this->load->helper('url');
	}

	public function index(){
		$data['idmax'] = $this->M_pekerjaan->getMaxId();
		$data['jenis_pekerjaan'] = $this->M_pekerjaan->jenis_pekerjaan();
		$data['pekerjaan'] = $this->M_pekerjaan->pekerjaan();
		$this->load->view('admin/data pekerjaan/view_pekerjaan', $data);
	}

	public function tambah_pekerjaan(){
		$dat = array(
			'id_pekerjaan'			=>	$this->input->post('id_pekerjaan'),
			'id_jenis_pekerjaan'		=>	$this->input->post('id_jenis_pekerjaan'),
			'nama_pekerjaan'		=>	$this->input->post('nama_pekerjaan'),
			'keterangan'			=>	$this->input->post('keterangan')
		);
		$this->M_pekerjaan->insert($dat);
		$this->session->set_flashdata('msg','success');
        redirect(site_url('pekerjaan'));
	}

	public function edit_pekerjaan(){
		/*$data['data_satuan']=$this->M_data_satuan->getKebWhereId($id_satuan);*/
		/*$dat=array(
			'id_satuan'		=>	$this->input->post('id_satuan'),
			'nama_satuan'	=>	$this->input->post('nama_satuan'),
			'keterangan'	=>	$this->input->post('keterangan')
			
		);*/
		$a = $this->input->post('id_pekerjaan');
		$b = $this->input->post('id_jenis_pekerjaan');
		$c = $this->input->post('nama_pekerjaan');
		$d = $this->input->post('keterangan');

		$where= $a;
		$this->M_pekerjaan->update($b, $c, $d, $where);
		$this->session->set_flashdata('msg','edit');
            redirect(site_url('pekerjaan'));
	}

	public function hapus_pekerjaan($id_pekerjaan){
		$this->M_pekerjaan->delete($id_pekerjaan);
		$this->session->set_flashdata('msg','hapus');
            redirect(site_url('pekerjaan'));
	}
}