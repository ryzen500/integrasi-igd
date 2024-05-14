<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mlogin extends CI_Model
{

    public function cek_login($username)
    {
        // $password_user1 = password_verify($password_user, $post['password_user']);

        $this->db->from('user u');
        $this->db->where('username', $username);
        $this->db->join('departemen d', 'u.id_departemen=d.id');
        $this->db->select('u.*, d.nama_departemen AS departemen');
        return $this->db->get_where();
    }
}
