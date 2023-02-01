<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RoomController extends BaseController
{
    public function index()
    {
        $data['title'] = "Daftar Kamar";
        $data['session'] = $this->session;
        return view('rooms/list', $data);
    }
    
    public function add()
    {
        $data['title'] = "Tambah Kamar";
        $data['session'] = $this->session;
        return view('rooms/add', $data);
    }
}
