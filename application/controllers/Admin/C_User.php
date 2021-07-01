<?php
    class C_User extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('M_User');
        }

        public function TampilEdit($id) {
            $where = array('id_user' => $id);
            $data['row'] = $this->M_User->updateUser($where, 'tb_user')->result();
            $this->load->view('Admin/V_EditUser', $data);
            
        }
        
        public function prosesUpdate($id)
        {
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

            $namaUser = $this->input->post('nama_user');
            $Username = $this->input->post('username'); 
            $Password = $this->input->post('password');

            $data = array(
                'nama_user' => $namaUser,
                'username' => $Username,
                'level' => $level,
                'jabatan' => $jabatan,
                'password' => $Password
            );

            if ($this->M_User->updateData($id, $data)) {
                redirect("Admin/C_Admin/kelolaUser");
            } else {
                echo "error";
            }
        }

        public function hapusUser($id) 
        {
            $this->M_User->hapusData($id);
            redirect(site_url("Admin/C_Admin/kelolaUser"));
        }

    }
    

?>