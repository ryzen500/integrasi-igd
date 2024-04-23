<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mfilter extends CI_Model {
  public function view_by_date($date){
    $this->db->select('t.*, u.nama_user AS nama_user, d.NAMA_DEPARTEMEN AS NAMA_DEPARTEMEN,s.STATUS_TIKET AS STATUS ');
		$this->db->from('tiket t');
		$this->db->join('user u', 'u.ID_USER=t.ID_USER');
		$this->db->join('inventory i', 'i.ID_INVENTORY =t.ID_INVENTORY');
		$this->db->join('departemen d', 'd.ID_DEPARTEMEN  =i.ID_DEPARTEMEN');
		$this->db->join('status_tiket s', 's.ID_STATUS =t.STATUS_TIKET');
    $this->db->where('t.STATUS_TIKET =7');    
    $this->db->where('DATE(TANGGAL)', $date); // Tambahkan where tanggal nya
    $query = $this->db->get();
		return $query->result();
  }
    
  public function view_by_month($month, $year){
    $this->db->select('t.*, u.nama_user AS nama_user, d.NAMA_DEPARTEMEN AS NAMA_DEPARTEMEN,s.STATUS_TIKET AS STATUS ');
		$this->db->from('tiket t');
		$this->db->join('user u', 'u.ID_USER=t.ID_USER');
		$this->db->join('inventory i', 'i.ID_INVENTORY =t.ID_INVENTORY');
		$this->db->join('departemen d', 'd.ID_DEPARTEMEN  =i.ID_DEPARTEMEN');
		$this->db->join('status_tiket s', 's.ID_STATUS =t.STATUS_TIKET');
    $this->db->where('t.STATUS_TIKET =7');
        $this->db->where('MONTH(TANGGAL)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(TANGGAL)', $year); // Tambahkan where tahun
        
        $query = $this->db->get();
        return $query->result(); // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
  }
    
  public function view_by_year($year){
    $this->db->select('t.*, u.nama_user AS nama_user, d.NAMA_DEPARTEMEN AS NAMA_DEPARTEMEN,s.STATUS_TIKET AS STATUS ');
		$this->db->from('tiket t');
		$this->db->join('user u', 'u.ID_USER=t.ID_USER');
		$this->db->join('inventory i', 'i.ID_INVENTORY =t.ID_INVENTORY');
		$this->db->join('departemen d', 'd.ID_DEPARTEMEN  =i.ID_DEPARTEMEN');
		$this->db->join('status_tiket s', 's.ID_STATUS =t.STATUS_TIKET');
    $this->db->where('t.STATUS_TIKET =7');
        $this->db->where('YEAR(TANGGAL)', $year); // Tambahkan where tahun
        
        $query = $this->db->get();
        return $query->result(); // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
  }
    
  public function view_all(){
    $this->db->select('t.*, u.nama_user AS nama_user, d.NAMA_DEPARTEMEN AS NAMA_DEPARTEMEN,s.STATUS_TIKET AS STATUS ');
		$this->db->from('tiket t');
		$this->db->join('user u', 'u.ID_USER=t.ID_USER');
		$this->db->join('inventory i', 'i.ID_INVENTORY =t.ID_INVENTORY');
		$this->db->join('departemen d', 'd.ID_DEPARTEMEN  =i.ID_DEPARTEMEN');
		$this->db->join('status_tiket s', 's.ID_STATUS =t.STATUS_TIKET');
    $this->db->where('t.STATUS_TIKET =7');
		$query = $this->db->get();
		return $query->result();

  }
    
    public function option_tahun(){
        $this->db->select('YEAR(TANGGAL) AS tahun'); // Ambil Tahun dari field tgl
        $this->db->from('tiket'); // select ke tabel transaksi
        $this->db->order_by('YEAR(TANGGAL)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(TANGGAL)'); // Group berdasarkan tahun pada field tgl
        
        return $this->db->get()->result(); // Ambil data pada tabel transaksi sesuai kondisi diatas
    }
}