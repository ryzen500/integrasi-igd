<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mtuser extends CI_Model
{


    public function tiket()
    {
        $this->db->select('t.*, d.nama_departemen AS DEPARTEMEN,s.STATUS_TIKET AS isi_STATUS');
        $this->db->from('tiket t');
        $this->db->join('inventory i', 'i.id_inventory=t.id_inventory');
        $this->db->join('departemen d', 'd.id_departemen=i.id_departemen');
        $this->db->join('status_tiket s', 's.ID_STATUS=t.STATUS_TIKET');
        $this->db->where('t.id_user', $this->session->userdata('id_user'));
        $this->db->order_by('t.TANGGAL', 'DESC');
        return $this->db->get()->result();
    }


    public function track($id)
    {
        $this->db->select('t.*');
        $this->db->from('laporan_rekap t');
        // $this->db->join('inventory i', 'i.id_inventory=t.id_inventory');
        // $this->db->join('departemen d', 'd.id_departemen=i.id_departemen');
        // $this->db->join('status_tiket s', 's.ID_STATUS=t.STATUS_TIKET');
        $this->db->where('t.id', $id);
        // $this->db->order_by('t.TANGGAL', 'DESC');
        return $this->db->get()->result();
    }


    public function track_user($id)
    {
        $this->db->select('t.*');
        $this->db->from('laporan_rekap t');
        // $this->db->join('inventory i', 'i.id_inventory=t.id_inventory');
        // $this->db->join('departemen d', 'd.id_departemen=i.id_departemen');
        // $this->db->join('status_tiket s', 's.ID_STATUS=t.STATUS_TIKET');
        $this->db->where('t.id', $id);
        // $this->db->order_by('t.TANGGAL', 'DESC');
        return $this->db->get()->result();
    }
    

    public function tiket_user()
    {
        $this->db->select('t.*');
        $this->db->from('laporan_rekap t');
        // $this->db->join('inventory i', 'i.id_inventory=t.id_inventory');
        // $this->db->join('departemen d', 'd.id_departemen=i.id_departemen');
        // $this->db->join('status_tiket s', 's.ID_STATUS=t.STATUS_TIKET');
        // $this->db->where('t.nama_pelapor', $this->session->userdata('nama_user'));
        // $this->db->order_by('t.TANGGAL', 'DESC');
        return $this->db->get()->result();
    }

    
    public function get_profil($id = null)
    {
        // $this->db->select('u.*, d.NAMA_DEPARTEMEN AS departemen');
        $this->db->select('u.*');

        $this->db->from('user u');
        // $this->db->join('departemen d', 'd.ID_DEPARTEMEN=u.id_departemen');
        $this->db->where('id_user', $id);
        return $this->db->get();
    }
}
