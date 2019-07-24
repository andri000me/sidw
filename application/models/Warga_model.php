<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Warga_model extends CI_Model
{

    public $table = 'tbl_warga';
    public $id = 'nik';
    public $order = 'DESC';


    public function __construct()
    {
        parent::__construct();
    }
    public function json()
    {
        $this->datatables->select('*');
        $this->datatables->from('tbl_warga');
        // $this->datatables->add_column('is_aktif', '$1', 'rename_string_is_aktif(is_aktif)');
        //add this line for join
        $this->datatables->join('tbl_rt', 'tbl_warga.id_rt = tbl_rt.id_rt');
        $this->datatables->join('tbl_kartu_keluarga', 'tbl_warga.no_kk = tbl_kartu_keluarga.no_kk');

        $this->datatables->add_column('action', anchor(site_url('warga/get/$1'), '<i class="fas fa-eye" aria-hidden="true">Lihat</i>', array('class' => 'btn btn-primary btn-sm')) . " 
        " . anchor(site_url('user/delete/$1'), '<i class="fas fa-eye" aria-hidden="true">Keluarga</i>', 'class="btn btn-success btn-sm'), 'nik');
        return $this->datatables->generate();
    }

    public function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function total_rows($q = NULL)
    {
        $this->db->like('id_user_level', $q);
        $this->db->or_like('nama_level', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function totalNik()
    {
        $query = $this->db->query("SELECT nik FROM $this->table");
        $total = $query->num_rows();
        return $total;
    }

    public function totalKk()
    {
        $query = $this->db->query("SELECT no_kk FROM tbl_kartu_keluarga");
        $total = $query->num_rows();
        return $total;
    }
}
