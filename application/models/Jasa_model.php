<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jasa_model extends CI_Model
{

    public function addJasa()
    {

        $dataToInsert = [
            'id_user' => $this->input->post('id_user'),
            'deskripsi' => $this->input->post('deskripsi'),
            'id_mapel' => $this->input->post('mapel'),
            'hari' => $this->input->post('hari'),
            'jam' => $this->input->post('jam'),
            'biaya' => $this->input->post('biaya'),
            'biaya_per' => $this->input->post('per'),
            'delete' => 0,
        ];

        $insert = $this->db->insert('jasa', $dataToInsert);

        if ($insert) {
            return true;
        }
        if (!$insert) {
            return false;
        }
    }

    public function getAllMapel()
    {

        $mapel = $this->db->get('mapel');
        $mapel->result_array();
        return $mapel;
    }
}
