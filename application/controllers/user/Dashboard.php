<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
require FCPATH . 'vendor/autoload.php';


class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        belum_login('user/dashboard');
        $this->load->helper('my_helper'); // Load helper global
        $this->load->model('Mlogin', 'ml');
        $this->load->model('user/Mtuser', 'mu');
        $this->load->model('user/MtFile', 'fm');
        $this->load->library('upload');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation', 'session');
        $this->load->helper('files', 'fungsi');
        // $this->load->library('Mpdf_wrapper');
    }



	public function index()
	{
		$data['laporantiket'] = $this->mu->laporan_masuk();
		$data['laporanyangdibuatsaya'] = $this->mu->laporan_saya();
		$data['laporanuser'] = $this->mu->laporanuser();
        $data['laporandokter'] = $this->mu->laporandokter();
        $data['laporan_ppa'] = $this->mu->laporan_ppa();
        $data['pendaftaran_terakhir'] = $this->mu->pendaftaran_terakhir();

        // $data['diajukan'] = $this->md->diajukan();
		// $data['dalam_proses'] = $this->md->dalam_proses();
		// $data['sudah_ditangani'] = $this->md->sudah_ditangani();
		// $data['tiket_diajukan'] = $this->md->tiket_diajukan();
		// $data['tiket_selesai'] = $this->md->tiket_selesai();

		$this->template->load('user/template', 'user/dashboard', $data);
	}
    public function index_per_user()
    {

        $id = $this->session->userdata('id_user');
        // var_dump($this->session->userdata('nama_user'));die;
        $data['user'] = $this->mu->get_profil($id)->row_array();
        $data['title'] = ' Data Saya';
        $data['tiket'] = $this->mu->tiket_user_per_user();
        $this->template->load('user/template', 'user/page', $data);
    }

    public function index_global()
    {

        $id = $this->session->userdata('id_user');
        // var_dump($this->session->userdata('nama_user'));die;
        $data['user'] = $this->mu->get_profil($id)->row_array();
        $data['title'] = ' Data Global';
        $data['tiket'] = $this->mu->tiket_user();
        $this->template->load('user/template', 'user/page', $data);
    }



    public function dataHapus()
    {
        $id = $this->input->post('id');
        // Ambil data dari database berdasarkan ID
        // $data =  $this->db->get_where('laporan_rekap', array('ID_TIKET' => $id))->result();

        $data = $this->db->delete('laporan_rekap', array('id' => $id));


        // echo "<pre>";
        // var_dump($data);die;

        echo json_encode(array(
            'message' => 'success',
            'full_masalah' => $data
        ));
    }


    public function get_detail_masalah()
    {
        $id = $this->input->post('id');
        // Ambil data dari database berdasarkan ID
        $data =  $this->db->get_where('tiket', array('ID_TIKET' => $id))->result();


        // echo "<pre>";
        // var_dump($data);die;

        echo json_encode(array(
            'full_masalah' => $data
        ));
    }



    public function buat_tiket()
    {
        $id = $this->session->userdata('id_user');
        $data['user'] = $this->mu->get_profil($id)->row_array();

        $data['title'] = 'Buat Data';
        // $data['inventory'] = $this->mu->inventory();
        // $data['departemen'] = $this->mu->departemen();
        // $data['departemen_pelapor'] = $this->mu->departemen_pelapor();

        // echo "<pre>"
        // var_dump($data);die;

        $this->template->load('user/template', 'user/buat_tiket', $data);
    }

    // public function buat_tiket_action()
    // {
    //     $this->form_validation->set_rules('masalah', 'Nama Masalah', 'trim|required', ['required' => 'Masalah Wajib Diisi !!!']);
    //     if ($this->form_validation->run() == TRUE) {

    //     $tiket = "T-" . date("Ymd") . rand(999, 111);
    //     $masalah = $this->input->post('masalah');
    //     $SUB_MASALAH = $this->input->post('SUB_MASALAH');
    //     $tanggal = date("Y-m-d H:i:s");
    //     $id_user = $this->input->post('id_user');
    //     $STATUS_TIKET = 1;
    //     $id_inventory = 7;
    //     $datas = array(
    //         'masalah' => $masalah,
    //         'id_user' => $id_user,
    //         'tanggal' => $tanggal,
    //         'id_tiket' => $tiket,
    //         'STATUS_TIKET' => $STATUS_TIKET,
    //         'SUB_MASALAH' => '',
    //         'id_inventory' => $id_inventory
    //     );

    //        // Set the upload path and other configurations
    //        $config['upload_path'] = './uploads/';
    //        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|xlsx';  // Allowed file types
    //     //    $config['max_size'] = 2048;  // Maximum file size in KB
    //      $config['max_size'] = 5120;  // Maximum file size in KB (5 MB)
    //     $this->upload->initialize($config);

    //        $uploaded_files = [];
    //        $upload_errors = [];

    //        if (!empty($_FILES['files']['name'][0])) {
    //            // Loop through each file to upload
    //            foreach ($_FILES['files']['name'] as $key => $file_name) {
    //                $_FILES['file']['name'] = $_FILES['files']['name'][$key];
    //                $_FILES['file']['type'] = $_FILES['files']['type'][$key];
    //                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$key];
    //                $_FILES['file']['error'] = $_FILES['files']['error'][$key];
    //                $_FILES['file']['size'] = $_FILES['files']['size'][$key];

    //                if ($this->upload->do_upload('file')) {
    //                    // Get file upload data
    //                    $upload_data = $this->upload->data();
    //                    $uploaded_files[] = $upload_data;

    //                    // Optional: Save file information to a database
    //                    $this->fm->save_file_info($upload_data);  // Assuming a File_model with a save_file_info method
    //                } else {
    //                    $upload_errors[] = $this->upload->display_errors();
    //                }
    //            }
    //        }

    //        // Pass the result to a view or handle accordingly
    //        $data['uploaded_files'] = $uploaded_files;
    //        $data['upload_errors'] = $upload_errors;
    //     $this->mu->insert($datas, 'tiket');
    //     redirect('user/Dashboard');
    // } else {
    //     $this->buat_tiket();
    // }

    // }

    public function buat_tiket_action()
    {
        // Form validation rules
        $this->form_validation->set_rules('nomor_rekam_medik', 'Nomor Rekam Medik', 'trim|required');
        // Tambahkan aturan validasi sesuai kebutuhan untuk setiap field

        if ($this->form_validation->run() == TRUE) {

            // Ambil data dari $_POST
            $nomor_rekam_medik = $this->input->post('nomor_rekam_medik');
            $no_pendaftaran = $this->input->post('no_pendaftaran');


            $dokter_jaga_igd = $this->input->post('dokter_jaga_igd');
            $tanggal_mrs = $this->input->post('tanggal_mrs');
            $nama_pasien = $this->input->post('nama_pasien');
            $tanggal_lahir_pasien = $this->input->post('tanggal_lahir_pasien');
            $diagnosa_primer = $this->input->post('diagnosa_primer');
            $diagnosa_tambahan = strip_tags(str_replace(["\r", "\n"], "", $this->input->post('diagnosa_tambahan')));
            $diagnosa_sekunder = $this->input->post('diagnosa_sekunder');
            $tekanan_darah = $this->input->post('tekanan_darah');
            $detak_nadi = $this->input->post('detak_nadi');
            $pernafasan = $this->input->post('pernafasan');
            $suhu_tubuh = $this->input->post('suhu_tubuh');
            $tinggi_badan = $this->input->post('tinggi_badan');
            $berat_badan = $this->input->post('berat_badan');
            $GCS = $this->input->post('GCS');
            $LK = $this->input->post('LK');
            $LL = $this->input->post('LL');
            $LD = $this->input->post('LD');
            $keluhan_utama = $this->input->post('keluhan_utama');
            $anamnesis = $this->input->post('anamnesis');
            $riwayat_penyakit_dahulu = $this->input->post('riwayat_penyakit_dahulu');
            $riwayat_alergi_obat = $this->input->post('riwayat_alergi_obat');
            $riwayat_alergi_makanan = $this->input->post('riwayat_alergi_makanan');
            $tindakan_medis = strip_tags(str_replace(["\r", "\n"], "", $this->input->post('konsultasi_dokter_spesialis')));
            $konsultasi_dokter_spesialis =  strip_tags(str_replace(["\r", "\n"], "", $this->input->post('konsultasi_dokter_spesialis')));
            $tindakan_di_igd = strip_tags(str_replace(["\r", "\n"], "", $this->input->post('tindakan_di_igd')));
            $keterangan = strip_tags(str_replace(["\r", "\n"], "", $this->input->post('keterangan')));
            $jam_pindah = $this->input->post('jam_pindah');
            $id_user = $this->input->post('id_user');

            // Buat array untuk disimpan ke dalam database
            $data = array(
                'no_rekam_medik' => $nomor_rekam_medik,
                'no_pendaftaran' => $no_pendaftaran,
                'tanggal_jam_pasien_masuk' => $tanggal_mrs,
                'nama_pasien' => $nama_pasien,
                'dokter_jaga_igd' => $dokter_jaga_igd,
                'tanggal_lahir_pasien' => $tanggal_lahir_pasien,
                'diagnosa_primer' => $diagnosa_primer,
                'diagnosa_tambahan' => $diagnosa_tambahan,
                'diagnosa_sekunder' => $diagnosa_sekunder,
                'tekanan_darah' => $tekanan_darah,
                'detak_nadi' => $detak_nadi,
                'pernafasan' => $pernafasan,
                'suhu_tubuh' => $suhu_tubuh,
                'tinggi_badan' => $tinggi_badan,
                'berat_badan' => $berat_badan,
                'GCS' => $GCS,
                'LK' => $LK,
                'LL' => $LL,
                'LD' => $LD,
                'keluhan_utama' => $keluhan_utama,
                'anamnesis' => $anamnesis,
                'riwayat_penyakit_dahulu' => $riwayat_penyakit_dahulu,
                'riwayat_alergi_obat' => $riwayat_alergi_obat,
                'riwayat_alergi_makanan' => $riwayat_alergi_makanan,
                'tindakan_medis' => $tindakan_medis,
                'konsultasi_dokter_spesialis' => $konsultasi_dokter_spesialis,
                'tindakan_di_igd' => $tindakan_di_igd,
                'keterangan' => $keterangan,
                'jam_pindah' => $jam_pindah,
                'id_user' => $id_user
            );

            // Insert data ke dalam database
            $this->db->insert('laporan_rekap', $data);

            // Redirect setelah berhasil insert data
            redirect('user/Dashboard');
        } else {
            // Jika validasi gagal, kembali ke form pembuatan tiket
            $this->buat_tiket();
        }
    }




    public function profil()
    {
        $id = $this->session->userdata('id_user');
        $data['user'] = $this->mu->get_profil($id)->row_array();
        $data['title'] = 'Profil';
        $this->template->load('user/template', 'user/profil', $data);
    }

    public function form_ubah_profil()
    {
        $id = $this->session->userdata('id_user');
        $data['user'] = $this->mu->get_profil($id)->row_array();
        $data['departemen'] = $this->mu->departemen();
        $data['title'] = 'Ubah Profil';
        $this->template->load('user/template', 'user/form_edit_profil', $data);
    }

    public function ubah_profil()
    {
        $this->form_validation->set_rules('nama_user', 'Nama Lengkap', 'trim|required|min_length[4]|max_length[30]', ['required' => 'Nama Lengkap Harus Diisi Terlebih Dahulu !!!']);
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[8]|max_length[50]', ['required' => 'Email Harus Diisi Terlebih Dahulu !!!']);
        $this->form_validation->set_rules('no_telp', 'Telp', 'trim|required|min_length[11]|max_length[12]', ['required' => 'No. Telepon Harus Diisi Terlebih Dahulu !!!']);

        if ($this->form_validation->run() == TRUE) {
            $id_user = $this->input->post('id_user');
            $id_departemen = $this->input->post('id_departemen');
            $nama_user = $this->input->post('nama_user');
            $email = $this->input->post('email');
            $no_telp = $this->input->post('no_telp');

            $data = array(
                'id_departemen' => $id_departemen,
                'nama_user' => $nama_user,
                'email' => $email,
                'no_telp' => $no_telp,
            );

            $where = array(
                'id_user' => $id_user
            );

            $this->mu->update_profil($where, $data, 'user');
            $this->session->set_userdata('nama_user', $nama_user);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate !!!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('user/Dashboard/profil');
        } else {
            $this->form_ubah_profil();
        }
    }
    public function ubah_password()
    {
        $data['title'] = 'Ubah Kata Sandi';
        $this->template->load('user/template', 'user/ubah_password', $data);
    }
    public function ubah_password_action()
    {
        $id = $this->session->userdata('id_user');
        $data['user'] = $this->mu->get_profil($id)->row_array();
        $this->form_validation->set_rules('password', 'Password Lama', 'trim|required', ['required' => 'Password Lama Wajib Diisi !!!']);
        $this->form_validation->set_rules('password1', 'Password Baru', 'trim|required|min_length[8]', ['required' => 'Password Baru Wajib Diisi !!!']);
        $this->form_validation->set_rules('password2', 'Konfirmasi Password Baru', 'trim|required|min_length[8]|matches[password1]', ['required' => 'Konfirmasi Password Wajib Diisi !!!'], ['matches[password1]' => 'Konfirmasi Masuk Harus Sama!!!']);
        if ($this->form_validation->run() == TRUE) {
            $password_lama = $this->input->post('password');
            $password_baru = $this->input->post('password1');
            if (!password_verify($password_lama, $data['user']['password_user'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Password Tidak Sama Dengan Password Sebelumnya</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('user/Dashboard/ubah_password');
            } else {
                if ($password_lama == $password_baru) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Password Baru Tidak Boleh Sama Dengan Password Lama</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    redirect('user/Dashboard/ubah_password');
                } else {
                    // $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
                    $this->db->set('password_user', $password_hash);
                    $this->db->where('id_user', $this->session->userdata('id_user'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>password Telah Diubah</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>');
                    redirect('user/Dashboard/ubah_password');
                }
            }
        } else {
            $this->ubah_password();
        }
    }


    // Di dalam kontroler Dashboard
    public function download_pdf($id)
    {
        // Load library mPDF

        // Buat instance mPDF
        $mpdf = new \Mpdf\Mpdf();

        $data = '';

        // echo "1";
        // die;
        // Load library mPDF
        // $this->load->library('pdf');

        // Buat instance mPDF
        $mpdf = new \Mpdf\Mpdf();
        // Buat tabel HTML berdasarkan data yang diambil

        // Ambil data dari objek track_users
        $track_userss =  $this->mu->track_user($id); // Sesuaikan dengan model Anda


        $ket = 'Laporan Tanggal Pendaftaran  ' . date("Y-m-d", strtotime($track_userss[0]->tanggal_jam_pasien_masuk));

        foreach ($track_userss as $key => $track_users) {

            $data = '
            <div class="header">
    <table width="100%" class="headers table-header">
        <tr>
            <td width="20%" align="center" valign="middle">
                <div align="center">
                    <img src="' . base_url('assets/back/img/logo-back-preview.png') . '" class="image_report" style="float:left; max-width: 100px; width:100px;" class="image_report">
                </div>
            </td>
            <td width="64%" align="center" style="text-align:center;">
                <div align="center" class="nama_profil" style="color: black !important; ">
                    <p style="text-align:center"><span style="font-size:11px">YAYASAN PELAYANAN KESEHATAN BALA KESELAMATAN (YPKBK)</span></p>
                    <p style="text-align:center"><span style="font-size:24px"><strong>RUMAH SAKIT "WILLIAM BOOTH"</strong></span><br />
                        <span style="font-size:10px">Jl. Diponegoro No. 34 Surabaya 60241, Telp. 031-5678917, Fax: 031-5624868&nbsp;<br />
                        NPWP : 31.650.899.3-423.000</span>
                    </p>
                </div>
            </td>
            <td width="20%" align="center" valign="middle">
                <div align="center">
                    <img src="' . base_url('assets/back/img/logo-right.png') . '" class="image_report" style="float:left; max-width: 100px; width:100px;" class="image_report">
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="border-top: 1px solid black;"></td>
        </tr>
        <tr>
            <td align="center" valign="middle" class="judul-laporan-td" colspan="3">
                <div align="center">
                    <h3 style="color:black"><b>' . $ket . '</b></h3>
                </div>
            </td>
        </tr>
        <tr>
            <td align="center" valign="middle" class="" colspan="3">
                <div align="center">
                    <font color="black"></font>
                </div>
            </td>
        </tr>
    </table>
</div>
 <table>
     <tr>
         <td style="width: 200px; padding-top: 7px;">
             <label for="file" style="text-align: center;">Nomor Rekam Medik</label>
         </td>
         <td style="width: 500px; padding-left:8px;">
             ' . $track_users->no_rekam_medik . '
         </td>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Tanggal MRS</label>
         </td>
         <td style="width: 200px; padding-left:8px;">
             ' . date("Y-m-d", strtotime($track_users->tanggal_jam_pasien_masuk)) . '
         </td>
     </tr>
     <tr>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Nama Pasien</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->nama_pasien . '
         </td>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Dokter Jaga IGD</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->dokter_jaga_igd . '
         </td>
     </tr>
     <tr>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Diagnosa</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->diagnosa_primer . '
         </td>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Diagnosa Tambahan</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->diagnosa_tambahan . '
         </td>
     </tr>
     <tr>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Diagnosa Sekunder</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->diagnosa_sekunder . '
         </td>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Tekanan Darah</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->tekanan_darah . '
         </td>
     </tr>
     <tr>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Detak Nadi</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->detak_nadi . '
         </td>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Pernafasan</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->pernafasan . '
         </td>
     </tr>
     <tr>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Suhu Tubuh</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->suhu_tubuh . '
         </td>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Tinggi Badan</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->tinggi_badan . '
         </td>
     </tr>
     <tr>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Berat Badan</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->berat_badan . '
         </td>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">GCS</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->GCS . '
         </td>
     </tr>
     <tr>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Lingkar Kepala (LK)</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->LK . '
         </td>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Lingkar Lengan (LL)</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->LL . '
         </td>
     </tr>
     <tr>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Lingkar Dada (LD)</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->LD . '
         </td>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Keluhan Utama</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->keluhan_utama . '
         </td>
     </tr>
     <tr>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Anamnesis</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->anamnesis . '
         </td>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Riwayat Penyakit Dahulu</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->riwayatpenyakit_terdahulu . '
         </td>
     </tr>
     <tr>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Riwayat Alergi Obat</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->riwayat_alergi_obat . '
         </td>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Riwayat Alergi Makanan</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->riwayat_alergi_makanan . '
         </td>
     </tr>
     <tr>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Tindakan Medis</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->tindakan_medis . '
         </td>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Konsultasi Dokter Spesialis</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->konsultasi_dokter_spesialis . '
         </td>
     </tr>
     
     
     
     <tr>
     <td style="width: 100px;height:100px; padding-top: 7px;">
       <label for="file">Tindakan Di IGD</label>
     <td style="width: 200px;" style="padding-bottom:5px">
            ' . $track_users->tindakan_di_igd . '
     </td>
     </td>
     <td style="width: 100px;padding-top: 7px;">
       <label for="file"></label>
     <td style="width: 200px;" style="padding-bottom:5px">
       
     </td>
     </td>
   </tr>

   
   <tr>
   <td style="width: 100px;height:100px; padding-top: 7px;">
     <label for="file">Keterangan</label>
   <td style="width: 200px;" style="padding-bottom:5px">
         ' .  $track_users->keterangan . '
   </td>
   </td>
   <td style="width: 100px;padding-top: 7px;">
     <label for="file"></label>
   <td style="width: 200px;" style="padding-bottom:5px">

   </td>
   </td>
 </tr>


 <tr>
 <td style="width: 100px;height:100px; padding-top: 7px;">
   <label for="file">Jam Pindah</label>
 <td style="width: 200px;" style="padding-bottom:5px">
    ' . $track_users->jam_pindah . '
 </td>
 </td>
 <td style="width: 100px;padding-top: 7px;">
   <label for="file"></label>
 <td style="width: 200px;" style="padding-bottom:5px">
   
 </td>
 </td>
</tr>
</tr>
</table>
     ';
            # code...
        }


        // Tulis konten ke PDF
        $mpdf->WriteHTML($data);

        $namaFile = $track_userss[0]->no_pendaftaran . ' - ' . $track_userss[0]->no_rekam_medik;

        // Keluarkan PDF sebagai unduhan
        $mpdf->Output($namaFile . '.pdf', 'D');
    }

    public function print_preview($id)
    {
        $data = '';

        // echo "1";
        // die;
        // Load library mPDF
        // $this->load->library('pdf');

        // Buat instance mPDF
        $mpdf = new \Mpdf\Mpdf();
        // Buat tabel HTML berdasarkan data yang diambil

        // Ambil data dari objek track_users
        $track_userss =  $this->mu->track_user($id); // Sesuaikan dengan model Anda


        $ket = 'Laporan Tanggal Pendaftaran  ' . date("Y-m-d", strtotime($track_userss[0]->tanggal_jam_pasien_masuk));

        foreach ($track_userss as $key => $track_users) {

            $data = '
            <div class="header">
    <table width="100%" class="headers table-header">
        <tr>
            <td width="20%" align="center" valign="middle">
                <div align="center">
                    <img src="' . base_url('assets/back/img/logo-back-preview.png') . '" class="image_report" style="float:left; max-width: 100px; width:100px;" class="image_report">
                </div>
            </td>
            <td width="64%" align="center" style="text-align:center;">
                <div align="center" class="nama_profil" style="color: black !important; ">
                    <p style="text-align:center"><span style="font-size:11px">YAYASAN PELAYANAN KESEHATAN BALA KESELAMATAN (YPKBK)</span></p>
                    <p style="text-align:center"><span style="font-size:24px"><strong>RUMAH SAKIT "WILLIAM BOOTH"</strong></span><br />
                        <span style="font-size:10px">Jl. Diponegoro No. 34 Surabaya 60241, Telp. 031-5678917, Fax: 031-5624868&nbsp;<br />
                        NPWP : 31.650.899.3-423.000</span>
                    </p>
                </div>
            </td>
            <td width="20%" align="center" valign="middle">
                <div align="center">
                    <img src="' . base_url('assets/back/img/logo-right.png') . '" class="image_report" style="float:left; max-width: 100px; width:100px;" class="image_report">
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="border-top: 1px solid black;"></td>
        </tr>
        <tr>
            <td align="center" valign="middle" class="judul-laporan-td" colspan="3">
                <div align="center">
                    <h3 style="color:black"><b>' . $ket . '</b></h3>
                </div>
            </td>
        </tr>
        <tr>
            <td align="center" valign="middle" class="" colspan="3">
                <div align="center">
                    <font color="black"></font>
                </div>
            </td>
        </tr>
    </table>
</div>
 <table>
     <tr>
         <td style="width: 200px; padding-top: 7px;">
             <label for="file" style="text-align: center;">Nomor Rekam Medik</label>
         </td>
         <td style="width: 500px; padding-left:8px;">
             ' . $track_users->no_rekam_medik . '
         </td>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Tanggal MRS</label>
         </td>
         <td style="width: 200px; padding-left:8px;">
             ' . date("Y-m-d", strtotime($track_users->tanggal_jam_pasien_masuk)) . '
         </td>
     </tr>
     <tr>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Nama Pasien</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->nama_pasien . '
         </td>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Dokter Jaga IGD</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->dokter_jaga_igd . '
         </td>
     </tr>
     <tr>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Diagnosa</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->diagnosa_primer . '
         </td>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Diagnosa Tambahan</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->diagnosa_tambahan . '
         </td>
     </tr>
     <tr>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Diagnosa Sekunder</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->diagnosa_sekunder . '
         </td>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Tekanan Darah</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->tekanan_darah . '
         </td>
     </tr>
     <tr>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Detak Nadi</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->detak_nadi . '
         </td>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Pernafasan</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->pernafasan . '
         </td>
     </tr>
     <tr>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Suhu Tubuh</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->suhu_tubuh . '
         </td>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Tinggi Badan</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->tinggi_badan . '
         </td>
     </tr>
     <tr>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Berat Badan</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->berat_badan . '
         </td>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">GCS</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->GCS . '
         </td>
     </tr>
     <tr>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Lingkar Kepala (LK)</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->LK . '
         </td>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Lingkar Lengan (LL)</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->LL . '
         </td>
     </tr>
     <tr>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Lingkar Dada (LD)</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->LD . '
         </td>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Keluhan Utama</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->keluhan_utama . '
         </td>
     </tr>
     <tr>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Anamnesis</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->anamnesis . '
         </td>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Riwayat Penyakit Dahulu</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->riwayatpenyakit_terdahulu . '
         </td>
     </tr>
     <tr>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Riwayat Alergi Obat</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->riwayat_alergi_obat . '
         </td>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Riwayat Alergi Makanan</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->riwayat_alergi_makanan . '
         </td>
     </tr>
     <tr>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Tindakan Medis</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->tindakan_medis . '
         </td>
         <td style="width: 100px;padding-top: 7px;">
             <label for="file">Konsultasi Dokter Spesialis</label>
         </td>
         <td style="width: 200px;padding-left:8px;">
             ' . $track_users->konsultasi_dokter_spesialis . '
         </td>
     </tr>
     
     
     
     <tr>
     <td style="width: 100px;height:100px; padding-top: 7px;">
       <label for="file">Tindakan Di IGD</label>
     <td style="width: 200px;" style="padding-bottom:5px">
            ' . $track_users->tindakan_di_igd . '
     </td>
     </td>
     <td style="width: 100px;padding-top: 7px;">
       <label for="file"></label>
     <td style="width: 200px;" style="padding-bottom:5px">
       
     </td>
     </td>
   </tr>

   
   <tr>
   <td style="width: 100px;height:100px; padding-top: 7px;">
     <label for="file">Keterangan</label>
   <td style="width: 200px;" style="padding-bottom:5px">
         ' .  $track_users->keterangan . '
   </td>
   </td>
   <td style="width: 100px;padding-top: 7px;">
     <label for="file"></label>
   <td style="width: 200px;" style="padding-bottom:5px">

   </td>
   </td>
 </tr>


 <tr>
 <td style="width: 100px;height:100px; padding-top: 7px;">
   <label for="file">Jam Pindah</label>
 <td style="width: 200px;" style="padding-bottom:5px">
    ' . $track_users->jam_pindah . '
 </td>
 </td>
 <td style="width: 100px;padding-top: 7px;">
   <label for="file"></label>
 <td style="width: 200px;" style="padding-bottom:5px">
   
 </td>
 </td>
</tr>
</tr>
</table>
     ';
            # code...
        }

        // Tulis konten ke PDF
        $mpdf->WriteHTML($data);

        // Tampilkan preview PDF
        $mpdf->Output();
    }

    public function track($id)
    {
        $data['title'] = 'Detail';
        $data['track'] = $this->mu->track($id);
        $data['track_user'] = $this->mu->track_user($id);
        $this->template->load('user/template', 'user/track', $data);
    }

    public function edit($id)
    {
        // $data['departemen'] = $this->mde->getAll();
        $data['title'] = "Edit Data";
        $data['laporan_rekap'] = $this->mu->track_user($id);
        $this->template->load('user/template', 'user/edit_tiket', $data);
    }

    public function edit_tiket_action()
    {

        function stripSpecificTags($text, $allowedTags = '<b><i><u><span><strong><em>')
        {
            return strip_tags($text, $allowedTags);
        }


        // Form validation rules
        //   $this->form_validation->set_rules('nomor_rekam_medik', 'Nomor Rekam Medik', 'trim|required');
        // Tambahkan aturan validasi sesuai kebutuhan untuk setiap field

        //   var_dump($this->form_validation->run());die;
        if (!empty($_POST)) {

            // Ambil data dari $_POST

            // echo "<pre>";
            // var_dump($_POST);die;
            $nomor_rekam_medik = $this->input->post('nomor_rekam_medik');
            $no_pendaftaran = $this->input->post('no_pendaftaran');
            $id = $this->input->post('id');

            $dokter_jaga_igd = $this->input->post('dokter_jaga_igd');
            $tanggal_mrs = $this->input->post('tanggal_mrs');
            $nama_pasien = $this->input->post('nama_pasien');
            $tanggal_lahir_pasien = $this->input->post('tanggal_lahir_pasien');
            $diagnosa_primer = $this->input->post('diagnosa_primer');
            $diagnosa_tambahan = strip_tags(str_replace(["\r", "\n"], "", $this->input->post('diagnosa_tambahan')));
            $diagnosa_sekunder = $this->input->post('diagnosa_sekunder');
            $tekanan_darah = $this->input->post('tekanan_darah');
            $detak_nadi = $this->input->post('detak_nadi');
            $pernafasan = $this->input->post('pernafasan');
            $suhu_tubuh = $this->input->post('suhu_tubuh');
            $tinggi_badan = $this->input->post('tinggi_badan');
            $berat_badan = $this->input->post('berat_badan');
            $GCS = $this->input->post('GCS');
            $LK = $this->input->post('LK');
            $LL = $this->input->post('LL');
            $LD = $this->input->post('LD');
            $keluhan_utama = $this->input->post('keluhan_utama');
            $anamnesis = $this->input->post('anamnesis');
            $riwayat_penyakit_dahulu = $this->input->post('riwayat_penyakit_dahulu');
            $riwayat_alergi_obat = $this->input->post('riwayat_alergi_obat');
            $riwayat_alergi_makanan = $this->input->post('riwayat_alergi_makanan');
            $tindakan_medis = strip_tags(str_replace(["\r", "\n"], "", $this->input->post('konsultasi_dokter_spesialis')));
            $konsultasi_dokter_spesialis =  strip_tags(str_replace(["\r", "\n"], "", $this->input->post('konsultasi_dokter_spesialis')));
            $tindakan_di_igd = strip_tags(str_replace(["\r", "\n"], "", $this->input->post('tindakan_di_igd')));
            $keterangan = strip_tags(str_replace(["\r", "\n"], "", $this->input->post('keterangan')));
            $jam_pindah = $this->input->post('jam_pindah');
            $id_user = $this->input->post('id_user');

            // Buat array untuk disimpan ke dalam database
            $data = array(
                'no_pendaftaran' => $no_pendaftaran,
                'tanggal_jam_pasien_masuk' => $tanggal_mrs,
                'diagnosa_primer' => $diagnosa_primer,
                'diagnosa_tambahan' => $diagnosa_tambahan,
                'diagnosa_sekunder' => $diagnosa_sekunder,
                'tekanan_darah' => $tekanan_darah,
                'detak_nadi' => $detak_nadi,
                'pernafasan' => $pernafasan,
                'suhu_tubuh' => $suhu_tubuh,
                'tinggi_badan' => $tinggi_badan,
                'berat_badan' => $berat_badan,
                'GCS' => $GCS,
                'LK' => $LK,
                'LL' => $LL,
                'LD' => $LD,
                'keluhan_utama' => $keluhan_utama,
                'anamnesis' => $anamnesis,
                'riwayat_penyakit_dahulu' => $riwayat_penyakit_dahulu,
                'riwayat_alergi_obat' => $riwayat_alergi_obat,
                'riwayat_alergi_makanan' => $riwayat_alergi_makanan,
                'tindakan_medis' => $tindakan_medis,
                'konsultasi_dokter_spesialis' => $konsultasi_dokter_spesialis,
                'tindakan_di_igd' => $tindakan_di_igd,
                'keterangan' => $keterangan,
                'jam_pindah' => $jam_pindah,
                'id_user' => $id_user
            );

            // Insert data ke dalam database
            //   $this->db->insert('laporan_rekap', $data);
            $save = $this->mu->update($data, $id);

            if ($save) {
                # code...
                $this->session->set_flashdata('msg_success', 'Data telah diubah!');
                redirect('user/Dashboard');
            } else {
                echo "Gagal";
                die;
            }
            // Redirect setelah berhasil insert data
        } else {
            // Jika validasi gagal, kembali ke form pembuatan tiket
            // $this->buat_tiket();
            $this->session->set_flashdata('msg_error', 'Data gagal disimpan, silakan isi ulang!');
        }
    }

    // public function track($id)
    // {
    //     $data['title'] = 'Detail';
    //     $data['track'] = $this->mu->track($id);
    //     $data['track_user'] = $this->mu->track_user($id);
    //     $this->template->load('user/template', 'user/track', $data);
    // }


    public function konfirmasi($ID_TIKET)
    {
        $STATUS_TIKET = 7;
        $TEKNISI = $this->session->userdata('id_user');
        $tanggal = date("Y-m-d H:i:s");

        $nama_pelapor = $this->input->post('nama_pelapor');

        // echo "<pre>";
        // var_dump($nama_pelapor);die;
        $data = [
            'STATUS_TIKET' => $STATUS_TIKET,
        ];
        $data2 = [
            'ID_TIKET' => $ID_TIKET,
            'ID_STATUS' => $STATUS_TIKET,
            'ID_TEKNISI' => $TEKNISI,
            'nama_pelapor' => $nama_pelapor,
            'TANGGAL' => $tanggal
        ];

        $this->mu->update_konfirmasi($data, $ID_TIKET, $data2);
        redirect('user/Dashboard');
    }
}
