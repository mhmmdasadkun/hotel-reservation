<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    public function index()
    {
        $data['title'] = "Dashboard";
        $data['session'] = $this->session;
        return view('dashboard', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->route('auth.login');
    }
}
