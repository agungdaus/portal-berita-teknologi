<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;
use App\Models\KategoriModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $data['jumlah_artikel'] = (new ArtikelModel())->countAll();
        $data['jumlah_kategori'] = (new KategoriModel())->countAll();
        $data['title'] = 'Dashboard Admin';
        return view('admin/dashboard', $data);
    }
}
