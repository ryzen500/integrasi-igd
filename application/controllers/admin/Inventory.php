<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {
	function __construct()
    {
	    parent::__construct();
		belum_login('admin/inventory');
			$this->load->model("admin/Minv",'mi');
			$this->load->model('admin/Mdep','mde');
			$this->load->helper('files', 'fungsi');
	}

	public function index()
		{
			$data["user"] = $this->mi->getTable();
			$this->template->load('admin/template','admin/inventory',$data);
		}
		public function tambahData()
		{

			$data['departemen'] = $this->mde->getAll();
			$this->template->load('admin/template','admin/tambah_inventory',$data);
		}
		public function simpanData()
		{
			$NAMA_INVENTORY = $this->input->post('NAMA_INVENTORY');
			$ID_DEPARTEMEN = $this->input->post('ID_DEPARTEMEN');
			$STATUS = $this->input->post('STATUS');

			$data = [
				'NAMA_INVENTORY' => $NAMA_INVENTORY,
				'ID_DEPARTEMEN' => $ID_DEPARTEMEN,
				'STATUS' => $STATUS			
			];

			 $this->mi->insert($data);

			redirect('admin/Inventory');
		}
		public function edit($ID_INVENTORY)
		{
			$data['departemen'] = $this->mde->getAll();
			$data['inventory'] = $this->mi->get($ID_INVENTORY);
			$this->template->load('admin/template','admin/edit_inventory',$data);
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

	public function delete($ID_INVENTORY){

        $delete = $this->mi->delete($ID_INVENTORY);

        if ($delete) {
            $this->session->set_flashdata('msg_success', 'Data yang anda pilih telah terhapus');
        } else {
            $this->session->set_flashdata('msg_error', 'Tidak bisa hapus pesan');
        }
        redirect('admin/Inventory');
		}
	}
?>