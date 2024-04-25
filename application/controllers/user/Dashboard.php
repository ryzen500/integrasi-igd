<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        belum_login('user/dashboard');
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
        $data['user'] = $this->mu->get_profil($id)->row_array();
        $data['title'] = ' Tiket Saya';
        $data['tiket'] = $this->mu->tiket();
        $this->template->load('user/template', 'user/page', $data);
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
    
    public function buat_tiket()
    {
        $id = $this->session->userdata('id_user');
        $data['user'] = $this->mu->get_profil($id)->row_array();
        $data['title'] = 'Buat Tiket';
        $data['inventory'] = $this->mu->inventory();
        $data['departemen'] = $this->mu->departemen();

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
        $this->form_validation->set_rules('masalah', 'Nama Masalah', 'trim|required', ['required' => 'Masalah Wajib Diisi !!!']);
        if ($this->form_validation->run() == TRUE) {

            // Generate a unique id_tiket
            $tiket = "T-" . date("Ymd") . rand(999, 111);
            $masalah = $this->input->post('masalah');
            $tanggal = date("Y-m-d H:i:s");
            $id_user = $this->input->post('id_user');
            $STATUS_TIKET = 1;
            $id_inventory = $this->input->post('id_inventory');;
            $nama_pelapor = $this->input->post('nama_pelapor');

            // Create the data array for the "tiket" table
            $datas = array(
                'masalah' => $masalah,
                'id_user' => $id_user,
                'tanggal' => $tanggal,
                'id_tiket' => $tiket,
                'STATUS_TIKET' => $STATUS_TIKET,
                'id_inventory' => $id_inventory,
                'nama_pelapor'=>$nama_pelapor
            );


            // Insert into the "tiket" table
            $this->mu->insert($datas, 'tiket'); // Assuming `mu` is a model for handling "tiket"

            // File upload configuration
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|xlsx';
            $config['max_size'] = 5120;  // Maximum 5 MB
            $this->upload->initialize($config);
            $this->load->library('upload', $config);

            // echo "<pre>";
            // if (!$this->upload->do_upload('files')) {
            //     $error = $this->upload->display_errors(); // Get the error message
            //     var_dump($error); // Display the error message for debugging
            // } else {
            //     $data = $this->upload->data(); // Get the uploaded file data
            //     var_dump($data); // Display the uploaded file data
            // }
            // die;
            $uploaded_files = [];
            $upload_errors = [];

            // Check if any files were uploaded
            if (!empty($_FILES['files']['name'][0])) {
                foreach ($_FILES['files']['name'] as $key => $file_name) {
                    // Set up the file attributes
                    $_FILES['file']['name'] = $_FILES['files']['name'][$key];
                    $_FILES['file']['type'] = $_FILES['files']['type'][$key];
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$key];
                    $_FILES['file']['error'] = $_FILES['files']['error'][$key];
                    $_FILES['file']['size'] = $_FILES['files']['size'][$key];

                    if ($this->upload->do_upload('file')) {
                        // Get file upload data
                        $upload_data = $this->upload->data();
                        $uploaded_files[] = $upload_data;

                        // Prepare file data to insert into the database
                        $file_info = array(
                            'id_tiket' => $datas['id_tiket'],  // Link with the ticket ID
                            'file_name' => $upload_data['file_name'],
                            'file_path' => $upload_data['full_path'],
                            'file_type' => $upload_data['file_type'],
                            'file_size' => $upload_data['file_size'],
                            'uploaded_at' => date("Y-m-d H:i:s")
                        );

                        // Insert into the `uploaded_files` table
                        $this->fm->insert_file($file_info); // Assuming `fm` is the File Model
                    } else {
                        $upload_errors[] = $this->upload->display_errors();
                    }
                }
            }

            // Pass the results to a view or handle accordingly
            $data['uploaded_files'] = $uploaded_files;
            $data['upload_errors'] = $upload_errors;

            // Redirect after success
            redirect('user/Dashboard');
        } else {
            // validation_errors(); 
            $this->buat_tiket();  // If validation fails, go back to the ticket creation form
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

    public function track($ID_TIKET)
    {
        $data['title'] = 'Riwayat Aktivitas';
        $data['track'] = $this->mu->track($ID_TIKET);
        $data['track_user'] = $this->mu->track_user($ID_TIKET);
        $this->template->load('user/template', 'user/track', $data);
    }
    public function konfirmasi($ID_TIKET)
    {
        $STATUS_TIKET = 7;
        $TEKNISI = $this->session->userdata('id_user');
        $tanggal = date("Y-m-d H:i:s");
        $data = [
            'STATUS_TIKET' => $STATUS_TIKET,
        ];
        $data2 = [
            'ID_TIKET' => $ID_TIKET,
            'ID_STATUS' => $STATUS_TIKET,
            'ID_TEKNISI' => $TEKNISI,
            'TANGGAL' => $tanggal
        ];

        $this->mu->update_konfirmasi($data, $ID_TIKET, $data2);
        redirect('user/Dashboard');
    }
}
