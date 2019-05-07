<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
        $data['dataMember'] = $this->Member_model->getMemberDataBy('email', $this->session->userdata('email'));

        if ($this->session->userdata() && $this->session->userdata('role') == 2) {
            $this->load->view('Templates/header', $data);
            $this->load->view('Dashboard/s1_userinfomember', $data);
            $this->load->view('Dashboard/modal_edit', $data);
            //$this->load->view('Dashboard/modal_validasi_map', $data);
            $this->load->view('Templates/footer');
        } else if ($this->session->userdata() && $this->session->userdata('role') == 3) {

            redirect('dashboard/guru');
        } else {
            redirect('home');
        }
    }

    public function validasialamat()
    {
        $data['judul'] = "Menjadi jaGO";
        $data['dataMember'] = $this->Member_model->getMemberDataBy('email', $this->session->userdata('email'));
        $this->load->view('Templates/header', $data);
        $this->load->view('Dashboard/map', $data);
        $this->load->view('Templates/footer');
    }

    public function guru()
    {
        $data['judul'] = "Menjadi jaGO";
        $data['dataMember'] = $this->Member_model->getMemberDataBy('email', $this->session->userdata('email'));

        if ($this->session->userdata() && $this->session->userdata('role') == 3) {
            $this->load->view('Templates/header', $data);
            $this->load->view('Dashboard/s1_userinfoguru', $data);
            $this->load->view('Dashboard/modal_edit', $data);
            $this->load->view('Templates/footer');
        } else {
            redirect('home');
        }
    }

    public function validateAddress()
    {

        $getAlamat = $this->Member_model->getMemberDataBy('email', $this->session->userdata('email'));
        $insertLatLon = $this->Member_model->insertLatLon($getAlamat['lokasi'], $getAlamat['id_user']);

        if ($insertLatLon == true) {
            $this->session->set_flashdata('success', 'Alamat berhasil divalidasi');
            redirect('dashboard');
        }
        if ($insertLatLon == false) {
            $this->session->set_flashdata('danger', 'Alamat gagal divalidasi. Lengkapi alamat Anda');
            redirect('dashboard');
        }
    }
}
