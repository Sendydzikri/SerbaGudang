<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Register extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->library('encryption');
    }

    public function cekUsername($username)
    {
        $query = $this->db->query("SELECT * FROM tb_user WHERE username='$username' ");
        $cek = $query->num_rows();
        if($cek > 0)
        {
            return true;
        }

        return false;
    }

    public function inputRegister($data)
    {
        return $this->db->insert('tb_user',$data);
    }

    public function approve($id_user,$data)
    {   
        $this->db->where('id_user',$id_user);
        return $this->db->update('tb_user',$data);
    }

    public function deny($id_user)
    {
        $this->db->where('id_user',$id_user);
        return $this->db->delete('tb_user');
    }
}