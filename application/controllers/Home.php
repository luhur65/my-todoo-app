<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller 
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
        $data['title'] = 'Home - Todoo App';
        $data['user'] = $this->db->get_where('user', ['nickname' => $this->session->userdata('user')])->row_array();
        $data['navigation'] = $this->db->get('navigation')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }

}