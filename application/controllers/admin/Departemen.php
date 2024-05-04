<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departemen extends CI_Controller {
		public function __construct(){
			parent:: __construct();
            belum_login('admin/departemen');
			$this->load->model("admin/Mdata",'md');
            $this->load->helper('files', 'fungsi');
		}

        public function index()
		{
			$data["user"] = $this->md->getTable();
			$this->template->load('admin/template','admin/departemen',$data);
		}

        public function tambahData()
        {
            
    
            $data['departemen'] = $this->md->getTable();
            $this->template->load('admin/template','admin/departemen', $data);
        }
        public function simpanData()
        {

            $NAMA_DEPARTEMEN = $this->input->post('NAMA_DEPARTEMEN');
    
            $data = [
                'NAMA_DEPARTEMEN' => $NAMA_DEPARTEMEN		
            ];
    
            $simpan = $this->md->insert($data);
            redirect('admin/Departemen');
        }
        public function edit($ID_DEPARTEMEN)
		{


			$data['departemen'] = $this->md->get($ID_DEPARTEMEN);
            $this->template->load('admin/template','admin/edit_departemen', $data);
		}

		public function update(){

			$ID_DEPARTEMEN = $this->input->post('ID_DEPARTEMEN');
			$NAMA_DEPARTEMEN = $this->input->post('NAMA_DEPARTEMEN');
			
			$data = [

				'ID_DEPARTEMEN' => $ID_DEPARTEMEN,
				'NAMA_DEPARTEMEN' => $NAMA_DEPARTEMEN		
			];

        $save = $this->md->update($data, $ID_DEPARTEMEN);
		
		if($save) {
            $this->session->set_flashdata('msg_success', 'Data telah diubah!');
        } else {
            $this->session->set_flashdata('msg_error', 'Data gagal disimpan, silakan isi ulang!');
        }
		
        redirect('admin/Departemen');
    }

	public function delete($ID_DEPARTEMEN){

        $delete = $this->md->delete($ID_DEPARTEMEN);

        if ($delete) {
            $this->session->set_flashdata('msg_success', 'Data yang anda pilih telah terhapus');
        } else {
            $this->session->set_flashdata('msg_error', 'Tidak bisa hapus pesan');
        }
        redirect('admin/Departemen');
		}
	}
?>