<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Member_model');
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

        if ($this->session->userdata() && $this->session->userdata('role') == 2) {
            redirect('dashboard');
        }
        if ($this->session->userdata() && $this->session->userdata('role') == 3) {
            redirect('dashboard/guru');
        }
        //Rules
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Templates/header', $data);
            $this->load->view('Login/s1_login');
            $this->load->view('Templates/footer');
        } else {
            $validateLogin = $this->Member_model->loginMember();
            $dataMember = $this->Member_model->getMemberDataBy('email', $this->input->post('email'));
            var_dump($validateLogin);
            if ($validateLogin->num_rows() == 1) {
                $sessionData = [
                    'username' => $dataMember['nama'],
                    'role' => $dataMember['role'],
                    'email' => $dataMember['email'],
                    'logged_in' => TRUE
                ];
                $this->session->set_userdata($sessionData);

                if ($sessionData['role'] == 2) {
                    redirect('dashboard');
                }
                if ($sessionData['role'] == 3) {
                    redirect('dashboard/guru');
                }
            } else {

                $this->session->set_flashdata('danger', 'Maaf kombinasi email atau password salah');
                redirect('home/login');
            }
        }
    }

    public function register()
    {
        $data['judul'] = "Register jaGO";

        if ($this->session->userdata() && $this->session->userdata('role') == 2) {
            redirect('dashboard');
        }
        if ($this->session->userdata() && $this->session->userdata('role') == 3) {
            redirect('dashboard/guru');
        }

        //Rules
        $this->form_validation->set_rules('nama', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('jenisMember', 'Member', 'required');



        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Templates/header', $data);
            $this->load->view('Register/s1_register');
            $this->load->view('Templates/footer');
        } else {
            $sendToDB = $this->Member_model->registerNewMember();
            $sessionData = [
                'username' => $this->input->post('nama'),
                'role' => $this->input->post('jenisMember'),
                'email' => $this->input->post('email'),
                'logged_in' => TRUE
            ];
            $this->session->set_userdata($sessionData);

            if ($sendToDB == true && $sessionData['role'] == 2) {
                redirect('dashboard');
            } else if ($sendToDB == true && $sessionData['role'] == 3) {
                redirect('dashboard/guru');
            }
        }
    }

    public function logout()
    {
        $sessionData = array('username', 'role', 'email', 'logged_in');
        $this->session->unset_userdata($sessionData);
        redirect('home');
    }

    public function updateDataMember()
    {
        $getEmail = $this->Member_model->getMemberDataBy('email', $this->session->userdata('email'));
        $validate = $this->Member_model->validateMember($getEmail['email'], $this->input->post('password'));

        if($validate->num_rows() == 1){
            $update = $this->Member_model->updateMemberData();
            if($update == true){
                $this->session->set_flashdata('success', 'Data berhasil dirubah');
                    redirect('dashboard');
            }
            if($update == false){
                $this->session->set_flashdata('danger', 'Maaf ada kesalahan update data');
                    redirect('dashboard');
            }
        } else {
            $this->session->set_flashdata('danger', 'Maaf ada kesalahan update data. Periksa kembali password Anda');
                    redirect('dashboard');
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
