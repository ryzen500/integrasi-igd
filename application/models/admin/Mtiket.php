<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mtiket extends CI_Model
{
	public function getAll()
	{
		return $this->db->get('departemen')->result();
	}
	public function getAll1()
	{
		return $this->db->get('inventory')->result();
	}
	public function teknisi($level = 3)
	{
		return $this->db->where('id_level', $level)->get('user')->result();
	}

	public function edit_tiket($id = 53)
	{
		$this->db->select('t.*, u.nama_user AS nama_user, t.ID_INVENTORY AS ID_INVENTORY, d.NAMA_DEPARTEMEN AS NAMA_DEPARTEMEN');
		$this->db->from('tiket t');
		$this->db->join('user u', 't.ID_USER=u.ID_USER');
		$this->db->join('inventory i', 't.ID_INVENTORY =i.ID_INVENTORY');
		$this->db->join('departemen d', 'i.ID_DEPARTEMEN  =d.ID_DEPARTEMEN ');
		$this->db->where('t.ID_TIKET', $id);

		return $this->db->get()->result();
;
	}
}