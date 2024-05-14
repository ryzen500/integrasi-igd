<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

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
    }

    public function index()
    {

        $id = $this->session->userdata('id_user');
        // var_dump($this->session->userdata('nama_user'));die;
        $data['user'] = $this->mu->get_profil($id)->row_array();
        $data['title'] = ' Data Saya';
        $data['tiket'] = $this->mu->tiket_user();
        $this->template->load('user/template', 'user/page', $data);
    }


    public function get_detail_masalah() {
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
            $diagnosa_tambahan = $this->input->post('diagnosa_tambahan');
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
            $tindakan_medis = $this->input->post('tindakan_medis');
            $konsultasi_dokter_spesialis = $this->input->post('konsultasi_dokter_spesialis');
            $tindakan_di_igd = $this->input->post('tindakan_di_igd');
            $keterangan = $this->input->post('keterangan');
            $jam_pindah = $this->input->post('jam_pindah');
            $id_user = $this->input->post('id_user');
    
            // Buat array untuk disimpan ke dalam database
            $data = array(
                'no_rekam_medik' => $nomor_rekam_medik,
                'no_pendaftaran'=>$no_pendaftaran,
                'tanggal_jam_pasien_masuk' => $tanggal_mrs,
                'nama_pasien' => $nama_pasien,
                'dokter_jaga_igd'=>$dokter_jaga_igd,
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
			$data['title'] ="Edit Data";
            $data['laporan_rekap'] = $this->mu->track_user($id);
			$this->template->load('user/template','user/edit_tiket',$data);
		}

		public function update(){
			$ID_INVENTORY = $this->input->post('ID_INVENTORY');
			$NAMA_INVENTORY = $this->input->post('NAMA_INVENTORY');
			$ID_DEPARTEMEN = $this->input->post('ID_DEPARTEMEN');
			$STATUS = $this->input->post('STATUS');
			
			$data = [

				'NAMA_INVENTORY' => $NAMA_INVENTORY,
				'ID_DEPARTEMEN' => $ID_DEPARTEMEN,
				'STATUS' => $STATUS			
			];

        $save = $this->mi->update($data, $ID_INVENTORY);
		
		if($save) {
            $this->session->set_flashdata('msg_success', 'Data telah diubah!');
        } else {
            $this->session->set_flashdata('msg_error', 'Data gagal disimpan, silakan isi ulang!');
        }
		
        redirect('admin/Inventory');
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
            'nama_pelapor'=>$nama_pelapor,
            'TANGGAL' => $tanggal
        ];

        $this->mu->update_konfirmasi($data, $ID_TIKET, $data2);
        redirect('user/Dashboard');
    }
}
