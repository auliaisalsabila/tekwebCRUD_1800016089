<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\user_data;

date_default_timezone_set('Asia/Jakarta');

class User extends BaseController {

    public function index() {
        $data = [
            'title' => 'Form Login',
            'tampil' => 'login',
        ];
        echo view('templates/wrapper', $data);
    }
    public function register() {
        $data = [
            'title' => 'Form Register',
            'tampil' => 'register',
        ];
        echo view('templates/wrapper', $data);
    }
    public function regis() {
        helper(['form','url','date']);

        $userModel = new user_data();
        $now = date('Y-m-d H:i:s');
        $data = [
            'user_id' => $this->request->getPost('user_id'),
            'firstname' => $this->request->getPost('firstname'),
            'lastname' => $this->request->getPost('lastname'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'date_create' => $now,
            'date_update' => $now
        ];
        
        $save = $userModel->insert($data);

        session()->setFlashdata('message', 'Registrasi');

        return redirect()->to(base_url('User'));
    }
}