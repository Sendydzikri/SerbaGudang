<?php
class C_Supplier extends CI_Controller
{ 
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Supplier');

        $cek = $this->session->userdata('jabatan');
        if($cek != "supplier"){
            $this->session->set_flashdata("error","Anda tidak memiliki hak untuk mengakses halaman");
            redirect("Login");
        }


    }

    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $data['data_supplier'] = $this->M_Supplier->getData($id_user);
        $data['data_supplierApprove'] = $this->M_Supplier->getDataApprove($id_user);
        $data['kode'] = $this->M_Supplier->getDataBarang();
        $this->load->view('Supplier/V_HeaderSupplier');
        $this->load->view('Supplier/V_DashboardSupplier',$data);
        $this->load->view('Supplier/V_FooterSupplier');
    }

    public function aksi_tambah(){
        $kode_barang = $this->input->post('kode_barang');
        $jumlah_barang = $this->input->post('jumlah');
        $id_user = $this->session->userdata('id_user');
        $data = array(

            'id_user' => $id_user,
            'kode_barang' => $kode_barang,
            'jumlah_barang' => $jumlah_barang,
            'status_barang' => 0

        );

        $input = $this->M_Supplier->inputBarangMasuk($data);
        if($input){
            $this->session->set_flashdata('success','Berhasil Menambahkan Data Barang');
            return redirect('Supplier','refresh');
        }
        
        $this->session->set_flashdata('gagal','Gagal Menambahkan Data !');
        return redirect('Supplier','refresh');


    }

    public function tampilLaporan()
    {
        $id_user = $this->session->userdata('id_user');
        $data['data_supplierApprove'] = $this->M_Supplier->getDataApprove($id_user);
        $data['kode'] = $this->M_Supplier->getDataBarang();
        $this->load->view('Supplier/V_HeaderSupplier');
        $this->load->view('Supplier/V_LaporanSupplier',$data);
        $this->load->view('Supplier/V_FooterSupplier');
    }

    public function register()
    {
        $this->load->view('Supplier/V_HeaderSupplier');
        $this->load->view('Supplier/V_LaporanSupplier',$data);
        $this->load->view('Supplier/V_FooterSupplier');
    }

    
}