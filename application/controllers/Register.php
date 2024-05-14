<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
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
        $data['title'] = 'Register';
        $data['judul'] = 'IGD RSWB Surabaya';
        $this->template->load('auth/template_auth', 'auth/registration', $data);
    }
    public function validation()
    {
        $this->form_validation->set_rules('id_user', 'No. Pegawai', 'required', ['required' => 'No. Pegawai harus diisi!']);
        $this->form_validation->set_rules('password_user', 'Password', 'required|trim|min_length[5]', ['required' => 'Password harus diisi!']);

        if ($this->form_validation->run() == TRUE) {
            $id = $this->input->post('id_user', TRUE);
            $pass = $this->input->post('password_user', TRUE);
                $query = $this->ml->cek_login($id);
                if ($query->num_rows() > 0) {
                    $row = $query->row_array();

                    // echo "<pre>";
                    // var_dump($row['password_user'], $pass);die;
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
                        $this->session->set_userdata($data);
                        if ($row['id_level'] == 1) {
                            redirect('admin/Dashboard');
                        } elseif ($row['id_level'] == 2) {
                            redirect('user/Dashboard');
                        } else {
                            redirect('teknisi/Dashboard');
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

            $this->index();
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
