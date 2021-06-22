<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Harga_bahan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_harga_bahan');
		$this->load->helper('url');
	}

	public function index(){
		$data['idmax'] = $this->M_harga_bahan->getMaxId();
		$data['harga_bahan']=$this->M_harga_bahan->harga_bahan();
		$this->load->view('admin/data harga bahan/view_harga_bahan', $data);
	}

	public function tambah_harga_bahan(){
		$dat = array(
			'id_harga'		=>	$this->input->post('id_harga'),
			'nama_bahan'	=>	$this->input->post('nama_bahan'),
			'satuan'		=>	$this->input->post('satuan'),
			'harga'			=>	$this->input->post('harga'),
			'tahun'			=>	$this->input->post('tahun'),
			'keterangan'	=>	$this->input->post('keterangan')
		);
		$this->M_harga_bahan->insert($dat);
		$this->session->set_flashdata('msg','success');
            redirect(site_url('harga_bahan'));
	}

	public function edit_harga_bahan(){
		/*$data['data_satuan']=$this->M_data_satuan->getKebWhereId($id_satuan);*/
		// $dat=array(
		// 	'id_satuan'		=>	$this->input->post('id_satuan'),
		// 	'nama_satuan'	=>	$this->input->post('nama_satuan'),
		// 	'keterangan'	=>	$this->input->post('keterangan')
			
		// );
		$a = $this->input->post('id_harga');
		$b = $this->input->post('nama_bahan');
		$c = $this->input->post('satuan');
		$d = $this->input->post('harga');
		$e = $this->input->post('tahun');
		$f = $this->input->post('keterangan');

		$where= $a;
		$this->M_harga_bahan->update($b, $c, $d, $e, $f, $where);
		$this->session->set_flashdata('msg','edit');
            redirect(site_url('harga_bahan'));
	}

	public function hapus_harga_bahan($id_harga){
		$this->M_harga_bahan->delete($id_harga);
		$this->session->set_flashdata('msg','hapus');
            redirect(site_url('harga_bahan'));
		/*redirect('material');*/
	}
}