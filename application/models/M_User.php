<?php defined('BASEPATH') or exit('No direct script access allowed');

    class M_User extends CI_Model {

        public function __construct()
        {
            $this->load->database();
            $this->load->library('encryption');
        }

        public function get()
        {
            return $this->db->get("tb_barang");
        }

        public function updateUser($where, $table) 
        {
            return $this->db->get_where($table, $where);
        }

        public function updateData($id_user, $data)
        {
            $this->db->where('id_user', $id_user);
            return $this->db->update('tb_user', $data);
        }

        public function hapusData($id)
        {
            $this->db->where('id_user', $id);
            return $this->db->delete('tb_user');
        }

    }
?>