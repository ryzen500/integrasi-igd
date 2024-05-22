<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mlogin', 'ml');
        $this->load->library('form_validation', 'session');
        $this->load->helper('files', 'form', 'fungsi');
    }
    public function index()
    {
        sudah_login();
        $data['title'] = 'Masuk';
        $data['judul'] = 'Rekap IGD Surabaya';
        $this->template->load('auth/template_auth', 'auth/login', $data);
    }
    public function validation()
    {
        $this->form_validation->set_rules('username', 'Masukkan Username', 'required', ['required' => 'No. Pegawai harus diisi!']);
        $this->form_validation->set_rules('password_user', 'Password', 'required|trim|min_length[5]', ['required' => 'Password harus diisi!']);
        
        // var_dump($_POST);die;
        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username', TRUE);
            $pass = $this->input->post('password_user', TRUE);
                $query = $this->ml->cek_login($username);
                if ($query->num_rows() > 0) {
                    $row = $query->row_array();

                    // echo "<pre>";
                    // if (password_verify($pass,$row['password_user'])) {
                    if ($pass == $row['password_user']) {

                        $data = [
                            'id_user' => $row['id_user'],
                            'nama_user' => $row['nama_user'],
                            'email' => $row['email'],
                            'no_telp' => $row['no_telp'],
                            'id_level' => $row['id_level'],
                            'departemen' => $row['departemen']
                        ];

                        // $_SESSION['id_users'] = $row['id_user'];
                        $this->session->set_userdata($data);
                        if ($row['id_level'] == 1) {
                            redirect('admin/Dashboard');
                        } else {

                            // var_dump($row['id_level']);die;
                            redirect('user/Dashboard/index');
                        } 
                    }else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Password Anda Salah!!!</strong> 

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>');
                    redirect('login');
                    }
                    
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>No. Pegawai tidak terdaftar</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>');
                    redirect('login');
                }   
        } else {
            // $errors = $this->form_validation->error_array(); // dapatkan pesan error
            // print_r($errors); // Debug untuk melihat pesan kesalahan
            // die;
            $this->index();
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
