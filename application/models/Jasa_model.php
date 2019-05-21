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

    public function updateJasa($id)
    {

        $dataUpdate = [
            'id_user' => $this->input->post('id_user'),
            'deskripsi' => $this->input->post('deskripsi'),
            'id_mapel' => $this->input->post('mapel'),
            'hari' => $this->input->post('hari'),
            'jam' => $this->input->post('jam'),
            'biaya' => $this->input->post('biaya'),
            'biaya_per' => $this->input->post('per'),
            'delete' => 0,
        ];

        $this->db->where('id_jasa', $id);
        $update = $this->db->update('jasa', $dataUpdate);

        if ($update) {
            return true;
        }
        if (!$update) {
            return false;
        }
    }

    public function getAllMapel()
    {

        $mapel = $this->db->get('mapel');
        $mapel->result_array();
        return $mapel;
    }

    public function getAllJasaBy($param, $value)
    {
        $this->db->select('*');
        $this->db->from('mapel');
        $this->db->join('jasa', 'jasa.id_mapel = mapel.id_mapel', 'inner');
        $this->db->where($param, $value);
        $this->db->where('delete', 0);
        $jasa = $this->db->get();
        return $jasa;
    }

    public function getJasaDataBy($param, $value)
    {

        $this->db->where($param, $value);
        return $this->db->get('jasa')->result_array();
    }

    public function getHasilCariJasaDataBy($param, $value)
    {
        $this->db->select('*');
        $this->db->from('jasa');
        $this->db->join('user', 'user.id_user = jasa.id_user', 'inner');
        $this->db->join('mapel', 'mapel.id_mapel = jasa.id_mapel', 'inner');
        $this->db->where($param, $value);
        return $this->db->get()->result_array();
    }

    public function getCustomerCount($id)
    {

        $this->db->where('id_user', $id);
        return $this->db->get('pesanan')->num_rows();
    }

    public function getIncome($id)
    {

        $this->db->select('*');
        $this->db->from('jasa');
        $this->db->join('pesanan', 'pesanan.id_jasa = jasa.id_jasa', 'inner');
        $this->db->where('jasa.id_user', $id);
        //$this->db->where('pesanan.status', 'selesai');
        return $this->db->get()->result_array();
    }

    public function deleteJasa($id_jasa)
    {

        $dataUpdate = [
            'delete' => 1,
        ];

        $this->db->where('id_jasa', $id_jasa);
        $delete = $this->db->update('jasa', $dataUpdate);

        if ($delete) {
            return true;
        }
        if (!$delete) {
            return false;
        }
    }
}
