<?php
class C_Pimpinan extends CI_Controller
{ 
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Pimpinan');


    }

    public function index()
    {
        $data['barang_keluar'] = $this->M_Pimpinan->getLaporanKeluar();
        $this->load->view('Pimpinan/header');
        $this->load->view('Pimpinan/V_DashboardPimpinan',$data);
        $this->load->view('Pimpinan/footer');
    }



    
}