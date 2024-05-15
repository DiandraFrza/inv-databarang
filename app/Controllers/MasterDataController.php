<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MasterBarangModel;

class MasterDataController extends BaseController
{
    protected $masterBarangModel;

    public function __construct()
    {
        $this->masterBarangModel = new MasterBarangModel();
    }

    public function index()
    {
        $data = [
            'title' => 'List Barang',
            'barang' => $this->masterBarangModel->findAll()
        ];

        return view('barang/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Barang';
        return view('barang/create', $data);
    }

    public function store()
    {
        $this->masterBarangModel->save([
            'merk' => $this->request->getPost('merk'),
            'type' => $this->request->getPost('type'),
            'sn' => $this->request->getPost('sn'),
            'tgl_pembelian' => $this->request->getPost('tgl_pembelian'),
            'tgl_kalibarasi' => $this->request->getPost('tgl_kalibarasi'),
            'kondisi_alat' => $this->request->getPost('kondisi_alat'),
            'lokasi' => $this->request->getPost('lokasi'),
        ]);

        return redirect()->to('/barang');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Barang';
        $data['barang'] = $this->masterBarangModel->find($id);
        return view('barang/edit', $data);
    }

    public function update($id)
    {
        $this->masterBarangModel->update($id, [
            'merk' => $this->request->getPost('merk'),
            'type' => $this->request->getPost('type'),
            'sn' => $this->request->getPost('sn'),
            'tgl_pembelian' => $this->request->getPost('tgl_pembelian'),
            'tgl_kalibarasi' => $this->request->getPost('tgl_kalibarasi'),
            'kondisi_alat' => $this->request->getPost('kondisi_alat'),
            'lokasi' => $this->request->getPost('lokasi'),
        ]);

        return redirect()->to('/barang');
    }

    public function delete($id)
    {
        $this->masterBarangModel->delete($id);
        return redirect()->to('/barang');
    }
}
