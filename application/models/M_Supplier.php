<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Supplier extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->library('encryption');
    }

    public function getData($id_user)
    {
        $query = $this->db->query("SELECT *,tb_barang.nama_barang FROM tb_masuk INNER JOIN tb_barang ON tb_masuk.kode_barang = tb_barang.kode_barang WHERE id_user='$id_user' AND tb_masuk.status_barang = '0' ");
        $data = $query->result_array();
        return $data;
    }

    public function getDataApprove($id_user)
    {
        $query = $this->db->query("SELECT *,tb_barang.nama_barang FROM tb_masuk INNER JOIN tb_barang ON tb_masuk.kode_barang = tb_barang.kode_barang WHERE id_user='$id_user' AND tb_masuk.status_barang = '1' ");
        $data = $query->result_array();
        return $data;
    }

    public function inputBarangMasuk($data)
    {   
        return $this->db->insert('tb_masuk',$data);
    }

    public function getDataBarang(){
        $this->db->select("*");
        $this->db->from("tb_barang");
        $data = $this->db->get();
        return $data->result_array();
    }

    public function getLaporanKeluar()
    {
        $query = $this->db->query("
            SELECT *,
            tb_barang.nama_barang,
            (SELECT sum(jumlah_barang) FROM tb_keluar WHERE MONTH(tgl_keluar) = MONTH(CURRENT_DATE()) AND YEAR(tgl_keluar) = YEAR(CURRENT_DATE()) ) as total_jumlah,
            (SELECT sum(total_harga) FROM tb_keluar WHERE MONTH(tgl_keluar) = MONTH(CURRENT_DATE()) AND YEAR(tgl_keluar) = YEAR(CURRENT_DATE()) ) as tot_harga
            FROM tb_keluar
            INNER JOIN tb_barang ON tb_keluar.kode_barang = tb_barang.kode_barang
            WHERE MONTH(tgl_keluar) = MONTH(CURRENT_DATE()) AND YEAR(tgl_keluar) = YEAR(CURRENT_DATE()) ");
       
    }
}