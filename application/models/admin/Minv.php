<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Minv extends CI_Model {
		public function getTable() 
		{
			$this->db->select('inventory.*, departemen.NAMA_DEPARTEMEN');
			$this->db->from('inventory');
			$this->db->join('departemen', 'departemen.ID_DEPARTEMEN = inventory.ID_DEPARTEMEN');
			$this->db->where('inventory.DELETED_AT',NULL);
			$query = $this->db->get();
			return $query->result();
		}
		public function insert($data) 
		{
			return $this->db->insert('inventory', $data);
		}
	
		public function get($id) {
			return $this->db->where('ID_INVENTORY', $id)->get('inventory')->row();
		}
	
		public function Update($data, $id)
		{
			return $this->db->update('inventory', $data, ['ID_INVENTORY'=>$id]);
		}
		public function delete($id) {
			$data=date('Y-m-d');
			$data = array(
				'DELETED_AT' => $data
		);
		
		$this->db->where('ID_INVENTORY', $id);
		$this->db->update('inventory', $data);
		}
		
	
	}
	

 ?>