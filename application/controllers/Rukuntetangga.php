<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Rukuntetangga extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Rt_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = "SIDW | Data Rukun Tetangga";
        $this->template->load('template', 'rukun_tetangga/tbl_rt_list', $data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Rt_model->json();
    }
    private function _rules()
    {
        $this->form_validation->set_rules('nama_rt', 'nama_rt', 'trim|required');
        $this->form_validation->set_rules('rt', 'rt', 'trim|required');
        $this->form_validation->set_rules('no_hp', 'no_hp', 'trim|required');


        $this->form_validation->set_rules('id_rt', 'id_rt', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    public function create()
    {
        $data['title'] = "SIDW | Data Rukun Tetangga";
        $data = array(
            'button' => 'Create',
            'action' => site_url('rukuntetangga/create_action'),
            'id_rt' => set_value('id_rt'),
            'rt' => set_value('rt'),
            'nama_rt' => set_value('nama_rt'),
            'no_hp' => set_value('no_hp'),

        );
        $this->template->load('template', 'rukun_tetangga/tbl_rt_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_rt', TRUE));
        } else {

            $data = array(
                'rt' => $this->input->post('rt', TRUE),
                'nama_rt' => $this->input->post('nama_rt', TRUE),
                'no_hp' => $this->input->post('no_hp', TRUE),
            );

            $this->Rt_model->insert($data);
            $this->session->set_flashdata('message', 'Data Berhasil Ditambahkan');
            redirect(site_url('rukuntetangga'));
        }
    }
    public function update($id)
    {
        $row = $this->Rt_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('rukuntetangga/update_action'),
                'id_rt' => set_value('id_rt', $row->id_rt),
                'rt' => set_value('rt', $row->rt),
                'nama_rt' => set_value('nama_rt', $row->nama_rt),
                'no_hp' => set_value('no_hp', $row->no_hp),
            );
            $this->template->load('template', 'rukun_tetangga/tbl_rt_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ada');
            redirect(site_url('rukuntetangga'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_rt', TRUE));
        } else {
            $data = array(
                'rt' => $this->input->post('rt', TRUE),
                'nama_rt' => $this->input->post('nama_rt', TRUE),
                'no_hp' => $this->input->post('no_hp', TRUE),
            );

            $this->Rt_model->update($this->input->post('id_rt', TRUE), $data);
            $this->session->set_flashdata('message', 'Data Berhasil Di Update');
            redirect(site_url('rukuntetangga'));
        }
    }

    public function delete($id)
    {
        $row = $this->Rt_model->get_by_id($id);

        if ($row) {
            $this->Rt_model->delete($id);
            $this->session->set_flashdata('message', 'Delete  Success');
            redirect(site_url('rukuntetangga'));
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ada');
            redirect(site_url('rukuntetangga'));
        }
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_rt.doc");

        $data = array(
            'tbl_rt_data' => $this->Rt_model->get_all(),
            'start' => 0
        );

        $this->load->view('rukun_tetangg/tbl_rt_doc', $data);
    }
}
