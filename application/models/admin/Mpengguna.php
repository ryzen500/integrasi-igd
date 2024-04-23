<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpengguna extends CI_Model {
	public function getTable() 
	{
		$this->db->select('user.*,level.*,departemen.*');
		$this->db->from('user,level,departemen');
		$this->db->where('user.id_departemen = departemen.ID_DEPARTEMEN');
		$this->db->where('user.id_level = level.ID_level');
		$this->db->where('user.DELETED_AT',NULL);
		$query = $this->db->get();
		return $query->result();
	}
	public function insert($data) 
	{
		return $this->db->insert('user', $data);
	}

	public function get($id) {
		return $this->db->where('id_user', $id)->get('user')->row();
	}

    public function Update($data, $id)
	{
		return $this->db->update('user', $data, ['id_user'=>$id]);
	}
	public function delete($id) {
		$data=date('Y-m-d');
		$data = array(
			'DELETED_AT' => $data
	);
	
	$this->db->where('id_user', $id);
	$this->db->update('user', $data);
	}

}
