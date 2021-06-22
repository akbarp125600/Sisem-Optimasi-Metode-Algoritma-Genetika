<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_pekerjaan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_jenis_pekerjaan');
		$this->load->helper('url');
	}

	public function index(){
		$data['idmax'] = $this->M_jenis_pekerjaan->getMaxId();
		$data['jenis_pekerjaan'] = $this->M_jenis_pekerjaan->jenis_pekerjaan();
		$this->load->view('admin/jenis pekerjaan/view_jenis_pekerjaan', $data);
	}
	public function tambah_jenis_pekerjaan(){
		$dat = array(
			'id_jenis_pekerjaan'	=>	$this->input->post('id_jenis_pekerjaan'),
			'jenis_pekerjaan'		=>	$this->input->post('jenis_pekerjaan'),
			'keterangan'			=>	$this->input->post('keterangan')
		);
		$this->M_jenis_pekerjaan->insert($dat);
		$this->session->set_flashdata('msg','success');
        redirect(site_url('jenis_pekerjaan'));
	}

	public function edit_jenis_pekerjaan(){
		/*$data['data_satuan']=$this->M_data_satuan->getKebWhereId($id_satuan);*/
		/*$dat=array(
			'id_satuan'		=>	$this->input->post('id_satuan'),
			'nama_satuan'	=>	$this->input->post('nama_satuan'),
			'keterangan'	=>	$this->input->post('keterangan')
			
		);*/
		$a = $this->input->post('id_jenis_pekerjaan');
		$b = $this->input->post('jenis_pekerjaan');
		$c = $this->input->post('keterangan');

		$where= $a;
		$this->M_jenis_pekerjaan->update($b, $c, $where);
		$this->session->set_flashdata('msg','edit');
            redirect(site_url('jenis_pekerjaan'));
	}
	public function hapus_jenis_pekerjaan($id_jenis_pekerjaan){
		$this->M_jenis_pekerjaan->delete($id_jenis_pekerjaan);
		$this->session->set_flashdata('msg','hapus');
            redirect(site_url('jenis_pekerjaan'));
	}
}