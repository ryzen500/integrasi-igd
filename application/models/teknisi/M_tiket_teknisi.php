<?php

class M_tiket_teknisi extends CI_Model
{

    public function tampil_data()
    {
        $this->load->database();
        return $this->db->get('tiket')->result();
    }

    public function tiket()
    {
        $this->db->select('t.*, u.nama_user AS nama_user, d.NAMA_DEPARTEMEN AS NAMA_DEPARTEMEN,s.STATUS_TIKET AS status ');
        $this->db->from('tiket t');
        $this->db->join('user u', 'u.ID_USER=t.ID_USER');
        $this->db->join('inventory i', 'i.ID_INVENTORY =t.ID_INVENTORY');
        $this->db->join('departemen d', 'd.ID_DEPARTEMEN  =i.ID_DEPARTEMEN');
        $this->db->join('status_tiket s', 's.ID_STATUS =t.STATUS_TIKET');
        $this->db->where('t.TEKNISI', $this->session->userdata('id_user'));
        $this->db->where('t.STATUS_TIKET != 7 AND t.STATUS_TIKET != 1 ');


        return $this->db->get()->result();
    }
    public function tiket_selesai()
    {
        $this->db->select('t.*, u.nama_user AS nama_user, d.NAMA_DEPARTEMEN AS NAMA_DEPARTEMEN,s.STATUS_TIKET AS status ');
        $this->db->from('tiket t');
        $this->db->join('user u', 'u.ID_USER=t.ID_USER');
        $this->db->join('inventory i', 'i.ID_INVENTORY =t.ID_INVENTORY');
        $this->db->join('departemen d', 'd.ID_DEPARTEMEN  =i.ID_DEPARTEMEN');
        $this->db->join('status_tiket s', 's.ID_STATUS =t.STATUS_TIKET');
        $this->db->where('t.TEKNISI', $this->session->userdata('id_user'));
        $this->db->where('t.STATUS_TIKET = 4 OR t.STATUS_TIKET =7');


        return $this->db->get()->result();
    }
    public function daftar_tiket()
    {
        $this->db->select('t.*, u.nama_user AS nama_user, d.NAMA_DEPARTEMEN AS NAMA_DEPARTEMEN,s.STATUS_TIKET AS status ');
        $this->db->from('tiket t');
        $this->db->join('user u', 'u.ID_USER=t.ID_USER');
        $this->db->join('inventory i', 'i.ID_INVENTORY =t.ID_INVENTORY');
        $this->db->join('departemen d', 'd.ID_DEPARTEMEN  =i.ID_DEPARTEMEN');
        $this->db->join('status_tiket s', 's.ID_STATUS =t.STATUS_TIKET');
        $this->db->where('t.STATUS_TIKET = 1 OR t.STATUS_TIKET =6');


        return $this->db->get()->result();
    }
    public function Update($data, $id)
    {
        return $this->db->update('tiket', $data, ['ID_TIKET' => $id]);
    }
    public function insert($data, $table)
    {
        return $this->db->insert($table, $data);
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
    public function teknisi($level = 3)
    {
        return $this->db->where('id_level', $level)->get('user')->result();
    }
    public function Update_selesai($data, $id)
    {
        return $this->db->update('tiket', $data, ['ID_TIKET' => $id]);
    }
}
