<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Login extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->library('encryption');
    }

    public function checkLogin($username,$password){

        $checkUsername = $this->db->query("SELECT id_user,nama_user,jabatan,level,jabatan FROM tb_user WHERE username='$username' ");
        $hasil = $checkUsername->num_rows();

        if($hasil > 0){
            
            $checkPassword = $this->db->query("SELECT id_user,nama_user,jabatan,level,jabatan,username FROM tb_user WHERE username='$username' AND password ='$password' ");

            $hasil = $checkPassword->num_rows();

            if($hasil > 0){
                $data = $checkPassword->row_array();
                $data['status'] = "ditemukan";
                return $data;                
            }
            $data['status'] = "password";
            return $data;


        }
        $data['status'] = "username";
        return $data;


    }
}