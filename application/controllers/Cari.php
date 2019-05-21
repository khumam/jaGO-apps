<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cari extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Member_model');
        $this->load->model('Jasa_model');
    }

    public function cariguru()
    {
        $data['judul'] = "Cari guru jaGO";
        $data['dataMapel'] = $this->Jasa_model->getAllMapel();
        $data['dataMember'] = $this->Member_model->getMemberDataBy('email', $this->session->userdata('email'));

        if ($data['dataMember']['lat'] == 0 || $data['dataMember']['lon'] == 0) {
            $this->session->set_flashdata('danger', 'Validasi alamat Anda dulu');
            if ($data['dataMember']['role'] == 2) {
                redirect('dashboard');
            }
            if ($data['dataMember']['role'] == 3) {
                redirect('dashboard/guru');
            }
        }

        $this->load->view('Templates/header', $data);
        $this->load->view('Cari/index', $data);
        $this->load->view('Templates/footer');
    }

    public function hasil()
    {
        $data['judul'] = "Hasil Pencarian guru jaGO";
        $data['hasilCari'] = $this->Jasa_model->getHasilCariJasaDataBy('jasa.id_mapel', $this->input->post('cariMapel'));
        $data['pribadi'] = $this->Member_model->getMemberDataBy('email', $this->session->userdata('email'));

        $this->load->view('Templates/header', $data);
        $this->load->view('Cari/hasil', $data);
        $this->load->view('Templates/footer');
    }
}
