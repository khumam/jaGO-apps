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
        $this->load->model('Pesan_model');
    }

    public function index()
    {
        $data['judul'] = "Menjadi jaGO";
        $data['dataMember'] = $this->Member_model->getMemberDataBy('email', $this->session->userdata('email'));
        $data['pesanan'] = $this->Pesan_model->getPesananByMember('pesanan.id_user', $data['dataMember']['id_user']);

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
        $data['jumlahPelanggan'] = $this->Pesan_model->jumlahPelanggan($data['dataMember']['id_user']);
        $data['jumlahPendapatan'] = $this->Pesan_model->getPendapatan($data['dataMember']['id_user']);
        $data['jumlahNilai'] = $this->Pesan_model->getAllRating($data['dataMember']['id_user']);
        $data['pesanan'] = $this->Pesan_model->getPesanan('jasa.id_user', $data['dataMember']['id_user']);

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
        $this->form_validation->set_rules('jam', 'Jam Mulai', 'required');
        $this->form_validation->set_rules('jam2', 'Jam Selesai', 'required');
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

    public function batalPesan()
    {

        if ($this->session->userdata('logged_in') != true) {
            redirect('home');
        } else {
            $batal = $this->Pesan_model->batalPesanan($this->input->post('id_pesanan'), $this->input->post('alasanbatal'));
            if ($batal) {
                $this->session->set_flashdata('success', 'Berhasil membatalkan pesanan');
                if ($this->session->userdata('role') == 2) :
                    redirect('dashboard');
                else :
                    redirect('dashboard/guru');
                endif;
            }
            if (!$batal) {
                $this->session->set_flashdata('gagal', 'Gagal membatalkan pesanan');
                if ($this->session->userdata('role') == 2) :
                    redirect('dashboard');
                else :
                    redirect('dashboard/guru');
                endif;
            }
        }
    }

    public function pesanan()
    {

        $data['dataMember'] = $this->Member_model->getMemberDataBy('email', $this->session->userdata('email'));
        $data['judul'] = "Pesanan JaGO";
        $data['pesanan'] = $this->Pesan_model->getPesanan('jasa.id_user', $data['dataMember']['id_user']);
        if ($data['dataMember']['role'] != 3) {
            redirect('home');
        }
        $this->load->view('Templates/header', $data);
        $this->load->view('Dashboard/s1_gurupesanan', $data);
        $this->load->view('Templates/footer');
    }

    public function selesai($id, $total)
    {

        if ($this->session->userdata('logged_in') != true) {
            redirect('home');
        }

        $selesai = $this->Pesan_model->orderSelesai($id, $total);

        if ($selesai) :
            $this->session->set_flashdata('success', 'Berhasil menyelesaikan pesanan');
            redirect('dashboard/guru');
        else :
            $this->session->set_flashdata('danger', 'Gagal menyelesaikan pesanan');
            redirect('dashboard/guru');
        endif;
    }

    public function rating($id_jasa)
    {
        if ($this->session->userdata('logged_in') != true) {
            redirect('home');
        }

        $rating = $this->Pesan_model->rating($id_jasa);
        if ($rating == true) :
            $this->session->set_flashdata('success', 'Berhasil memberikan rating');
            redirect('dashboard');
        else :
            $this->session->set_flashdata('danger', 'Gagal memberikan rating');
            redirect('dashboard');
        endif;
    }
}
