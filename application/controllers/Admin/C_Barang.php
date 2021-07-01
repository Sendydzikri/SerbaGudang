<?php
class C_Barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('M_Barang');
    }

    public function aksi_tambah(){
        $nama_barang = $this->input->post('nama_barang');
        $jenis_barang = $this->input->post('jenis');
        $stock_barang = $this->input->post('stock');
        $harga = $this->input->post('harga');
        $status = $this->input->post('status');

        $data = array(
            'nama_barang' => $nama_barang,
            'jenis_barang' => $jenis_barang,
            'stok_barang' => $stock_barang,
            'harga_barang' => $harga,
            'status_barang' => $status
        );

        $input = $this->M_Barang->tambahBarang($data);

        if($input){
            $this->session->set_flashdata('success','Berhasil Menambahkan Data Barang !');
            return redirect('Admin/KelolaBarang','refresh');   
        }

            $this->session->set_flashdata('error','Gagal Menambahkan Data Barang !!');
            return redirect('Admin/KelolaBarang','refresh');           
    }

    public function updateBarang($id)
    {
        $where = array('kode_barang' => $id);
        $data['row'] = $this->M_Barang->updateBarang($where, 'tb_barang')->result();
        $this->load->view("Admin/V_EditBarang", $data);
    }

    public function prosesUpdate($id)
    {
        $namaBarang = $this->input->post('nama_barang');
        $jenisBarang = $this->input->post('jenis_barang');
        $stokBarang = $this->input->post('stok_barang');
        $hargaBarang = $this->input->post('harga_barang');
        $statusBarang = $this->input->post('status_barang');

        $data = array(
            'nama_barang' => $namaBarang,
            'jenis_barang' => $jenisBarang,
            'stok_barang' => $stokBarang,
            'harga_barang' => $hargaBarang,
            'status_barang' => $statusBarang
        );

        if ($this->M_Barang->updateData($id, $data)) {
            redirect("Admin/C_Admin/tampilKelolaBarang");
        } else {
            echo "error";
        }
    }

    public function hapusBarang($id)
    {
        $this->M_Barang->hapusData($id);
        redirect(site_url("Admin/C_Admin/tampilKelolaBarang"));
    }
}