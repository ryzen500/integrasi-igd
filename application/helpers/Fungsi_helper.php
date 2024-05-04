<?php
function sudah_login()
{
    $ci =& get_instance();
    if ($ci->session->userdata('id_user')) {
        if ($ci->session->userdata('id_level')==1) {
            redirect('admin/dashboard','refresh');
        }elseif ($ci->session->userdata('id_level')==2) {
            redirect('user/Dashboard','refresh');
        }else {
            redirect('teknisi/dashboard','refresh');
        }
        
    }
}
function belum_login($nama_controller)
{
    $ci =& get_instance();
    if ($ci->session->userdata('id_user')) {
        $menu_admin =['admin/dashboard', 'admin/departemen', 'admin/inventory', 'admin/tiket', 'admin/user'];
        $menu_teknisi =['teknisi/dashboard','teknisi/tiket'];
        $menu_pengguna=['user/dashboard'];
        if ($ci->session->userdata('id_level')==1) {
            if (in_array($nama_controller,$menu_admin)) {
                return true;
            }
        }elseif ($ci->session->userdata('id_level')==2) {
            if (in_array($nama_controller,$menu_pengguna)) {
                return true;
            }
        }elseif ($ci->session->userdata('id_level')==3) {
            if (in_array($nama_controller,$menu_teknisi)) {
                return true;
            }
        }
    redirect('404');die();
      
    }else {
        $ci->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Anda Belum Login!!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('login','refresh');
    }
}
