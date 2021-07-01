<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Pimpinan extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->library('encryption');
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