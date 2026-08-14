<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

class Home extends BaseController
{
    public function index()
    {
        $model = new ArtikelModel();
        $data['artikel'] = $model->getArtikelWithKategori()
                                 ->orderBy('tanggal_publikasi', 'DESC')
                                 ->findAll(6);
        $data['title'] = 'Beranda - Berita Teknologi';
        return view('frontend/beranda', $data);
    }

    public function tentang()
    {
        $data['title'] = 'Tentang - Berita Teknologi';
        return view('frontend/tentang', $data);
    }
}
