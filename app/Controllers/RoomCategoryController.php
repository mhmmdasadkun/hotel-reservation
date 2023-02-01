<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RoomCategoryModel;

class RoomCategoryController extends BaseController
{
    protected $rcategory;

    public function __construct()
    {
        $this->rcategory = new RoomCategoryModel();
    }

    public function index()
    {
        $data['title'] = "Daftar Kategori Kamar";
        $data['session'] = $this->session;
        $data['categories'] = $this->rcategory->orderBy('catr_created', 'desc')->findAll();

        return view('room-categories/list', $data);
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $this->validation->setRules([
                'catr_name' => ['label' => 'Nama Kategori', 'rules' => 'required|is_unique[room_categories.catr_name]']
            ]);

            if ($this->validation->withRequest($this->request)->run()) {
                $catr_name = $this->request->getVar('catr_name');
                $catr_slug = url_title($catr_name, '-', true);

                $data = [
                    'catr_name' => $catr_name,
                    'catr_slug' => $catr_slug,
                    'catr_updated' => null,
                ];

                if ($this->rcategory->insert($data, false)) {
                    session()->setFlashdata('success', "Kategori berhasil ditambahkan!");
                } else {
                    session()->setFlashdata('danger', "Kategori gagal ditambahkan!");
                }
                return redirect()->route('rcategory.list')->withInput();
            }
        }

        $data['title'] = "Tambah Kategori Kamar";
        $data['session'] = $this->session;
        $data['validation'] = $this->validation;

        return view('room-categories/add', $data);
    }

    public function edit($id)
    {
        $data['category'] = $this->rcategory->where('id', $id)->first();

        if ($this->request->is('post')) {
            (strtolower($data['category']['catr_name']) == strtolower($this->request->getVar('catr_name')) ? $catr_name_rule = 'required' : $catr_name_rule = 'required|is_unique[room_categories.catr_name]');

            $this->validation->setRules(['catr_name' => ['label' => 'Nama Kategori', 'rules' => $catr_name_rule]]);

            if ($this->validation->withRequest($this->request)->run()) {
                $catr_name = $this->request->getVar('catr_name');
                $catr_slug = url_title($catr_name, '-', true);

                $data = [
                    'catr_name' => $catr_name,
                    'catr_slug' => $catr_slug
                ];

                if ($this->rcategory->update($id, $data)) {
                    session()->setFlashdata('success', "Kategori berhasil diubah!");
                } else {
                    session()->setFlashdata('danger', "Kategori gagal diubah!");
                }
                return redirect()->route('rcategory.list')->withInput();
            }
        }

        $data['title'] = "Ubah Kategori Kamar";
        $data['session'] = $this->session;
        $data['validation'] = $this->validation;

        return view('room-categories/edit', $data);
    }

    public function delete($id)
    {
        if ($this->rcategory->delete($id)) {
            session()->setFlashdata('success', "Kategori berhasil dihapus!");
        } else {
            session()->setFlashdata('danger', "Kategori gagal dihapus!");
        }
        return redirect()->route('rcategory.list');
    }
}
