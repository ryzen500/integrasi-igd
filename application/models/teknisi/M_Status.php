<?php 
	class M_Status extends CI_Model{
		public function get_status(){
			return $this->db->get_where('history_status',array('id_user' => $this->session->userdata('id_user')))->result();
			
		}
	}