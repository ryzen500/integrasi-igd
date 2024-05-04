<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mlaptiket extends CI_Model
{
	public function getTable()
	{

		$this->db->select('t.*, u.nama_user AS nama_user, d.NAMA_DEPARTEMEN AS NAMA_DEPARTEMEN,s.STATUS_TIKET AS STATUS ');
		$this->db->from('tiket t');
		$this->db->join('user u', 'u.ID_USER=t.ID_USER');
		$this->db->join('inventory i', 'i.ID_INVENTORY =t.ID_INVENTORY');
		$this->db->join('departemen d', 'd.ID_DEPARTEMEN  =i.ID_DEPARTEMEN');
		$this->db->join('status_tiket s', 's.ID_STATUS =t.STATUS_TIKET');

		return $this->db->get()->result();
	}
	public function getTable_selesai()
	{

		$this->db->select('t.*, u.nama_user AS nama_user, d.NAMA_DEPARTEMEN AS NAMA_DEPARTEMEN,s.STATUS_TIKET AS STATUS ');
		$this->db->from('tiket t');
		$this->db->join('user u', 'u.ID_USER=t.ID_USER');
		$this->db->join('inventory i', 'i.ID_INVENTORY =t.ID_INVENTORY');
		$this->db->join('departemen d', 'd.ID_DEPARTEMEN  =i.ID_DEPARTEMEN');
		$this->db->join('status_tiket s', 's.ID_STATUS =t.STATUS_TIKET');
		$this->db->where('t.STATUS_TIKET = 7');
		

		return $this->db->get()->result();
	}

	public function get_ticket_statistics_by_year_and_status($year, $status) {
        $this->db->select('SUB_MASALAH, COUNT(*) AS Total');
        $this->db->select("ROUND((COUNT(*) / (SELECT COUNT(*) FROM tiket WHERE YEAR(TANGGAL) = '$year' AND STATUS_TIKET = $status)) * 100, 2) AS Persentase", FALSE);
        $this->db->from('tiket');
        $this->db->where("YEAR(TANGGAL)", $year);
        $this->db->where('STATUS_TIKET', $status);
        $this->db->group_by('SUB_MASALAH');
		return $this->db->get()->result();

    }

	public function daftar_tiket()
	{

		$this->db->select('t.*, u.nama_user AS nama_user, d.NAMA_DEPARTEMEN AS NAMA_DEPARTEMEN,s.STATUS_TIKET AS STATUS ');
		$this->db->from('tiket t');
		$this->db->join('user u', 'u.ID_USER=t.ID_USER');
		$this->db->join('inventory i', 'i.ID_INVENTORY =t.ID_INVENTORY');
		$this->db->join('departemen d', 'd.ID_DEPARTEMEN  =i.ID_DEPARTEMEN');
		$this->db->join('status_tiket s', 's.ID_STATUS =t.STATUS_TIKET');
		$this->db->where('t.STATUS_TIKET = 1 OR t.STATUS_TIKET = 6');

		return $this->db->get()->result();
	}
	public function insert($data)
	{
		return $this->db->insert('tiket', $data);
	}

	public function get($id)
	{

		$this->db->select('t.*, u.nama_user AS nama_user, t.ID_INVENTORY AS ID_INVENTORY, d.NAMA_DEPARTEMEN AS NAMA_DEPARTEMEN');
		$this->db->from('tiket t');
		$this->db->join('user u', 't.ID_USER=u.ID_USER');
		$this->db->join('inventory i', 't.ID_INVENTORY =i.ID_INVENTORY');
		$this->db->join('departemen d', 'i.ID_DEPARTEMEN  =d.ID_DEPARTEMEN ');
		return $this->db->where('t.ID_TIKET', $id)->get('tiket')->row();

	}

	public function Update($data, $id)
	{
		return $this->db->update('tiket', $data, ['ID_TIKET' => $id]);
	}
}
