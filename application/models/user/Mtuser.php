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
    public function departemen()
    {

        $this->db->select('d.*');
        $this->db->from('departemen d');
        $this->db->where('d.is_deleted','true');

        return $this->db->get()->result();
    }

    public function departemen_pelapor($query)
    {

        $this->db->select('d.*');
        $this->db->from('departemen d');
        $this->db->where('d.is_deleted','1');
        if (!empty($query)) {
            $this->db->like('d.NAMA_DEPARTEMEN', $query); // Mencari kesamaan dengan query
        }

        return $this->db->get()->result();
    }
    public function inventory()
    {

        $this->db->select('i.*, d.nama_departemen AS DEPARTEMEN');
        $this->db->from('inventory i');
        $this->db->join('departemen d', 'd.id_departemen=i.id_departemen');
        $this->db->where('d.DELETED_AT',NULL);
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
    public function generate()
    {
        $no_tiket = "T-" . time() . rand(999, 111);
        return $no_tiket;
    }
    public function insert($data, $table)
    {
        return $this->db->insert($table, $data);
    }

    function update_profil($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function track($ID_TIKET)
    {
        $this->db->select('td.*, u.nama_user AS nama_teknisi,s.STATUS_TIKET AS status ');
        $this->db->from('tiket_detail td');
        $this->db->join('user u', 'u.ID_USER=td.ID_TEKNISI');
        $this->db->join('status_tiket s', 's.ID_STATUS =td.ID_STATUS');
        $this->db->where('td.ID_TIKET', $ID_TIKET);
        $this->db->order_by('td.ID_TIKET_DETAIL', 'ASC');
        return $this->db->get()->result();
    }
    function track_user($ID_TIKET)
    {
        $this->db->select('t.nama_pelapor,t.ID_USER,t.ID_TIKET AS ID_TIKETS, t.TANGGAL AS tanggal_pengajuan,t.STATUS_TIKET AS STATUS_TIKET, u.nama_user AS user,s.STATUS_TIKET AS status ');
        $this->db->from('tiket t');
        $this->db->join('user u', 'u.ID_USER=t.ID_USER');
        $this->db->join('status_tiket s', 's.ID_STATUS =t.STATUS_TIKET');
        return $this->db->where('t.ID_TIKET', $ID_TIKET)->get('tiket')->row();
    }
    public function insert_tiket_detail($data, $table)
    {
        return $this->db->insert_tiket_detail($table, $data);
    }

    public function update_konfirmasi($data, $id, $data2)
    {
        $this->db->update('tiket', $data, ['ID_TIKET' => $id]);
        return $this->db->insert('tiket_detail', $data2);
    }
}
