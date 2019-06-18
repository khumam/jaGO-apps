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
        $this->load->model('Pesan_model');
    }

    public function cariguru()
    {
        $data['judul'] = "Cari guru jaGO";
        $data['dataMapel'] = $this->Jasa_model->getAllMapel();
        $data['dataMember'] = $this->Member_model->getMemberDataBy('email', $this->session->userdata('email'));

        if ($this->session->userdata('logged_in') == true) {
            if ($data['dataMember']['lat'] == 0 || $data['dataMember']['lon'] == 0) {
                $this->session->set_flashdata('danger', 'Validasi alamat Anda dulu');
                if ($data['dataMember']['role'] == 2) {
                    redirect('dashboard');
                }
                if ($data['dataMember']['role'] == 3) {
                    redirect('dashboard/guru');
                }
            }
        } else {
            $this->session->set_flashdata('danger', 'Mohon maaf Anda harus login terlebih dahulu');
            redirect('home');
        }

        $this->load->view('Templates/header', $data);
        $this->load->view('Cari/index', $data);
        $this->load->view('Templates/footer');
    }

    public function hasil($jenjang = '')
    {
        $data['judul'] = "Hasil Pencarian guru jaGO";
        $data['pribadi'] = $this->Member_model->getMemberDataBy('email', $this->session->userdata('email'));

        if ($this->session->userdata('logged_in') == true) {
            if ($data['pribadi']['lat'] == 0 || $data['pribadi']['lon'] == 0) {
                $this->session->set_flashdata('danger', 'Validasi alamat Anda dulu');
                if ($data['pribadi']['role'] == 2) {
                    redirect('dashboard');
                }
                if ($data['pribadi']['role'] == 3) {
                    redirect('dashboard/guru');
                }
            }
        } else {
            $this->session->set_flashdata('danger', 'Mohon maaf Anda harus login terlebih dahulu');
            redirect('home');
        }

        if ($jenjang == '') {
            if ($this->input->post('cariMapel') == '') {
                redirect('cari/cariguru');
            } else {
                $data['hasilCari'] = $this->Jasa_model->getHasilCariJasaDataBy('jasa.id_mapel', $this->input->post('cariMapel'));
            }
        } else {
            $data['hasilCari'] = $this->Jasa_model->getHasilCariJasaDataBy('mapel.jenjang', $jenjang);
        }

        $this->load->view('Templates/header', $data);
        $this->load->view('Cari/hasil', $data);
        $this->load->view('Templates/footer');
    }

    public function terdekat()
    {
        $data['judul'] = "Hasil Pencarian Terdekat guru jaGO";
        $data['pribadi'] = $this->Member_model->getMemberDataBy('email', $this->session->userdata('email'));

        $data['hasilCari'] = $this->Jasa_model->getHasilAll();

        $this->load->view('Templates/header', $data);
        $this->load->view('Cari/hasil', $data);
        $this->load->view('Templates/footer');
    }

    public function detail($idJasa = '')
    {
        $data['judul'] = "Hasil Pencarian guru jaGO";
        $data['pribadi'] = $this->Member_model->getMemberDataBy('email', $this->session->userdata('email'));
        $data['hasilCari'] = $this->Jasa_model->getHasilCariJasaDataBy('jasa.id_jasa', $idJasa);
        $data['pesanan'] = $this->Pesan_model->getPesananByMember('pesanan.id_user', $data['pribadi']['id_user']);

        $this->load->view('Templates/header', $data);
        $this->load->view('Cari/detail', $data);
        $this->load->view('Templates/footer');
    }

    public function addPesanan()
    {
        $data['pribadi'] = $this->Member_model->getMemberDataBy('email', $this->session->userdata('email'));

        if ($this->session->userdata('logged_in') != true) {
            redirect('home');
        }
        if ($data['pribadi']['role'] != 2) {
            redirect('home');
        }

        $this->form_validation->set_rules('catatan', 'Catatan', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('home');
        } else {
            $insert = $this->Pesan_model->addPesanan();
            if ($insert == true) {
                $this->session->set_flashdata('success', 'Berhasil menambahkan pesanan, silahkan tunggu');
                redirect('dashboard');
            }
            if ($insert == false) {
                $this->session->set_flashdata('danger', 'Gagal menambahkan pesanan');
                redirect('dashboard');
            }
        }
    }
}
