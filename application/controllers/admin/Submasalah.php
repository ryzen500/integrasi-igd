<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submasalah extends CI_Controller {
	function __construct()
    {
	    parent::__construct();
		belum_login('admin/inventory');
			$this->load->model("admin/MSubmasalah",'md');

			// $this->load->model('admin/Mdep','mde');
			$this->load->helper('files', 'fungsi');
	}

	public function index()
	{
		// echo "1";
		$data["user"] = $this->md->getTable();
		$this->template->load('admin/template','admin/submasalah',$data);
	}
		public function tambahData()
		{

			$data['departemen'] = $this->mde->getTable();
			$this->template->load('admin/template','admin/tambah_inventory',$data);
		}
		public function simpanData()
		{
            $ID_SUBMASALAH = $this->input->post('ID_SUBMASALAH');
			$NAMA_SUBMASALAH = $this->input->post('NAMA_SUBMASALAH');
	
			$data = [

				'ID_SUBMASALAH' => $ID_SUBMASALAH,
				'NAMA_SUBMASALAH' => $NAMA_SUBMASALAH		
			];
			 $this->md->insert($data);

			redirect('admin/submasalah');
		}
		public function edit($ID_SUBMASALAH)
		{
			$data['departemen'] = $this->md->getTable();
			$data['inventory'] = $this->md->get($ID_SUBMASALAH);
			$this->template->load('admin/template','admin/edit_submasalah',$data);
		}

		public function update(){
			$ID_SUBMASALAH = $this->input->post('ID_SUBMASALAH');
			$NAMA_SUBMASALAH = $this->input->post('NAMA_SUBMASALAH');
	
			$data = [

				'ID_SUBMASALAH' => $ID_SUBMASALAH,
				'NAMA_SUBMASALAH' => $NAMA_SUBMASALAH		
			];

        $save = $this->md->update($data, $ID_SUBMASALAH);
		
		if($save) {
            $this->session->set_flashdata('msg_success', 'Data telah diubah!');
        } else {
            $this->session->set_flashdata('msg_error', 'Data gagal disimpan, silakan isi ulang!');
        }
		
        redirect('admin/submasalah');
    }

	public function delete($ID_SUBMASALAH){

        $delete = $this->md->delete($ID_SUBMASALAH);

        if ($delete) {
            $this->session->set_flashdata('msg_success', 'Data yang anda pilih telah terhapus');
        } else {
            $this->session->set_flashdata('msg_error', 'Tidak bisa hapus pesan');
        }
        redirect('admin/submasalah');
		}
	}
?>