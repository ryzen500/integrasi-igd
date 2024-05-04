<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Tiket extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('teknisi/M_riwayattiket', 'mt');
        $this->load->model('teknisi/M_Status', 'ms');
        $this->load->model('teknisi/M_dashboard', 'md');
        $this->load->model('teknisi/M_tiket_teknisi', 'mteknisi');
        $this->load->library('form_validation', 'session');
        $this->load->helper('files', 'fungsi');
        belum_login('teknisi/tiket');
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
        redirect('teknisi/dashboard/datatiket');
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
        redirect('teknisi/dashboard/datatiket');
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
        redirect('teknisi/dashboard/datatiket');
    }
    public function tiket_selesai($ID_TIKET)
    {

        $data['teknisi'] = $this->mteknisi->teknisi();
        $data['tiket'] = $this->mteknisi->get($ID_TIKET);
        $this->template->load('teknisi/template', 'teknisi/tiket_diselesaikan', $data);
    }
    public function update()
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


        redirect('teknisi/dashboard/tiket_selesai');
    }
}
