<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member_model extends CI_Model
{

    public function registerNewMember()
    {

        $dataToInsert = [
            "nama" => $this->input->post('nama'),
            "email" => $this->input->post('email'),
            "bio" => "",
            "password" => md5($this->input->post('password')),
            "lokasi" => "",
            "lat" => 0,
            "lon" => 0,
            "role" => $this->input->post('jenisMember'),
            "is_active" => 0,
        ];

        $query = $this->db->insert('user', $dataToInsert);

        if ($query) {
            return true;
        }
        if (!$query) {
            return false;
        }
    }

    public function getMemberData()
    {

        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function getMemberDataBy($param, $value)
    {

        $this->db->where($param, $value);
        $query = $this->db->get('user');
        return $query->row_array();
    }

    public function updateMemberData()
    {
        $dataUpdate = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'bio' => $this->input->post('bio'),
            'lokasi' => $this->input->post('lokasi'),
            'no_hp' => $this->input->post('handphone')
        ];
        $this->db->where('id_user', $this->input->post('id'));
        $update = $this->db->update('user', $dataUpdate);

        if ($update) {
            return true;
        } else {
            return false;
        }
    }

    public function loginMember()
    {

        $dataEmail = $this->input->post('email');
        $dataPassword = md5($this->input->post('password'));

        $this->db->where('email', $dataEmail);
        $this->db->where('password', $dataPassword);
        $validate = $this->db->get('user');
        $validate->row_array();

        return $validate;
    }

    public function validateMember($email, $password)
    {

        $dataEmail = $email;
        $dataPassword = md5($password);

        $this->db->where('email', $dataEmail);
        $this->db->where('password', $dataPassword);
        $validate = $this->db->get('user');
        $validate->row_array();

        return $validate;
    }

    public function insertLatLon()
    {

        $id = $this->input->post('id');
        $lat = $this->input->post('lat');
        $lon = $this->input->post('lon');

        $dataUpdate = [
            'lat' => $lat,
            'lon' => $lon
        ];

        $this->db->where('id_user', $id);
        $update = $this->db->update('user', $dataUpdate);

        if ($update) {
            return true;
        } else {
            return false;
        }
    }
}
