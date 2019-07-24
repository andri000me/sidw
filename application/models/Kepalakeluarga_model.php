<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kepalakeluarga_model extends CI_Model
{

    public $table = 'tbl_kartu_keluarga';
    public $id = 'no_kk';
    public $order = 'DESC';


    public function __construct()
    {
        parent::__construct();
    }
    public function json()
    {
        $this->datatables->select('no_kk,nama_kepkel,alamat,rt');
        $this->datatables->from($this->table);
        // $this->datatables->add_column('is_aktif', '$1', 'rename_string_is_aktif(is_aktif)');
        //add this line for join
        $this->datatables->join('tbl_rt', 'tbl_kartu_keluarga.id_rt = tbl_rt.id_rt');
        $this->datatables->add_column('action', anchor(site_url('kepalakeluarga/get/$1'), '<i class="fas fa-eye" aria-hidden="true">Lihat</i>', array('class' => 'btn btn-primary btn-sm')), 'no_kk');
        return $this->datatables->generate();
    }

    // insert data
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
}
