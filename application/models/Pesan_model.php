<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan_model extends CI_Model
{

    public function addPesanan()
    {
        $dataToInsert = [
            'id_jasa' => $this->input->post('id_jasa'),
            'id_user' => $this->input->post('id_user'),
            'nama_guru' => $this->input->post('nama_guru'),
            'mapel_pesanan' => $this->input->post('mapel_pesanan'),
            'hari' => $this->input->post('hari'),
            'jam' => $this->input->post('jam'),
            'catatan' => $this->input->post('catatan'),
            'status' => 'Menunggu',
            'nilai' => 0,
        ];

        $insert = $this->db->insert('pesanan', $dataToInsert);

        return $insert ? true : false;
    }

    public function getPesananBy($param, $value)
    {

        $this->db->where($param, $value);
        $this->db->where('delete', 0);
        $pesanan = $this->db->get('pesanan');
        return $pesanan->result_array();
    }

    public function batalPesanan($id_pesanan, $alasan)
    {

        $dataUpdate = [
            'status' => 'Batal : ' . $alasan,
        ];
        $this->db->where('id_pesanan', $id_pesanan);

        $update = $this->db->update('pesanan', $dataUpdate);

        return $update ? true : false;
    }

    public function getGuruPesanan($param, $value)
    {

        $this->db->select('jasa.id_jasa,jasa.id_user as id_user_jasa,jasa.deskripsi,jasa.id_mapel,jasa.hari,jasa.jam,jasa.biaya,jasa.biaya_per,pesanan.id_pesanan,pesanan.id_jasa,pesanan.id_user,pesanan.nama_guru,pesanan.mapel_pesanan,pesanan.hari as req_hari,pesanan.jam as req_jam,pesanan.catatan,pesanan.status');
        $this->db->from('jasa');
        $this->db->join('pesanan', 'jasa.id_jasa = pesanan.id_jasa', 'inner');
        $this->db->where($param, $value);
        $this->db->where('pesanan.delete', 0);
        return $this->db->get();
    }

    public function getPesanan($param, $value)
    {

        $this->db->select('user.nama as nama_pemesan, user.lokasi as lokasi_pemesan, user.no_hp as nohp_pemesan, jasa.id_jasa,jasa.id_user as id_user_jasa,jasa.deskripsi,jasa.id_mapel,jasa.hari,jasa.jam,jasa.biaya,jasa.biaya_per,pesanan.id_pesanan,pesanan.id_jasa,pesanan.id_user,pesanan.nama_guru,pesanan.mapel_pesanan,pesanan.hari as req_hari,pesanan.jam as req_jam,pesanan.catatan,pesanan.status, pesanan.time_created');
        $this->db->from('jasa');
        $this->db->join('pesanan', 'jasa.id_jasa = pesanan.id_jasa', 'inner');
        $this->db->join('user', 'pesanan.id_user = user.id_user', 'inner');
        $this->db->where($param, $value);
        $this->db->where('status',  'Menunggu');
        $this->db->order_by('pesanan.id_pesanan', 'DESC');
        $this->db->where('pesanan.delete', 0);
        return $this->db->get();
    }

    public function getPesananByMember($param, $value)
    {

        $this->db->select('user.nama as nama_pemesan, user.lokasi as lokasi_pemesan, user.no_hp as nohp_pemesan, jasa.id_jasa,jasa.id_user as id_user_jasa,jasa.deskripsi,jasa.id_mapel,jasa.hari,jasa.jam,jasa.biaya,jasa.biaya_per,pesanan.id_pesanan,pesanan.id_jasa,pesanan.id_user,pesanan.nama_guru,pesanan.mapel_pesanan,pesanan.hari as req_hari,pesanan.jam as req_jam,pesanan.catatan,pesanan.status, pesanan.time_created');
        $this->db->from('jasa');
        $this->db->join('pesanan', 'jasa.id_jasa = pesanan.id_jasa', 'inner');
        $this->db->join('user', 'pesanan.id_user = user.id_user', 'inner');
        $this->db->where($param, $value);
        $this->db->where('status !=',  'Selesai');
        $this->db->order_by('pesanan.id_pesanan', 'DESC');
        $this->db->where('pesanan.delete', 0);
        return $this->db->get();
    }

    public function orderSelesai($id)
    {

        $update = [
            'status' => 'Selesai',
        ];

        $this->db->where('id_pesanan', $id);
        $update = $this->db->update('pesanan', $update);

        return $update ? true : false;
    }

    public function jumlahPelanggan($id_user)
    {

        $this->db->select('pesanan.id_jasa, pesanan.status, jasa.id_jasa, jasa.id_user, user.id_user');
        $this->db->from('pesanan');
        $this->db->join('jasa', 'pesanan.id_jasa = jasa.id_jasa', 'inner');
        $this->db->join('user', 'jasa.id_user = user.id_user', 'inner');
        $this->db->where('jasa.id_user', $id_user);
        $this->db->where('pesanan.status =', 'Selesai');
        return $this->db->get()->result_array();
    }
}
