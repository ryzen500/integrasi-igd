<?php

class M_riwayattiket extends CI_Model
{
    
    public function tampil_data()
    {
        $this->load->database();
       return $this->db->get('tiket')->result();
    }
}