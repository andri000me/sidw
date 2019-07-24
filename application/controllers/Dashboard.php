<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('warga_model');
    }

    public function index()
    {
        $data['title'] = "SIDW | Dashboard";
        $data['nik'] = $this->warga_model->totalNik();
        $data['kk'] = $this->warga_model->totalKk();
        $this->template->load('template', 'dashboard', $data);
    }
}
