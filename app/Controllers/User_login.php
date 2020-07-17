<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\User_model;

date_default_timezone_set('Asia/Jakarta');
 
class User_login extends Controller
{
    public function index() {
        $model = new User_model();
        $data['user']  = $model->getUser()->getResult();
        echo view('/User_views', $data);
    }
    public function saveUser() {
        $model = new User_model();
        $now = date('Y-m-d H:i:s');
        $data = array(
            'user_id'        => $this->request->getPost('user_id'),
            'firstname'      => $this->request->getPost('firstname'),
            'lastname'       => $this->request->getPost('lastname'),
            'email'          => $this->request->getPost('email'),
            'password'       => $this->request->getPost('password'),
            'date_create' => $now,
            'date_update' => $now
        );
        $model->saveUser($data);
        return redirect()->to(base_url('User_login'));
    }
    public function updateUser() {
        $model = new User_model();
        $id = $this->request->getPost('user_id');
        $now = date('Y-m-d H:i:s');
        $data = array(
            'user_id'        => $this->request->getPost('user_id'),
            'firstname'      => $this->request->getPost('firstname'),
            'lastname'       => $this->request->getPost('lastname'),
            'email'          => $this->request->getPost('email'),
            'password'       => $this->request->getPost('password'),
            'date_update' => $now
        );
        $model->updateUser($data, $id);
        return redirect()->to(base_url('User_login'));
    }
    public function deleteUser() {
        $model = new User_model();
        $id = $this->request->getPost('user_id');
        $model->deleteUser($id);
        return redirect()->to(base_url('User_login'));
    }
 
}