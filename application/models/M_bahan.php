<?php 
 
class M_bahan extends CI_Model{
	function tampil_data(){
		$query=$this->db->query("SELECT bmt.id, bmt.nama, bmt.pk, bmt.em, bmt.met, bmt.lis, bmt.ca, bmt.p, bmt.harga, bmt.waktu, jenis_bmt.nama_jenis from bmt INNER JOIN jenis_bmt ON bmt.id_jenis = jenis_bmt.id");
		return $query->result();
	}
	public function insert($data)
	{
		$this->db->insert('bmt', $data);
	}
	function edit($where,$table){		
		return $this->db->get_where($table,$where);
	}
	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("id", $where);
		$this->db->update('bmt', $data);
	}
	function hapus_data($where,$table){
	$this->db->where($where);
	$this->db->delete($table);
	}

	public function getMaxId()
	{
		$this->db->select_max('id');
		$this->db->from('bmt');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function jenisBmt()
	{
		$query=$this->db->query("SELECT * FROM jenis_bmt");
		return $query->result();
	}

	public function getBmtWhereId($where)
	{
		$query=$this->db->query("SELECT * FROM bmt WHERE id='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id' => $value->id,
					'nama' => $value->nama,
					'pk' => $value->pk,
					'em' => $value->em,
					'met' => $value->met,
					'lis' => $value->lis,
					'ca' => $value->ca,
					'p' => $value->p,
					'harga' => $value->harga,
					'waktu' => $value->waktu,
					'id_jenis' => $value->id_jenis
				);
			}
		}
		return $data;
	}
}