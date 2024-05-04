<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mdep extends CI_Model
{
	public function getAll()
	{

        $this->db->select('d.*');
        $this->db->from('departemen d');
        // $this->db->where('d.DELETED_AT',NULL);
        $this->db->where('d.is_deleted ', false);

		return $this->db->get()->result();
	}
	public function getAll1()
	{
		return $this->db->get('level')->result();
	}
}
	

