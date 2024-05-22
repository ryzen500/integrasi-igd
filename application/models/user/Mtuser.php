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


    public function update($data, $id)
    {
        return $this->db->update('laporan_rekap', $data, ['id' => $id]);
    }


    public function laporan_masuk()
    {
        $sql = "SELECT count(id) as total_laporan_masuk FROM laporan_rekap";
        $result = $this->db->query($sql);
        return $result->row()->total_laporan_masuk;
    }

    public function laporan_saya($id)
    {
        $sql = "SELECT count(id) as total_saya FROM laporan_rekap WHERE id_user = '" . $id . "'";
        $result = $this->db->query($sql);
        return $result->row()->total_saya;
    }



    public function laporanuser()
    {
        $sql = "SELECT count(id_user) as laporan_user FROM user";
        $result = $this->db->query($sql);
        return $result->row()->laporan_user;
    }


    public function laporandokter()
    {
        $sql = "SELECT count(id_user) as laporandokter FROM user WHERE id_level = 2 ";
        $result = $this->db->query($sql);
        return $result->row()->laporandokter;
    }


    public function laporan_ppa()
{
    $sql = "SELECT u.nama_user, COUNT(lr.id) AS total_laporan_rekap
            FROM laporan_rekap lr
            LEFT JOIN `user` u ON lr.id_user = u.id_user
            GROUP BY lr.id_user
            ORDER BY total_laporan_rekap DESC";

    $query = $this->db->query($sql);

    // Mengembalikan hasil query dalam bentuk array objek jika menggunakan CodeIgniter
    return $query->result();
}


public function pendaftaran_terakhir()
{
    $sql = "SELECT * from laporan_rekap
            ORDER BY id DESC LIMIT 5";

    $query = $this->db->query($sql);

    // Mengembalikan hasil query dalam bentuk array objek jika menggunakan CodeIgniter
    return $query->result();
}



public function tiket_user_per_user()
{
    $this->db->select('t.*');
    $this->db->from('laporan_rekap t');
    // $this->db->join('inventory i', 'i.id_inventory=t.id_inventory');
    // $this->db->join('departemen d', 'd.id_departemen=i.id_departemen');
    // $this->db->join('status_tiket s', 's.ID_STATUS=t.STATUS_TIKET');
    $this->db->where('t.id_user', $this->session->userdata('id_user'));
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

    public function data_saya($id)
    {
        $this->db->select('u.*');

        $this->db->from('laporan_rekap u');
        // $this->db->join('departemen d', 'd.ID_DEPARTEMEN=u.id_departemen');
        $this->db->where('id_user', $id);
        return $this->db->get();
    }
}
