<?php

namespace App\Controllers;

use App\Models\MasterBarangModel;

class MasterDataController extends BaseController
{
    protected $barangModel;

    public function __construct()
    {
        $this->barangModel = new MasterBarangModel();
    }

    public function index()
    {
        $data = [
            'title' => 'List Barang',
        ];
        return view('barang/index', $data);
    }

    public function getList()
    {
        $request = \Config\Services::request();
        $barang = $this->barangModel->findAll();
        $data = [];

        foreach ($barang as $item) {
            $row = [];
            $row[] = $item['id'];
            $row[] = $item['merk'];
            $row[] = $item['type'];
            $row[] = $item['sn'];
            $row[] = $item['tgl_pembelian'];
            $row[] = $item['tgl_kalibarasi'];
            $row[] = $item['kondisi_alat'];
            $row[] = $item['lokasi'];
            $row[] = '
                <button class="btn btn-warning btn-edit" data-id="' . $item['id'] . '">Edit</button>
                <button class="btn btn-danger btn-delete" onclick="showDeleteConfirmation(' . $item['id'] . ')">Hapus</button>
            ';
            $data[] = $row;
        }

        $output = [
            "data" => $data
        ];

        return $this->response->setJSON($output);
    }

    public function delete($id)
    {
        $this->barangModel->delete($id);
        return redirect()->to('/barang');
    }
}
