<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $data['title'] = "Dashboard";
        $data['session'] = $this->session;
    
        return view('dashboard', $data);
    }
}
