<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        if ($this->request->post('username') !== NULL) {
            $username = trim((string) $this->request->post('username'));
            $password = (string) $this->request->post('password');

            if ($username === 'admin' && $password === 'admin') {
                $this->session->regenerate_on_login();
                $this->session->set_userdata([
                    'user_id' => 1,
                    'username' => 'admin',
                ]);
                $this->session->set_flashdata('success', 'Welcome back, admin.');
                redirect('products');
            }

            $this->call->view('auth/login', ['error' => 'Invalid username or password.']);
            return;
        }

        $this->call->view('auth/login', ['error' => NULL]);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
