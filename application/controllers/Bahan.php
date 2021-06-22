<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahan extends CI_Controller {
	function __construct(){
		parent::__construct();
		 $this->load->model('m_bahan');
		 /*$this->load->model('M_bmt');*/
                $this->load->helper('url');
	}
	public function index()
	{
		$data['jenisbmt']=$this->m_bahan->jenisBmt();
		$data['idmax'] = $this->m_bahan->getMaxId();
		$data['bahan'] = $this->m_bahan->tampil_data();
		$this->load->view('admin/bahan/view_bahan',$data);
	}
	/*public function tambah()
	{
		$data['idmax'] = $this->m_bahan->getMaxId();
		$data['jenisbmt']=$this->m_bahan->jenisBmt();
		$this->load->view('admin/bahan/tambah_bahan',$data);
	}*/
	public function tambah_data(){
		$dat = array(
			'id'	=>	$this->input->post('id'),
			'nama'	=>	$this->input->post('nama'),
			'pk'	=>	$this->input->post('pk'),
			'em'	=>	$this->input->post('em'),
			'met'	=>	$this->input->post('met'),
			'lis'	=>	$this->input->post('lis'),
			'ca'	=>	$this->input->post('ca'),
			'p'		=>	$this->input->post('p'),
			'harga'	=>	$this->input->post('harga'),
			'waktu'	=>	$this->input->post('waktu'),
			'id_jenis'	=>	$this->input->post('id_jenis')
		);
		$this->m_bahan->insert($dat);
		$this->session->set_flashdata('msg','success');
		redirect('bahan');
	}
	public function edit($id)
	{
	/*$where = array('id' => $id);*/
	/*$data['bmt'] = $this->m_bmt->jenisBmt('bmt')->result();*/
	$data['bahan']=$this->m_bahan->getBmtWhereId($id);
	$data['jenisbmt']=$this->m_bahan->jenisBmt();
	$this->load->view('admin/bahan/edit_bahan',$data);
	}

	public function edit_bahan(){
	$dat=array(
			'id'	=>	$this->input->post('id'),
			'nama'	=>	$this->input->post('nama'),
			'pk'	=>	$this->input->post('pk'),
			'em'	=>	$this->input->post('em'),
			'met'	=>	$this->input->post('met'),
			'lis'	=>	$this->input->post('lis'),
			'ca'	=>	$this->input->post('ca'),
			'p'	=>	$this->input->post('p'),
			'harga'	=>	$this->input->post('harga'),
			'waktu'	=>	$this->input->post('waktu'),
			'id_jenis'	=>	$this->input->post('id_jenis')
		);
		$where=$this->input->post('id');
		$this->m_bahan->update($dat, $where);
	redirect('bahan');
	}

	/*public function edit_bahan(){
		$a = $this->input->post('id');
		$b = $this->input->post('nama');
		$c = $this->input->post('harga');
		$d = $this->input->post('id_jenis');

		$where= $a;
		$this->m_bahan->edit_bahan($b, $c, $d, $where);
		$this->session->set_flashdata('msg','edit');
            redirect(site_url('bahan'));
	}*/

	public function hapus($id){
		$where = array('id' => $id);
		$this->m_bahan->hapus_data($where,'bmt');
		redirect('bahan');
	}
}