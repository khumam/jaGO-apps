<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $data['judul'] = "Menjadi jaGO";
        $this->load->view('Templates/header', $data);
        $this->load->view('Home/s1_hero.php');
        $this->load->view('Home/s1_cariguru.php');
        $this->load->view('Home/s2_fitur.php');
        $this->load->view('Home/s3_tawaran.php');
        $this->load->view('Home/s4_howitworks.php');
        $this->load->view('Templates/footer');
    }
}
