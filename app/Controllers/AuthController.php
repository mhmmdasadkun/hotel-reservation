<?php

namespace App\Controllers;

use App\Models\AdminModel;

class AuthController extends BaseController
{
    protected $admin;

    public function __construct()
    {
        $this->admin = new AdminModel();
    }

    public function index()
    {
        if ($this->request->is('get')) {
            $data['validation'] = $this->validation;
            return view('auth/login', $data);
        }

        $this->validation->setRules([
            'email' => ['label' => 'Email', 'rules' => 'required|valid_email'],
            'password' => ['label' => 'Password', 'rules' => 'required']
        ]);

        if (!$this->validation->withRequest($this->request)->run()) {
            $data['validation'] = $this->validation;
            return view('auth/login', $data);
        } else {
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');

            $data = $this->admin->where('email', $email)->first();

            if ($data && password_verify($password, $data['password'])) {
                $sessions = [
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'isLogin' => true
                ];
                session()->set($sessions);
                return redirect()->route('admin.dashboard');
            } else {
                session()->setFlashdata('danger', "Akun tidak terdaftar!");
                return redirect()->route('auth.login');
            }
        }
    }
}
