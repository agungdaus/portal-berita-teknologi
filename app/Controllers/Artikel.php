<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

class Artikel extends BaseController
{
    protected $artikelModel;

    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
    }

    public function index()
    {
        $data['artikel'] = $this->artikelModel->getArtikelWithKategori()
                                              ->orderBy('tanggal_publikasi', 'DESC')
                                              ->paginate(5);
        $data['pager'] = $this->artikelModel->pager;
        $data['title'] = 'Semua Artikel - Berita Teknologi';
        return view('frontend/artikel_list', $data);
    }

    public function detail($id)
    {
        $data['artikel'] = $this->artikelModel->getArtikelWithKategori($id);
        if (!$data['artikel']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $data['title'] = $data['artikel']['judul'] . ' - Berita Teknologi';
        return view('frontend/artikel_detail', $data);
    }

    public function search()
    {
        $keyword = $this->request->getGet('q');
        $data['artikel'] = $this->artikelModel->getArtikelWithKategori()
                                              ->like('judul', $keyword)
                                              ->orLike('isi', $keyword)
                                              ->orderBy('tanggal_publikasi', 'DESC')
                                              ->paginate(5);
        $data['pager'] = $this->artikelModel->pager;
        $data['keyword'] = $keyword;
        $data['title'] = 'Cari: ' . $keyword . ' - Berita Teknologi';
        return view('frontend/artikel_list', $data);
    }
}
