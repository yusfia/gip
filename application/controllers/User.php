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
        header('Content-Type: application/json');
        $data = [
            'message' => 'berhasil input'
        ];
        echo json_encode($data);
    }

    public function show()
    {
        $data['users'] = $this->model->get_all_data($this->table);
        $this->load->view('user_show', $data);
    }

    public function get_all_users()
    {
        $data = $this->model->get_all_data($this->table);
        header('Content-Type: application/json');
        echo json_encode($data->result());
    }

    public function delete($id = NULL){
        $data = $this->model->delete_data($this->table, ['id' => $id]);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function count_on_name(){

        $countYus = $this->name_counting('yus');
        $countHaf = $this->name_counting('haf');
        $countAris = $this->name_counting('aris');
        $output = [
            'key' => ['yus','haf', 'aris'],
            'value' => [$countYus, $countHaf, $countAris],
            'message' => 'sukses'
        ];
        header('Content-Type: application/json');
        echo json_encode($output);
    }

    private function name_counting($name){
        $data = $this->model->searchByName($name);
        $query_result = $data->result_array();
        $num=count($query_result);
        return $num;
    }

}
