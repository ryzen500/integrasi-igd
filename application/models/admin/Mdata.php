<?php 
 
class Mdata extends CI_Model{
    public function getTable() 
	{
		$this->db->select('departemen.*');
		$this->db->from('departemen');
		// $this->db->where('departemen.DELETED_AT',NULL);
		$this->db->where('departemen.is_deleted', false);
		$query = $this->db->get();
		return $query->result();
	}
	public function insert($data) 
	{
		return $this->db->insert('departemen', $data);
	}

	public function get($id) {
		return $this->db->where('ID_DEPARTEMEN', $id)->get('departemen')->row();
	}

	public function Update($data, $id)
	{
		return $this->db->update('departemen', $data, ['ID_DEPARTEMEN'=>$id]);
	}
	public function delete($id) {
		$data=date('Y-m-d');
		$data = array(
			'DELETED_AT' => $data
	);
	
	$this->db->where('ID_DEPARTEMEN', $id);
	$this->db->update('departemen', $data);
	}
    
}