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
        if (session()->get('isLogin') != null) {
            return redirect()->route('dashboard');
        }

        if ($this->request->is('post')) {
            $this->validation->setRules([
                'ad_email' => ['label' => 'Email', 'rules' => 'required|valid_email'],
                'ad_password' => ['label' => 'Password', 'rules' => 'required']
            ]);

            if ($this->validation->withRequest($this->request)->run()) {
                $ad_email = $this->request->getVar('ad_email');
                $ad_password = $this->request->getVar('ad_password');

                $data = $this->admin->getData($ad_email)->getRowArray();

                if ($data && password_verify($ad_password, $data['ad_password'])) {
                    $sessions = [
                        'id' => $data['id'],
                        'role_name' => $data['role_name'],
                        'username' => $data['ad_username'],
                        'email' => $data['ad_email'],
                        'isLogin' => true
                    ];
                    session()->set($sessions);
                    return redirect()->route('dashboard');
                } else {
                    session()->setFlashdata('danger', "Akun tidak terdaftar!");
                    return redirect()->route('auth.login');
                }
            }
        }

        $data['validation'] = $this->validation;
        return view('auth/login', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->route('auth.login');
    }
}
