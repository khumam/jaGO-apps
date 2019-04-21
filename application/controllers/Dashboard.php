<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        $data['judul'] = "Menjadi jaGO";
        $this->load->view('Templates/header', $data);
        $this->load->view('Dashboard/s1_userinfomember');
        $this->load->view('Templates/footer');
    }

    public function guru()
    {
        $data['judul'] = "Menjadi jaGO";
        $this->load->view('Templates/header', $data);
        $this->load->view('Dashboard/s1_userinfoguru');
        $this->load->view('Templates/footer');
    }
}
