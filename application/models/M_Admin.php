<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Admin extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->library('encryption');
    }

    public function getUser()
    {
        return $this->db->get("tb_user");
    }

    public function getBarang()
    {
        return $this->db->get("tb_barang");
    }

    public function getDataApprovalUser()
    {
        $query = $this->db->query("SELECT * FROM tb_user WHERE level ='0' ");
        return $query->result_array();
    }

    public function getBarangKeluar(){
        $query = $this->db->query("SELECT *,tb_barang.nama_barang FROM tb_keluar INNER JOIN tb_barang ON tb_keluar.kode_barang = tb_barang.kode_barang ");
        return $query->result_array();
    }

    public function getDataBarang(){

        $data = $this->db->query("SELECT * FROM tb_barang WHERE stok_barang > 0");
        return $data->result_array();
    }

    public function getDataUser(){
        $this->db->select("*");
        $this->db->from("tb_user");
        $data = $this->db->get();
        return $data->result_array();
    }

    public function getBarangMasuk()
    {
        $query = $this->db->query('SELECT *,tb_barang.nama_barang,tb_user.nama_user  FROM tb_masuk INNER JOIN tb_barang ON tb_barang.kode_barang = tb_masuk.kode_barang INNER JOIN tb_user ON tb_masuk.id_user = tb_user.id_user WHERE tb_masuk.status_barang="0" ');
        return $query->result_array();
    }

    // Jumlah user
    public function hitungJumlahKaryawan()
    {
        $query = $this->db->get('tb_user');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    // Jumlah barang
    public function hitungJumlahBarang()
    {
        $query = $this->db->get('tb_barang');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function inputUser($data){
        return $this->db->insert('tb_user',$data);
    }

    public function addBarangKeluar($data){
        return $this->db->insert('tb_keluar',$data);
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
        return $query->result_array();
    }
}