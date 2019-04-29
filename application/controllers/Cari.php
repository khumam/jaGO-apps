<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cari extends CI_Controller
{

    public function cariguru()
    {
        $data['judul'] = "Cari guru jaGO";
        $this->load->view('Templates/header', $data);
        $this->load->view('Cari/index');
        $this->load->view('Templates/footer');
    }
}
