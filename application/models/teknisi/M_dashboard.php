<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{
    public function tiket_masuk()
    {
        $sql = "SELECT count(*) as count FROM tiket";
        $result = $this->db->query($sql);
        // $query = $this->db->query("SELECT count(*) FROM tiket Where status_tiket = 1")
        return $result->row()->count;
    }
    public function diajukan()
    {
        $sql = "SELECT count(*) as status_tiket FROM tiket where status_tiket = 2 OR status_tiket = 6 ";
        $result = $this->db->query($sql);
        return $result->row()->status_tiket;
    }
    public function dalam_proses()
    {
        $sql = "SELECT count(*) as status_tiket FROM tiket where status_tiket = 3";
        $result = $this->db->query($sql);
        return $result->row()->status_tiket;
    }
    public function sudah_ditangani()
    {
        $sql = "SELECT count(*) as status_tiket FROM tiket where status_tiket = 4 OR status_tiket = 7";
        $result = $this->db->query($sql);
        return $result->row()->status_tiket;
    }

    public function tiket_diajukan()
    {
        $this->db->select('t.*, u.nama_user AS nama_user, d.NAMA_DEPARTEMEN AS NAMA_DEPARTEMEN');
        $this->db->from('tiket t');
        $this->db->join('user u', 'u.ID_USER=t.ID_USER');
        $this->db->join('inventory i', 'i.ID_INVENTORY =t.ID_INVENTORY');
        $this->db->join('departemen d', 'd.ID_DEPARTEMEN  =i.ID_DEPARTEMEN ');
        $this->db->where('t.STATUS_TIKET', 1);

        return $this->db->get()->result();
    }
    public function tiket_selesai()
    {
        $this->db->select('t.*, u.nama_user AS nama_user, d.NAMA_DEPARTEMEN AS NAMA_DEPARTEMEN');
        $this->db->from('tiket t');
        $this->db->join('user u', 'u.ID_USER=t.ID_USER');
        $this->db->join('inventory i', 'i.ID_INVENTORY =t.ID_INVENTORY');
        $this->db->join('departemen d', 'd.ID_DEPARTEMEN  =i.ID_DEPARTEMEN ');
        $this->db->where('t.STATUS_TIKET = 4 ');
        $this->db->order_by('t.ID_TIKET', 'DESC');
        $this->db->limit(3);



        return $this->db->get()->result();
    }
}
