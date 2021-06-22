<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_jenis_material');
	}

	public function index()
	{
		/*$data['material']=$this->M_jenis_material->getKebWhereId($id);*/
		$data['idmax'] = $this->M_jenis_material->getMaxId();
		$data['material']=$this->M_jenis_material->jenis_material();
		$this->load->view('admin/jenis material/view_material', $data);
	}

	public function tambah(){
		$data['idmax'] = $this->M_jenis_material->getMaxId();
		$this->load->view('admin/jenis material/tambah_material', $data);
	}

	public function tambah_material(){
		$dat = array(
			'id'	=>	$this->input->post('id'),
			'nama_jenis'	=>	$this->input->post('nama_jenis'),
		);
		$this->M_jenis_material->insert($dat);
		$this->session->set_flashdata('msg','success');
            redirect(site_url('material'));
	}

	public function edit($id){
		$data['material']=$this->M_jenis_material->getKebWhereId($id);
		$this->load->view('admin/jenis material/edit_material', $data);
	}

	public function edit_material(){
		$dat=array(
			'id'	=>	$this->input->post('id'),
			'nama_jenis'	=>	$this->input->post('nama_jenis')
			
		);
		$where=$this->input->post('id');
		$this->M_jenis_material->update($dat, $where);
		$this->session->set_flashdata('msg','edit');
            redirect(site_url('material'));
	}

	public function hapus_material($id){
		$this->M_jenis_material->delete($id);
		$this->session->set_flashdata('msg','hapus');
            redirect(site_url('material'));
		/*redirect('material');*/
	}

	public function detail($id){
		$data['material']=$this->M_jenis_material->detail($id);
		$this->load->view('admin/jenis material/detail_material', $data);
	}

	/*public function messageAlert($type, $title)
    {
        $messageAlert = "
      const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 5000
      });

      Toast.fire({
          type: '" . $type . "',
          title: '" . $title . "'
      });
      ";
        return $messageAlert;
    }*/
}