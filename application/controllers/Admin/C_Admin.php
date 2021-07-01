<?php
class C_Admin extends CI_Controller
{ 
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Admin');
        $this->load->model('M_Barang');

        $cek = $this->session->userdata('jabatan');
        if($cek != "admin"){
            $this->session->set_flashdata("error","Anda tidak memiliki hak untuk mengakses halaman ini !");
            redirect("Login");
        }


    }

    public function index()
    {
        $data['user'] = $this->M_Admin->hitungJumlahKaryawan();
        $data['barang'] = $this->M_Admin->hitungJumlahBarang();
        $this->load->view('Admin/V_HeaderAdmin');
        $this->load->view('Admin/V_DashboardAdmin', $data);
        $this->load->view('Admin/V_FooterAdmin');
    }

    public function tampilKelolaBarang()
    {
        $data['barang'] = $this->M_Admin->getBarang();
        $this->load->view('Admin/V_HeaderAdmin');
        $this->load->view('Admin/V_KelolaBarang', $data);
        $this->load->view('Admin/V_FooterAdmin');
    }

    public function tampilBarangKeluar(){
        $data['dataBarang'] = $this->M_Admin->getDataBarang();
        $data['barang'] = $this->M_Admin->getBarangKeluar();
        $this->load->view('Admin/V_HeaderAdmin');
        $this->load->view('Admin/V_KelolaBarangKeluar', $data);
        $this->load->view('Admin/V_FooterAdmin');
    }

    public function kelolaUser(){
        $data['user'] = $this->M_Admin->getDataUser();
        $data['approval_user'] = $this->M_Admin->getDataApprovalUser();
        $this->load->view('Admin/V_HeaderAdmin');
        $this->load->view('Admin/V_KelolaUser', $data);
        $this->load->view('Admin/V_FooterAdmin');
    }    

    public function tampilBarangMasuk(){
        $data['barang'] = $this->M_Admin->getBarangMasuk();
        $this->load->view('Admin/V_HeaderAdmin');
        $this->load->view('Admin/V_KelolaBarangMasuk', $data);
        $this->load->view('Admin/V_FooterAdmin');
    }

    public function terimaBarangMasuk($idMasuk){
        
        $dataBarangMasuk = $this->M_Barang->getBarangMasukById($idMasuk);
        $dataBarang  = $this->M_Barang->getBarangById($dataBarangMasuk['kode_barang']);

        $data = array(
            'status_barang' => 1,
        );

        $updateJumlah = $dataBarangMasuk['jumlah_barang'] + $dataBarang['stok_barang'];

        $dataUpdate = array(
            'stok_barang' => $updateJumlah,            
        );

        $updateBarang = $this->M_Barang->updateData($dataBarang['kode_barang'],$dataUpdate);
        $updateMasuk = $this->M_Barang->updateStatusMasuk($idMasuk,$data);

        if($updateBarang && $updateMasuk){
            $this->session->set_flashdata('success','Berhasil Menerima Barang Masuk !');
            return redirect('Admin/KelolaBarangMasuk');
        }
            $this->session->set_flashdata('error','Terjadi Kesalahan !!');
            return redirect('Admin/KelolaBarangMasuk');



    }

    public function tolakBarangMasuk($idMasuk){
        $data = array(
            'status_barang' => 2,
        );
        $updateMasuk = $this->M_Barang->updateStatusMasuk($idMasuk,$data);
        if($updateMasuk){
            $this->session->set_flashdata('success','Berhasil Menolak Barang Masuk !');
            return redirect('Admin/KelolaBarangMasuk');
        }
            $this->session->set_flashdata('error','Terjadi Kesalahan !!');
            return redirect('Admin/KelolaBarangMasuk');
    }

    public function aksi_tambah_user(){

        $password1 = $this->input->post('password1');
        $password2 = $this->input->post('password2');

        if($password1 != $password2){
            $this->session->set_flashdata('error','Mohon Pastikan Password Dengan Password verify Sama');
            return redirect('Admin/KelolaUser');
        }
        $level = $this->input->post('jabatan');
        $jabatan = 0;
        
        if($level == 1){
            $jabatan = "admin";
        }

        if($level == 2){
            $jabatan = "pimpinan";
        }

        if($level == 3){
            $jabatan = "supplier";
        }
        $nama_user = $this->input->post('nama_user');
        $username = $this->input->post('username');

        $data = array (
            'nama_user' => $nama_user,
            'username' => $username,
            'level' => $level,
            'jabatan' => $jabatan,
            'password' => $password1
        );

        $input = $this->M_Admin->inputUser($data);

        if($input){
            $this->session->set_flashdata('success','berhasil menambahkan user');
            return redirect("Admin/KelolaUser");
        }

            $this->session->set_flashdata('error','gagal menambahkan user');
            return redirect("Admin/KelolaUser");

    }



    public function aksi_tambah_barangKeluar(){
        $kode_barang = $this->input->post('kode_barang');
        $jumlah_barang = $this->input->post('jumlah_barang');
        $nama_customer = $this->input->post('nama_customer');

        $dataBarang = $this->M_Barang->getBarangById($kode_barang);

        if($dataBarang['stok_barang'] < $jumlah_barang){
            $this->session->set_flashdata('error','Stok Barang Tidak Cukup ! ' . $dataBarang['nama_barang'] . ' Hanya tersisa ' . $dataBarang['stok_barang']);
            return redirect('Admin/KelolaBarangKeluar');
        }
        $total_harga = $dataBarang['harga_barang'] * $jumlah_barang;
        $sisa_stock = $dataBarang['stok_barang'] - $jumlah_barang;

        $db = array(

            'stok_barang' => $sisa_stock,

        );

        $data = array(

            'kode_barang' => $kode_barang,
            'jumlah_barang' => $jumlah_barang,
            'total_harga' => $total_harga,
            'nama_customer' => $nama_customer,
            'tgl_keluar' => date('Y-m-d')

        );

        $input = $this->M_Admin->addBarangKeluar($data);
        $updateBarang = $this->M_Barang->updateData($kode_barang,$db);
        if($input && $updateBarang){
            $this->session->set_flashdata('success','Berhasil Menambahkan Data Barang Keluar !');
            return redirect('Admin/KelolaBarangKeluar');
        }
            $this->session->set_flashdata('error','Gagal Menambahkan Data Barang Keluar');
            return redirect('Admin/KelolaBarangKeluar');

    }

    public function tampilLaporanKeluar()
    {
        $data['barang_keluar'] = $this->M_Admin->getLaporanKeluar();
        $this->load->view('Admin/V_HeaderAdmin');
        $this->load->view('Admin/V_KelolaLaporan', $data);
        $this->load->view('Admin/V_FooterAdmin');
    }

    public function tampilAboutUs()
    {
        $this->load->view('Admin/V_HeaderAdmin');
        $this->load->view('Admin/V_AboutUs');
        $this->load->view('Admin/V_FooterAdmin');
    }

}