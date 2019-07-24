<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kepalakeluarga extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kepalakeluarga_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = "SIDW | Data Warga";
        $this->template->load('template', 'warga/tbl_kk_list', $data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Kepalakeluarga_model->json();
    }

    private function _rules()
    {
        $this->form_validation->set_rules('no_kk', 'NO KK', 'trim|required');
        $this->form_validation->set_rules('nama_kepkel', 'nama kepala', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('is_aktif', 'is aktif', 'trim|required');

        $this->form_validation->set_rules('no_kk', 'no_kk', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function create()
    {
        $data['title'] = "SIDW | Data Kepala Keluarga";
        $data = array(
            'button'         => 'Create',
            'action'         => site_url('kepalakeluarga/create_action'),
            'no_kk'          => set_value('no_kk'),
            'nama_kepkel'    => set_value('nama_kepkel'),
            'alamat'         => set_value('alamat'),
            'id_rt'          => set_value('id_rt'),
        );

        $this->template->load('template', 'warga/tbl_kk_form', $data);
    }


    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'no_kk'             => $this->input->post('no_kk', TRUE),
                'nama_kepkel'       => $this->input->post('nama_kepkel', TRUE),
                'alamat'            => $this->input->post('alamat', TRUE),
                'rt'             => $this->input->post('id_rt', TRUE),
            );


            $this->Kepalakeluarga_model->insert($data);
            $this->session->set_flashdata('message', 'Data Berhasil Ditambah');
            redirect(site_url('kepalakeluarga'));
        }
    }
}
