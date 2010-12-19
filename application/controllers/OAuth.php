<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OAuth extends CI_Controller
{
    
    public function index()
    {
        // Pengecekan session
        if ($this->session->userdata('user')) redirect('home');
        $data['title'] = 'Login - Todoo App';

        $this->load->view('templates/header', $data);
        $this->load->view('oauth/login', $data);
        $this->load->view('templates/footer');
    }

    // Register Section
    public function new()
    {
        // Pengecekan session
        if ($this->session->userdata('user')) redirect('home');
        $data['title'] = 'Register New Account - Todoo App';

        $this->form_validation->set_rules('fullName', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('nickname', 'Nickname', 'trim|required|min_length[5]|max_length[12]|is_unique[user.nickname]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

        if ($this->form_validation->run() === False) {

            $this->load->view('templates/header', $data);
            $this->load->view('oauth/daftar', $data);
            $this->load->view('templates/footer');

        } else {

            $this->_register();
        }
    }

    private function _register()
    {
        $fullName = $this->input->post('fullName', true);
        $nickname = $this->input->post('nickname', true);
        $password = $this->input->post('password', true);

        $data = [
            'full_name' => $fullName,
            'nickname' => $nickname,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'identify' => 'real'
        ];

        $this->db->insert('user', $data);

        // pesan
        $this->session->set_flashdata('pesan', 'Success Register!!');
        $this->session->set_flashdata('alert', 'success');

        // redirect ke halaman index
        redirect('oauth');
    }


    // Login Section
    public function guest()
    {   
        $rand = rand(0, 9999);
        $guest = [
            'full_name' => 'Anonymous User',
            'nickname' => 'user@oauth'.$rand,
            'password' => base64_encode(random_bytes(5)),
            'identify' => 'guest'
        ];

        // insert ke database
        $this->db->insert('user', $guest);
        
        // beri session
        $data['user'] = $guest['nickname'];
        $this->session->set_userdata($data);

        $this->session->set_flashdata('pesan', 'Welcome Anonymous User!');
        $this->session->set_flashdata('alert', 'success');

        redirect('home');
    }

    public function member()
    {
        $this->form_validation->set_rules('nickname', 'Nickname', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');

        if ($this->form_validation->run() === false) {
            
            $this->index();

        } else {
            
            $this->_login();
        }
    }

    private function _login()
    {
        $nickname = $this->input->post('nickname', true);
        $password = $this->input->post('password', true);

        // XSS
        $nickname = xss_clean($nickname);
        $password = xss_clean($password);

        $user = $this->db->get_where('user', ['nickname' => $nickname])->row_array();

        // cek jika ada 
        if ($user) {

            // cek passwordnya 
            if (password_verify($password, $user['password'])) {

                // beri session
                $data['user'] = $user['nickname'];
                $this->session->set_userdata($data);

                $this->session->set_flashdata('pesan', 'Welcome Back! ' . $user['nickname']);
                $this->session->set_flashdata('alert', 'success');
                redirect('home');

                // jika passwordnya salah
            } else {

                $this->session->set_flashdata('pesan', 'Password Anda Salah!');
                $this->session->set_flashdata('alert', 'error');
                redirect('oauth');
            }

            // jika belum terdaftar
        } else {

            $this->session->set_flashdata('pesan', 'Akun Anda Belum Terdaftar !');
            $this->session->set_flashdata('alert', 'error');
            redirect('oauth');
            
        }
    }

    public function logout()
    {
        // unset_session
        $this->session->unset_userdata('user');

        // set flashdata
        $this->session->set_flashdata('pesan', 'Anda Telah Logout');
        $this->session->set_flashdata('alert', 'success');

        // pindahkan halaman
        redirect('oauth');
    }
}
