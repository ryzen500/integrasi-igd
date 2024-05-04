<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        belum_login('admin/dashboard');
        $this->load->model('admin/Mdata', 'md');
        $this->load->model('admin/Mpengguna', 'mp');
        $this->load->model('admin/Minv', 'mi');
        $this->load->model('admin/Mlaptiket', 'ml');
        $this->load->model('admin/Mdash', 'mda');
        $this->load->model('admin/M_tiket_teknisi', 'mteknisi');

        $this->load->model('teknisi/M_dashboard', 'md');
        $this->load->helper('files', 'fungsi');
    }

    public function index()
    {
        $data['count_total'] = $this->mda->get_count();
        $data['count_diajukan'] = $this->mda->get_diajukan();
        $data['count_dalamproses'] = $this->mda->get_dalamproses();
        $data['count_selesai'] = $this->mda->get_selesai();
        $data['tiket_diajukan'] = $this->mda->tiket_diajukan();
        $data['tiket_selesai'] = $this->mda->tiket_selesai();
        $data['chart'] = $this->mda->get_tiket_detail();
        $year= date('Y');
        $status= 7;

        $data['chart_tiket'] = $this->ml->get_ticket_statistics_by_year_and_status($year,$status);

        $data['chart_teknisi'] = $this->mda->get_chart_teknisi();
        $data['data_perbaikan'] = $this->mda->dataperbaikan();
        $data['requestPerMenit'] = $this->mda->requestPermenit();

        $this->template->load('admin/template', 'admin/dashboard', $data);
    }


    public function get_files() {
        $tiket_id = $this->input->post('id');
    
        // Query untuk mendapatkan daftar file dari database
        $file_list = $this->db->get_where('uploaded_files', array('ID_TIKET' => $tiket_id))->result();
    
        if ($file_list) {
            echo json_encode($file_list); // Kembalikan daftar file dalam format JSON
        } else {
            echo json_encode([]); // Kembalikan daftar kosong jika tidak ada file
        }
    }

    public function get_tiket_by_day($date) {
        // Validasi tanggal
        if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $date)) {
            // Jika format tanggal salah, kembalikan error
            echo json_encode(['error' => 'Invalid date format']);
            return;
        }

        // Dapatkan data tiket berdasarkan tanggal
        $data = $this->mda->get_tiket_by_day($date);

        // Kembalikan data dalam format JSON
        echo json_encode($data);
    }

    function departemen()
    {
        $data["user"] = $this->M->getTable();
        $this->template->load('admin/template', 'admin/departemen', $data);
    }

    public function datatiket()
	{
		$data['tiket'] = $this->mteknisi->tiket();
		$this->template->load('admin/template', 'admin/data_tikets', $data);
	}
	public function tiket_selesai()
	{
		$data['tiket'] = $this->mteknisi->tiket_selesai();
		$this->template->load('admin/template', 'admin/tiket_selesais', $data);
	}
	public function daftartiket()
	{
		$data['tiket'] = $this->mteknisi->daftar_tiket();
		$this->template->load('admin/template', 'admin/daftar_tikets', $data);
	}

    function inventory()
    {
        $data["user"] = $this->mi->getTable();
        $this->template->load('admin/template', 'admin/inventory', $data);
    }

    function laporan_tiket()
    {
        $data["tiket"] = $this->ml->getTable();
        $this->template->load('admin/template', 'admin/laporan_tiket', $data);
    }


    function edit_pengguna()
    {
        $this->template->load('admin/template', 'admin/edit_pengguna');
    }

    function tambah_inventory()
    {
        $this->template->load('admin/template', 'admin/tambah_inventory');
    }
}
