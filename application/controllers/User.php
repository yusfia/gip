<?php
class User extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel', 'model');
        $this->table = 'user';
    }

    public function add()
    {
        $this->load->view('user_add');
    }

    public function save()
    {
        if (isset($_POST['kirim'])) {
            $email = $this->input->post('email');
            $pass = $this->input->post('password');
            $nama = $this->input->post('nama');

            //untuk cek apakah email, password, dan nama sudah terisi
            if ($email and $pass and $nama) {
                //untuk cek apakah password lebih dari 6 karakter
                if (strlen($pass) > 6) {
                    $data = [
                        'email' => $email,
                        'password' => $pass,
                        'nama' => $nama
                    ];

                    $this->model->insert_data($this->table, $data);
                }
            }
            redirect('user/add');
        }
    }

}
