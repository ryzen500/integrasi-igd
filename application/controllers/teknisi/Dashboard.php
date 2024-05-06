<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('teknisi/M_riwayattiket', 'mt');
		$this->load->helper('my_helper'); 
		$this->load->model('teknisi/M_Status', 'ms');
		$this->load->model('teknisi/M_dashboard', 'md');
		$this->load->model('teknisi/M_tiket_teknisi', 'mteknisi');
		$this->load->library('form_validation', 'session');
		$this->load->helper('files', 'fungsi');
		belum_login('teknisi/dashboard');
	}

	public function index()
	{
		$data['tiket_masuk'] = $this->md->tiket_masuk();
		$data['diajukan'] = $this->md->diajukan();
		$data['dalam_proses'] = $this->md->dalam_proses();
		$data['sudah_ditangani'] = $this->md->sudah_ditangani();
		$data['tiket_diajukan'] = $this->md->tiket_diajukan();
		$data['tiket_selesai'] = $this->md->tiket_selesai();

		$this->template->load('teknisi/template', 'teknisi/dashboard', $data);
	}
	public function datatiket()
	{
		$data['tiket'] = $this->mteknisi->tiket();
		$this->template->load('teknisi/template', 'teknisi/data_tiket', $data);
	}
	public function tiket_selesai()
	{
		$data['tiket'] = $this->mteknisi->tiket_selesai();
		$this->template->load('teknisi/template', 'teknisi/tiket_selesai', $data);
	}
	public function daftartiket()
	{
		$data['tiket'] = $this->mteknisi->daftar_tiket();
		$this->template->load('teknisi/template', 'teknisi/daftar_tiket', $data);
	}

	public function teknisi()
	{
		$this->template->load('teknisi/template', 'teknisi/dashboard');
	}
	public function tiket_teknisi()
	{
		$tiket['tiket'] = $this->mt->tampil_data();
		$this->template->load('teknisi/template', 'teknisi/tiket_teknisi', $tiket);
	}
	
	public function print()
	{
		$tiket['tiket'] = $this->mt->tampil_data("tiket");
		$this->template->load('teknisi/template', 'teknisi/print_tiket', $tiket);
	}
}
