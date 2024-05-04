<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mdash extends CI_Model
{
    public function get_count()
    {
        $sql = "SELECT count(ID_TIKET) as id_tiket FROM tiket";
        $result = $this->db->query($sql);
        return $result->row()->id_tiket;
    }
    public function get_diajukan()
    {
        $sql = "SELECT count(STATUS_TIKET) as status_tiket FROM tiket where status_tiket = 1 ";
        $result = $this->db->query($sql);
        return $result->row()->status_tiket;
    }
    public function get_dalamproses()
    {
        $sql = "SELECT count(STATUS_TIKET) as status_tiket FROM tiket where status_tiket = 2 OR status_tiket = 3 OR status_tiket = 5 OR status_tiket = 6 ";
        $result = $this->db->query($sql);
        return $result->row()->status_tiket;
    }
    public function get_selesai()
    {
        $sql = "SELECT count(STATUS_TIKET) as status_tiket FROM tiket where status_tiket = 4 OR status_tiket = 7 ";
        $result = $this->db->query($sql);
        return $result->row()->status_tiket;
    }
    public function tiket_diajukan()
    {
        $this->db->select('t.*, u.nama_user AS nama_user, d.NAMA_DEPARTEMEN AS NAMA_DEPARTEMEN, s.STATUS_TIKET AS status');
        $this->db->from('tiket t');
        $this->db->join('user u', 'u.ID_USER=t.ID_USER');
        $this->db->join('inventory i', 'i.ID_INVENTORY =t.ID_INVENTORY');
        $this->db->join('departemen d', 'd.ID_DEPARTEMEN  =i.ID_DEPARTEMEN ');
        $this->db->join('status_tiket s', 's.ID_STATUS  = t.STATUS_TIKET ');
        // // $this->db->where('t.ID_TIKET', 30052008190);
        $this->db->where('t.STATUS_TIKET = 1 OR t.STATUS_TIKET = 6');
        $this->db->order_by('t.TANGGAL', 'DESC');
        $this->db->limit(3);

        return $this->db->get()->result();
    }
    public function tiket_selesai()
    {

        $this->db->select('t.*, u.nama_user AS nama_user, d.NAMA_DEPARTEMEN AS NAMA_DEPARTEMEN');
        $this->db->from('tiket t');
        $this->db->join('user u', 'u.ID_USER=t.ID_USER');
        $this->db->join('inventory i', 'i.ID_INVENTORY =t.ID_INVENTORY');
        $this->db->join('departemen d', 'd.ID_DEPARTEMEN  =i.ID_DEPARTEMEN ');
        // // $this->db->where('t.ID_TIKET', 30052008190);
        $this->db->where('t.STATUS_TIKET = 4 OR t.STATUS_TIKET = 7');
        $this->db->order_by('t.TANGGAL', 'DESC');
        $this->db->limit(3);



        return $this->db->get()->result();
    }
    public function get_tiket_detail()
    {
        return $this->db->get('tiket_detail')->result();
    }
    public function get_chart_teknisi()
    {
        $this->db->select('COUNT(*) as total, u.nama_user AS nama_teknisi,t.TEKNISI AS ID_TEKNISI');
        $this->db->from('tiket t');
        $this->db->join('user u', 'u.ID_USER=t.TEKNISI');
        $this->db->where('t.STATUS_TIKET = 7');

        $this->db->group_by('t.TEKNISI');

        return $this->db->get()->result();
    }

    public function get_tiket_by_day($tanggal) {
        // Query untuk mengambil data berdasarkan tanggal yang diberikan
        $this->db->select("DATE(t.TANGGAL) AS tanggal, HOUR(t.TANGGAL) AS jam, MINUTE(t.TANGGAL) AS menit, COUNT(*) AS jumlah_tiket");
        $this->db->from("tiket t");
        $this->db->where("DATE(t.TANGGAL)", $tanggal);
        $this->db->group_by("HOUR(t.TANGGAL), MINUTE(t.TANGGAL)");
        return $this->db->get()->result();
    }

    public function requestPermenit(){
        $this->db->select("t.TANGGAL AS tanggal, 
        HOUR(t.TANGGAL) AS jam, 
        MINUTE(t.TANGGAL) AS menit,
        COUNT(*) AS jumlah_tiket");
        $this->db->from("tiket t");
        $this->db->where("DATE(t.TANGGAL) = '".date("Y-m-d")."'" );
        $this->db->group_by('t.tanggal, 
        jam, 
        menit');
        $this->db->order_by('t.tanggal, 
        jam, 
        menit');

        return $this->db->get()->result();

    }
    public function dataperbaikan()
    {
        $this->db->select('COUNT(*) as total,MONTH(TANGGAL) AS bulan,YEAR(TANGGAL) AS tahun,  MONTHNAME(TANGGAL) AS nama_bulan');
        $this->db->from('tiket_detail td');
        $this->db->where('YEAR(td.TANGGAL) = 2024');
        $this->db->where('ID_STATUS = 7');

        $this->db->group_by(' YEAR(TANGGAL), MONTH(TANGGAL), MONTHNAME(TANGGAL)');

        return $this->db->get()->result();
    }
}
