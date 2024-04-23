<?php 
 
class MSubmasalah extends CI_Model{
    public function getTable() 
	{
		$this->db->select('submasalah.*');
		$this->db->from('submasalah');
		// $this->db->where('departemen.DELETED_AT',NULL);
		$this->db->where('submasalah.is_deleted', false);
		$query = $this->db->get();
		return $query->result();
	}


	public function getTables($NAMA_SUBMASALAH =null) 
	{
		$this->db->select('submasalah.*');
		$this->db->from('submasalah');
		$this->db->where('submasalah.is_deleted', false);
	
		// Jika $ID_TIKET ada, cari nilai yang sesuai di tabel penyebab

		// var_dump($NAMA_SUBMASALAH);die;
		// if ($NAMA_SUBMASALAH !== null) {
		// 	$this->db->where('submasalah.NAMA_SUBMASALAH', $NAMA_SUBMASALAH);
		// }
	
		$query = $this->db->get();
		return $query->result();
	}
	public function insert($data) 
	{
		return $this->db->insert('submasalah', $data);
	}

	public function get($id) {
		return $this->db->where('ID_SUBMASALAH', $id)->get('submasalah')->row();
	}

	public function Update($data, $id)
	{
		return $this->db->update('submasalah', $data, ['ID_SUBMASALAH'=>$id]);
	}
	public function delete($id) {
		$data=date('Y-m-d');
		$data = array(
			'DELETED_AT' => $data,
			'is_deleted'=>1
	);
	
	$this->db->where('ID_SUBMASALAH', $id);
	$this->db->update('submasalah', $data);
	}
    
}