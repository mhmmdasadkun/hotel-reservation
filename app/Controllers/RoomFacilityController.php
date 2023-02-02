<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RoomFacilityModel;

class RoomFacilityController extends BaseController
{
    protected $rfacility;

    public function __construct()
    {
        $this->rfacility = new RoomFacilityModel();
    }

    public function index()
    {
        $data['title'] = "Daftar Fasilitas Kamar";
        $data['session'] = $this->session;
        $data['facilities'] = $this->rfacility->orderBy('facr_created', 'desc')->findAll();

        return view('room-facilities/list', $data);
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $this->validation->setRules([
                'facr_name.*' => ['label' => 'Nama Fasilitas', 'rules' => 'required|is_unique[room_facilities.facr_name]']
            ]);

            if ($this->validation->withRequest($this->request)->run()) {
                $facr_names = $this->request->getVar('facr_name');

                foreach ($facr_names as $facr_name) {
                    $data = [
                        'facr_name' => $facr_name,
                        'facr_updated' => null
                    ];
                    $this->rfacility->insert($data, false);
                }

                session()->setFlashdata('success', "Kategori berhasil ditambahkan!");
                return redirect()->route('rfacility.list')->withInput();
            }
        }

        $data['title'] = "Tambah Fasilitas Kamar";
        $data['session'] = $this->session;
        $data['validation'] = $this->validation;
        return view('room-facilities/add', $data);
    }

    public function edit($id)
    {
        $data['facility'] = $this->rfacility->where('id', $id)->first();

        if ($this->request->is('post')) {
            (strtolower($data['facility']['facr_name']) == strtolower($this->request->getVar('facr_name')) ? $rules_facr_name = 'required' : $rules_facr_name = 'required|is_unique[room_facilities.facr_name]');

            $this->validation->setRules(['facr_name' => ['label' => 'Nama Fasilitas', 'rules' => $rules_facr_name]]);

            if ($this->validation->withRequest($this->request)->run()) {
                $facr_name = $this->request->getVar('facr_name');
                $data = ['facr_name' => $facr_name];

                if ($this->rfacility->update($id, $data)) {
                    session()->setFlashdata('success', "Kategori berhasil diubah!");
                } else {
                    session()->setFlashdata('danger', "Kategori berhasil diubah!");
                }
                return redirect()->route('rfacility.list')->withInput();
            }
        }

        $data['title'] = "Ubah Fasilitas Kamar";
        $data['session'] = $this->session;
        $data['validation'] = $this->validation;

        return view('room-facilities/edit', $data);
    }

    public function delete($id)
    {
        if ($this->rfacility->delete($id)) {
            session()->setFlashdata('success', "Kategori berhasil dihapus!");
        } else {
            session()->setFlashdata('danger', "Kategori berhasil dihapus!");
        }
        return redirect()->route('rfacility.list');
    }
}
