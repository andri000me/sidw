<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
    }

    function index()
    {
        $data['title'] = "SIDW  | Login Page";
        $this->load->view('auth/login', $data);
    }

    function cheklogin()
    {
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);
        $hashPass = password_hash($password, PASSWORD_DEFAULT);
        $test     = password_verify($password, $hashPass);
        // query chek users
        $this->auth_model->cek_username($username);
        $users       = $this->auth_model->get_user();
        if ($users->num_rows() > 0) {
            $user = $users->row_array();
            if (password_verify($password, $user['password'])) {
                // retrive user data to session
                $this->session->set_userdata($user);
                redirect('welcome');
            } else {
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('status_login', 'username or password wrong');
            redirect('auth');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('status_login', 'logout success');
        redirect('auth');
    }
}
