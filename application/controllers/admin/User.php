<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		belum_login('admin/user');
		$this->load->model("admin/Mpengguna", 'mp');
		$this->load->model("admin/Mdep", 'mde');
		$this->load->helper('files', 'fungsi');
	}

	public function index()
	{
		$data["user"] = $this->mp->getTable();
		$this->template->load('admin/template', 'admin/pengguna', $data);
	}

	public function tambahData()
	{
		$data['user'] = $this->mp->getTable();
		$data['departemen'] = $this->mde->getAll();
		$data['level'] = $this->mde->getAll1();
		$this->template->load('admin/template', 'admin/tambah_pengguna', $data);
	}

	public function simpanData()
	{
		$id_level = $this->input->post('id_level');
		$id_departemen = $this->input->post('id_departemen');
		$nama_user = $this->input->post('nama_user');
		$password_user = $this->input->post('password_user');
		$email = $this->input->post('email');
		$no_telp = $this->input->post('no_telp');
		$user_status = $this->input->post('user_status');
		$password_hash = $this->input->post('password_user');
		$id_user = mt_rand(121212, 999999);
		// $id_user = 3333;

		$data = [
			'id_user' => $id_user,
			'id_level' => $id_level,
			'id_departemen' => $id_departemen,
			'nama_user' => $nama_user,
			'password_user' => $password_hash,
			'email' => $email,
			'no_telp' => $no_telp,
			'user_status' => $user_status
		];

		$this->mp->insert($data);

		redirect('admin/User');
	}

	public function edit($id_user)
	{
		$data['departemen'] = $this->mde->getAll();
		$data['level'] = $this->mde->getAll1();
		$data['user'] = $this->mp->get($id_user);
		$this->template->load('admin/template', 'admin/edit_pengguna', $data);
	}

	public function update()
	{


		$id_user = $this->input->post('id_user');
		$id_level = $this->input->post('id_level');
		$id_departemen = $this->input->post('id_departemen');
		$nama_user = $this->input->post('nama_user');
		$email = $this->input->post('email');

		$data = [

			'id_user' => $id_user,
			'id_level' => $id_level,
			'id_departemen' => $id_departemen,
			'nama_user' => $nama_user,
			'email' => $email
		];

		$save = $this->mp->update($data, $id_user);

		if ($save) {
			$this->session->set_flashdata('msg_success', 'Data telah diubah!');
		} else {
			$this->session->set_flashdata('msg_error', 'Data gagal disimpan, silakan isi ulang!');
		}

		redirect('admin/User');
	}

	public function delete($id_user)
	{

		$delete = $this->mp->delete($id_user);

		if ($delete) {
			$this->session->set_flashdata('msg_success', 'Data yang anda pilih telah terhapus');
		} else {
			$this->session->set_flashdata('msg_error', 'Tidak bisa hapus pesan');
		}
		redirect('admin/User');
	}
}
