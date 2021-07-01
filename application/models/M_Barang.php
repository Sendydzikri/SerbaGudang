<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Barang extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->library('encryption');
    }

    public function tambahBarang($data)
    {
        return $this->db->insert('tb_barang',$data);
    }

    public function get()
    {
        return $this->db->get("tb_barang");
    }

    public function updateBarang($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function updateData($kode_barang, $data)
    {
        $this->db->where('kode_barang', $kode_barang);
        return $this->db->update('tb_barang', $data);
    }
    
    public function updateStatusMasuk($id_masuk,$data){
        $this->db->where('id_masuk', $id_masuk);
        return $this->db->update('tb_masuk', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('kode_barang', $id);
        return $this->db->delete('tb_barang');
    }

    public function getBarangById($kode_barang){
        $this->db->select("*");
        $this->db->from("tb_barang");
        $this->db->where("kode_barang",$kode_barang);
        $data = $this->db->get();
        return $data->row_array();
    }

    public function getBarangMasukById($idMasuk){
        $this->db->select("*");
        $this->db->from("tb_masuk");
        $this->db->where("id_masuk",$idMasuk);
        $data = $this->db->get();
        return $data->row_array();
    }

}