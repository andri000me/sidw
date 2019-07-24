<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function get_user()
    {
        return $this->db->get('tbl_user');
    }
    public function cek_username($data)
    {
        return $this->db->where('username', $data);
    }
}
