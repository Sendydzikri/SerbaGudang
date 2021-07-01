<?php
class C_Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Login');


    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('V_Login');
        $this->load->view('footer');
    }

    public function checkLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $dataCheck = $this->M_Login->checkLogin($username,$password);

        if($dataCheck['status'] == "ditemukan"){
            if($dataCheck['jabatan'] == "admin"){
                $this->session->set_userdata($dataCheck);
                $this->session->set_flashdata("success","Login Berhasil Halo ,  " . $dataCheck['nama_user'] . ' !' );
                return redirect("Admin");
            }

            if($dataCheck['jabatan'] == "pimpinan"){
                $this->session->set_userdata($dataCheck);
                $this->session->set_flashdata("success","Login Berhasil Halo ,  " . $dataCheck['nama_user'] . ' !');
                return redirect("Pimpinan");
            }

            if($dataCheck['jabatan'] == "supplier"){
                $this->session->set_userdata($dataCheck);
                $this->session->set_flashdata("success","Login Berhasil Halo ,  " . $dataCheck['nama_user'] . ' !');
                return redirect("Supplier");
            }            

            
            $this->session->set_flashdata("error","Akun Anda belum diverifikasi oleh admin");
            return redirect("Login");  
        }


        if($dataCheck['status'] == "password"){
            $this->session->set_flashdata("error","Login Gagal Karena Password Salah");
            return redirect("Admin");
        }

        $this->session->set_flashdata("error","Login Gagal Karena Username Belum Terdaftar");
        return redirect("Admin");


    }

    public function logout()
    {
        $this->session->sess_destroy();
        return redirect('Login','refresh');
    }

}