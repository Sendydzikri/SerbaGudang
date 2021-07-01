<?php
class C_Register extends CI_Controller
{ 
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Register');


    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('Supplier/V_Register');
        $this->load->view('footer');
    }

    public function aksi_register()
    {
        $nama_user = $this->input->post('nama_user');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password2 = $this->input->post('password1');

        $cekUsername = $this->M_Register->cekUsername($username);

        if($cekUsername)
        {
            $this->session->set_flashdata('error','Username Sudah Digunakan !');
            return redirect('Supplier/Register');
        }

        if($password != $password2)
        {
            $this->session->set_flashdata('error','kolom password harus sama !');
            return redirect('Supplier/Register');
        }

        $data = array(

            'nama_user' => $nama_user,
            'level' => 0,
            'jabatan' => 'approveSupplier',
            'username' => $username,
            'password' => $password

        );

        $input = $this->M_Register->inputRegister($data);

        if($input)
        {
            $this->session->set_flashdata('success','Register Berhasil mohon tunggu untuk approval admin !');
            return redirect('Login');
        }

         $this->session->set_flashdata('error','Register Gagal !');
         return redirect('Login');

    }

    public function approve($id_user)
    {   
        $data = array(

            'level' => 1,
            'jabatan' => 'supplier',

        );

        $update = $this->M_Register->approve($id_user,$data);
        if($update)
        {
            $this->session->set_flashdata('success','User Sudah di approve !');
            return redirect('Admin/KelolaUser');
        }

            $this->session->set_flashdata('error','Terjadi Kesalahan');
            return redirect('Admin/KelolaUser');
    }

    public function deny($id_user)
    {
        
        $hapus = $this->M_Register->deny($id_user);
        if ($hapus) 
        {
            $this->session->set_flashdata('success','User Sudah di Hapus !');
            return redirect('Admin/KelolaUser');
        }

         $this->session->set_flashdata('error','Terjadi Kesalahan');
        return redirect('Admin/KelolaUser');
    }


    
}