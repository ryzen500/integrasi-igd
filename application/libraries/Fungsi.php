<?php
Class Fungsi{
    protected $ci;
    function __construct()
    {
        $this->ci =& get_instance();
    }
    function user_login()
    {
        $this->ci->load->model('Mlogin');
        $id =$this->ci->session->userdata('id_user');
        $userdata= $this->ci->Mlogin->get($id)->row();
        return $userdata;
    }
}