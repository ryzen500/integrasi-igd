<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tiket extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		belum_login('admin/tiket');
		$this->load->model("admin/Mlaptiket", 'ml');
		$this->load->model('admin/Mtiket', 'mt');
		$this->load->model('admin/Mfilter', 'mf');
		$this->load->model('admin/MSubmasalah', 'ms');
		$this->load->model('admin/M_tiket_teknisi', 'mteknisi');
		$this->load->helper('files', 'fungsi');
	}
	public function index()
	{
		$data["tiket"] = $this->ml->getTable();
		$data["transaksi"] = $this->mf->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel

		$this->template->load('admin/template', 'admin/laporan_tiket', $data);
	}
	public function l_tiket_selesai()
	{
		if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Laporan Tiket Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'transaksi/cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi = $this->mf->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Laporan Tiket Tahun '.$tahun;
                $url_cetak = 'transaksi/cetak?filter=3&tahun='.$tahun;
                $transaksi = $this->mf->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Laporan Tiket';
            $url_cetak = 'transaksi/cetak';
            $transaksi = $this->mf->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }
        
    $data['ket'] = $ket;
    $data['url_cetak'] = base_url('index.php/'.$url_cetak);
    $data['transaksi'] = $transaksi;
        $data['option_tahun'] = $this->mf->option_tahun();
		$data["tiket"] = $this->ml->getTable_selesai();
		$this->template->load('admin/template', 'admin/laporan_tiket_selesai', $data);
	}


	public function updates()
    {
        $ID_TIKET = $this->input->post('ID_TIKET');
        $TEKNISI = $this->session->userdata('id_user');
        $SOLUSI = $this->input->post('SOLUSI');
        $SUB_MASALAH = $this->input->post('SUB_MASALAH');

		$tanggal = date("Y-m-d H:i:s");

        $STATUS_TIKET = 4;
		$data = [
            'STATUS_TIKET' => $STATUS_TIKET,
            'SOLUSI' => $SOLUSI,
            'TEKNISI' => $TEKNISI,
            'SUB_MASALAH'=> $SUB_MASALAH
        ];
        $tiket_detail = array(
            'ID_TIKET' => $ID_TIKET,
            'TANGGAL' => $tanggal,
            'ID_TEKNISI' => $TEKNISI,
            'ID_STATUS' => $STATUS_TIKET
        );
        $this->mteknisi->insert($tiket_detail, 'tiket_detail');
        $this->mteknisi->Update_selesai($data, $ID_TIKET);


        redirect('admin/dashboard/tiket_selesai');
    }
	public function tiket_selesai($ID_TIKET)
    {

        $data['teknisi'] = $this->mteknisi->teknisi();
        $data['tiket'] = $this->mteknisi->get($ID_TIKET);
        // $data['penyebab'] = $this->ms->getTables($data['tiket']->SUB_MASALAH);
        $data['penyebab'] = $this->ms->getTable();

        // echo "<pre>";
        // var_dump();
        // die;

        $this->template->load('admin/template', 'admin/tiket_diselesaikan', $data);
    }


	public function ambil_tiket($ID_TIKET)
    {
        $STATUS_TIKET = 2;
        $TEKNISI = $this->session->userdata('id_user');
        $tanggal = date("Y-m-d H:i:s");
        $data = [
            'STATUS_TIKET' => $STATUS_TIKET,
            'TEKNISI' => $TEKNISI
        ];
        $tiket_detail = array(
            'ID_TIKET' => $ID_TIKET,
            'TANGGAL' => $tanggal,
            'ID_TEKNISI' => $TEKNISI,
            'ID_STATUS' => $STATUS_TIKET
        );
        $this->mteknisi->update($data, $ID_TIKET);
        $this->mteknisi->insert($tiket_detail, 'tiket_detail');
        redirect('admin/dashboard/datatiket');
    }

	public function prosess($ID_TIKET)
    {
        $STATUS_TIKET = 3;
        $TEKNISI = $this->session->userdata('id_user');
        $tanggal = date("Y-m-d H:i:s");
        $data = [
            'STATUS_TIKET' => $STATUS_TIKET
        ];
        $tiket_detail = array(
            'ID_TIKET' => $ID_TIKET,
            'TANGGAL' => $tanggal,
            'ID_TEKNISI' => $TEKNISI,
            'ID_STATUS' => $STATUS_TIKET
        );
        $this->mteknisi->update($data, $ID_TIKET);
        $this->mteknisi->insert($tiket_detail, 'tiket_detail');
        redirect('admin/dashboard/datatiket');
    }
	public function daftar_tiket()
	{
		$data["tiket"] = $this->ml->daftar_tiket();
		$this->template->load('admin/template', 'admin/daftar_tiket', $data);
	}
	public function edit($ID_TIKET)
	{
		$data['teknisi'] = $this->mt->teknisi();
		$data['tiket'] = $this->ml->get($ID_TIKET);
		$this->template->load('admin/template', 'admin/data_tiket', $data);
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

	public function update()
	{
		$ID_TIKET = $this->input->post('ID_TIKET');
		$TEKNISI = $this->input->post('TEKNISI');

		$data = [
			'TEKNISI' => $TEKNISI
		];

		$this->ml->update($data, $ID_TIKET);
		redirect('admin/Tiket/daftar_tiket');
	}

    public function ganti_teknisi($ID_TIKET)
    {
        $STATUS_TIKET = 6;
        $TEKNISI = $this->session->userdata('id_user');
        $tanggal = date("Y-m-d H:i:s");
        $data = [
            'STATUS_TIKET' => $STATUS_TIKET
        ];
        $tiket_detail = array(
            'ID_TIKET' => $ID_TIKET,
            'TANGGAL' => $tanggal,
            'ID_TEKNISI' => $TEKNISI,
            'ID_STATUS' => $STATUS_TIKET
        );
        $this->mteknisi->update($data, $ID_TIKET);
        $this->mteknisi->insert($tiket_detail, 'tiket_detail');
        redirect('admin/dashboard/datatiket');
    }

	public function print()
	{
		if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Laporan Tiket Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'transaksi/cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi = $this->mf->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Laporan Tiket Tahun '.$tahun;
                $url_cetak = 'transaksi/cetak?filter=3&tahun='.$tahun;
                $transaksi = $this->mf->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Laporan Data Tiket';
            $url_cetak = 'transaksi/cetak';
            $transaksi = $this->mf->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }
        
    $data['ket'] = $ket;
    $data['url_cetak'] = base_url('index.php/'.$url_cetak);
    $data['transaksi'] = $transaksi;
        $data['option_tahun'] = $this->mf->option_tahun();
		$data["tiket"] = $this->ml->getTable();
		$this->load->view('admin/print_tiket', $data);
	}
}
