<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Member_model');
        $this->load->model('Jasa_model');
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

        $this->form_validation->set_rules('lat', 'Latitude', 'required');
        $this->form_validation->set_rules('lon', 'Langitude', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('Templates/header', $data);
            $this->load->view('Dashboard/map', $data);
            $this->load->view('Templates/footer');
        } else {

            $insertLatLon = $this->Member_model->insertLatLon();

            if ($insertLatLon == true) {
                $this->session->set_flashdata('success', 'Alamat berhasil divalidasi');
                if ($this->session->userdata('role') == 2) {
                    redirect('dashboard');
                }
                if ($this->session->userdata('role') == 3) {
                    redirect('dashboard/guru');
                }
            }
            if ($insertLatLon == false) {
                $this->session->set_flashdata('danger', 'Alamat gagal divalidasi. Lengkapi alamat Anda');
                if ($this->session->userdata('role') == 2) {
                    redirect('dashboard');
                }
                if ($this->session->userdata('role') == 3) {
                    redirect('dashboard/guru');
                }
            }
        }
    }

    public function guru()
    {
        $data['judul'] = "Menjadi jaGO";
        $data['dataMember'] = $this->Member_model->getMemberDataBy('email', $this->session->userdata('email'));
        $data['dataJasa'] = $this->Jasa_model->getAllJasaBy('id_user', $data['dataMember']['id_user'])->result_array();
        $data['jumlahJasa'] = $this->Jasa_model->getAllJasaBy('id_user', $data['dataMember']['id_user'])->num_rows();
        $data['jumlahPelanggan'] = $this->Jasa_model->getCustomerCount($data['dataMember']['id_user']);
        $data['jumlahPendapatan'] = $this->Jasa_model->getIncome($data['dataMember']['id_user']);

        if ($this->session->userdata() && $this->session->userdata('role') == 3) {
            $this->load->view('Templates/header', $data);
            $this->load->view('Dashboard/s1_userinfoguru', $data);
            $this->load->view('Dashboard/modal_edit', $data);
            $this->load->view('Templates/footer');
        } else {
            redirect('home');
        }
    }

    public function addJasa()
    {
        if ($this->session->userdata('role') != 3) {
            redirect('dashboard');
        }


        $data['judul'] = "Add Jasa JaGO";
        $data['dataMember'] = $this->Member_model->getMemberDataBy('email', $this->session->userdata('email'));
        $data['dataMapel'] = $this->Jasa_model->getAllMapel();

        if ($data['dataMember']['lat'] == 0 || $data['dataMember']['lon'] == 0) {
            $this->session->set_flashdata('danger', 'Lengkapi alamat Anda dulu');
            redirect('dashboard/guru');
        }

        $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('hari', 'Hari', 'required');
        $this->form_validation->set_rules('jam', 'Jam', 'required');
        $this->form_validation->set_rules('durasi', 'Durasi', 'required');
        $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required');
        $this->form_validation->set_rules('biaya', 'Biaya', 'required');
        $this->form_validation->set_rules('per', 'Harga Per Jasa', 'required');
        $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required');

        if ($this->form_validation->run() == false) {

            if ($this->session->userdata() && $this->session->userdata('role') == 3) {
                $this->load->view('Templates/header', $data);
                $this->load->view('Dashboard/add_jasa', $data);
                $this->load->view('Templates/footer');
            } else {
                redirect('home');
            }
        } else {

            $addJasa = $this->Jasa_model->addJasa();

            if ($addJasa == true) {
                $this->session->set_flashdata('success', 'Berhasil menambahkan jasa baru');
                redirect('dashboard/guru');
            }

            if ($addJasa == false) {
                $this->session->set_flashdata('danger', 'Gagal menambahkan jasa baru');
                redirect('dashboard/guru');
            }
        }
    }

    public function updateJasa($id = '')
    {

        $data['judul'] = "Add Jasa JaGO";
        $data['dataMember'] = $this->Member_model->getMemberDataBy('email', $this->session->userdata('email'));
        $data['dataMapel'] = $this->Jasa_model->getAllMapel();
        $data['jasaData'] = $this->Jasa_model->getJasaDataBy('id_jasa', $id);

        $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('hari', 'Hari', 'required');
        $this->form_validation->set_rules('jam', 'Jam', 'required');
        // $this->form_validation->set_rules('durasi', 'Durasi', 'required');
        $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required');
        $this->form_validation->set_rules('biaya', 'Biaya', 'required');
        $this->form_validation->set_rules('per', 'Harga Per Jasa', 'required');
        $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required');
        $this->form_validation->set_rules('id_jasa', 'Id Jasa', 'required');

        if ($this->form_validation->run() == false) {

            if ($this->session->userdata() && $this->session->userdata('role') == 3) {
                $this->load->view('Templates/header', $data);
                $this->load->view('Dashboard/update_jasa', $data);
                $this->load->view('Templates/footer');
            } else {
                redirect('home');
            }
        } else {

            $addJasa = $this->Jasa_model->updateJasa($this->input->post('id_jasa'));

            if ($addJasa == true) {
                $this->session->set_flashdata('success', 'Berhasil mengubah jasa');
                redirect('dashboard/guru');
            }

            if ($addJasa == false) {
                $this->session->set_flashdata('danger', 'Gagal mengubah jasa');
                redirect('dashboard/guru');
            }
        }
    }

    public function deleteJasa($id = '')
    {

        $delete = $this->Jasa_model->deleteJasa($id);

        if ($delete == true) {
            $this->session->set_flashdata('success', 'Berhasil menghapus jasa');
            redirect('dashboard/guru');
        }

        if ($delete == false) {
            $this->session->set_flashdata('danger', 'Gagal menghapus jasa');
            redirect('dashboard/guru');
        }
    }
}
