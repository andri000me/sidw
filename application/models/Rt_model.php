<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rt_model extends CI_Model
{


    public $table = 'tbl_rt';
    public $id = 'id_rt';
    public $rt = 'rt';
    public $order = 'ASC';

    public function __construct()
    {
        parent::__construct();
    }
    // datatables
    public function json()
    {
        $this->datatables->select('id_rt,rt,nama_rt,no_hp');
        $this->datatables->from('tbl_rt');
        // $this->datatables->add_column('is_aktif', '$1', 'rename_string_is_aktif(is_aktif)');
        $this->datatables->add_column('action', anchor(site_url('rukuntetangga/update/$1'), '<i class="fas fa-pen" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-sm')) . " 
             " . anchor(site_url('rukuntetangga/delete/$1'), '<i class="fas fa-trash" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Apakah Anda Yakin Hapus Data ?\')"'), 'id_rt');
        return $this->datatables->generate();
    }
    // ambil data berdasarkan id
    public function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    //ambil semua data rt
    public function get_all()
    {
        $this->db->order_by('nama', $this->order);
        return $this->db->get($this->table)->result();
    }
    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id_rt', $q);
        $this->db->or_like('nama_rt', $q);
        $this->db->or_like('rt', $q);
        $this->db->or_like('no_hp', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_rt', $q);
        $this->db->or_like('nama_rt', $q);
        $this->db->or_like('rt', $q);
        $this->db->or_like('no_hp', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // input  data
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    public function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}
