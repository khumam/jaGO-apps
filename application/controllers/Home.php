<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
    }
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

    public function login()
    {
        $data['judul'] = "Login jaGO";
        $this->load->view('Templates/header', $data);
        $this->load->view('Login/s1_login');
        $this->load->view('Templates/footer');
    }

    public function register()
    {
        $data['judul'] = "Register jaGO";

        //Rules
        $this->form_validation->set_rules('nama', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('jenisMember', 'Member', 'required');


        
        if ($this->form_validation->run() == FALSE){
            $this->load->view('Templates/header', $data);
            $this->load->view('Register/s1_register');
            $this->load->view('Templates/footer');
        } else {
            echo "success register";
        }
    }

    public function aboutus()
    {
        $data['judul'] = "Tentang JaGO";
        $this->load->view('Templates/header', $data);
        $this->load->view('About/index');
        $this->load->view('Templates/footer');
    }

    public function bantuan()
    {
        $data['judul'] = "Tentang JaGO";
        $this->load->view('Templates/header', $data);
        $this->load->view('About/bantuan');
        $this->load->view('Templates/footer');
    }
}
