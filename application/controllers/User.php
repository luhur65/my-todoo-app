<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        // cek session
        parent::__construct();
        isLiveUser();
        if (!$this->session->userdata('user')) redirect('oauth');
    }

    public function index()
    {
        $data['title'] = 'Setting - Todoo App';
        $data['user'] = $this->db->get_where('user', ['nickname' => $this->session->userdata('user')])->row_array();
        $data['navigation'] = $this->db->get('navigation')->result_array();

        $this->form_validation->set_rules('fullName', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]');

        if ($this->form_validation->run() === false) {

            $this->load->view('templates/header', $data);
            $this->load->view('user/setting', $data);
            $this->load->view('templates/footer');

        } else {

            $fullName = $this->input->post('fullName', true);
            $password = $this->input->post('password', true);

            if ($password != '') {

                $updateData = [
                    'full_name' => $fullName,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                ];

            } else {

                $updateData = [
                    'full_name' => $fullName
                ];

            }

            $this->db->where('id', $data['user']['id'])->update('user', $updateData);
            $this->session->set_flashdata('pesan', 'Success Updated');
            $this->session->set_flashdata('alert', 'success');
            redirect('setting');
        }

    }

    public function delete()
    {
        $data['user'] = $this->db->get_where('user', 
            [
                'nickname' => $this->session->userdata('user')
            ])->row_array();

        // hapus data akun
        $this->db->where('id', $data['user']['id']);
        $this->db->delete('user');

        // kemudian unset_session
        $this->session->unset_userdata('user');

        $this->session->set_flashdata('pesan', 'Success Deleted');
        $this->session->set_flashdata('alert', 'success');
        redirect('oauth');
    }
}
