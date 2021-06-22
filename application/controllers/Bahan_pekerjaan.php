<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahan_pekerjaan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_bahan_pekerjaan');
		$this->load->helper('url');
	}

	public function index(){
		$data['nama_bahan'] = $this->M_bahan_pekerjaan->nama_bahan();
		$data['nama_pekerjaan'] = $this->M_bahan_pekerjaan->nama_pekerjaan();
		$data['jenis_pekerjaan'] = $this->M_bahan_pekerjaan->jenis_pekerjaan();
		$data['idmax'] = $this->M_bahan_pekerjaan->getMaxId();
		$data['bahan_pekerjaan'] = $this->M_bahan_pekerjaan->bahan_pekerjaan();
		$this->load->view('admin/data bahan pekerjaan/view_bahan_pekerjaan', $data);
	}

	public function tambah_bahan_pekerjaan(){
		$dat = array(
			'id_bahan_pekerjaan'			=>	$this->input->post('id_bahan_pekerjaan'),
			'id_jenis_pekerjaan'		=>	$this->input->post('id_jenis_pekerjaan'),
			'id_pekerjaan'		=>	$this->input->post('id_pekerjaan'),
			'id_harga'		=>	$this->input->post('id_harga')
		);
		$this->M_bahan_pekerjaan->insert($dat);
		$this->session->set_flashdata('msg','success');
        redirect(site_url('bahan_pekerjaan'));
	}

	public function edit_bahan_pekerjaan(){
		/*$data['data_satuan']=$this->M_data_satuan->getKebWhereId($id_satuan);*/
		/*$dat=array(
			'id_satuan'		=>	$this->input->post('id_satuan'),
			'nama_satuan'	=>	$this->input->post('nama_satuan'),
			'keterangan'	=>	$this->input->post('keterangan')
			
		);*/
		$a = $this->input->post('id_bahan_pekerjaan');
		$b = $this->input->post('id_jenis_pekerjaan');
		$c = $this->input->post('id_pekerjaan');
		$d = $this->input->post('id_harga');

		$where= $a;
		$this->M_bahan_pekerjaan->update($b, $c, $d, $where);
		$this->session->set_flashdata('msg','edit');
            redirect(site_url('bahan_pekerjaan'));
	}

	public function hapus_pekerjaan($id_bahan_pekerjaan){
		$this->M_bahan_pekerjaan->delete($id_bahan_pekerjaan);
		$this->session->set_flashdata('msg','hapus');
            redirect(site_url('bahan_pekerjaan'));
	}
}