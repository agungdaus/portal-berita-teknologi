<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;
use App\Models\KategoriModel;

class Artikel extends BaseController
{
    protected $artikelModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('q');
        $builder = $this->artikelModel->getArtikelWithKategori();

        if ($keyword) {
            $builder->like('judul', $keyword)->orLike('penulis', $keyword);
        }

        $data['artikel'] = $builder->orderBy('artikel.created_at', 'DESC')->findAll();
        $data['keyword'] = $keyword;
        $data['title'] = 'Manajemen Artikel';
        return view('admin/artikel/index', $data);
    }

    public function new()
    {
        $data['kategori'] = $this->kategoriModel->findAll();
        $data['title'] = 'Tambah Artikel';
        return view('admin/artikel/form', $data);
    }

    public function create()
    {
        $rules = [
            'judul'       => 'required|min_length[10]',
            'kategori_id' => 'required|numeric',
            'penulis'     => 'required|min_length[3]',
            'isi'         => 'required',
            'tanggal_publikasi' => 'required|valid_date',
            'gambar'      => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png,image/webp]',
        ];

        $messages = [
            'judul' => [
                'required'   => 'Judul wajib diisi.',
                'min_length' => 'Judul minimal 10 karakter.',
            ],
            'kategori_id' => [
                'required' => 'Kategori wajib dipilih.',
            ],
            'penulis' => [
                'required'   => 'Penulis wajib diisi.',
                'min_length' => 'Penulis minimal 3 karakter.',
            ],
            'isi' => [
                'required' => 'Isi artikel wajib diisi.',
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $gambar = $this->request->getFile('gambar');
        $namaGambar = null;
        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $namaGambar = $gambar->getRandomName();
            $gambar->move('uploads/artikel', $namaGambar);
        }

        $this->artikelModel->save([
            'judul'              => $this->request->getPost('judul'),
            'kategori_id'        => $this->request->getPost('kategori_id'),
            'penulis'            => $this->request->getPost('penulis'),
            'isi'                => $this->request->getPost('isi'),
            'gambar'             => $namaGambar,
            'tanggal_publikasi'  => $this->request->getPost('tanggal_publikasi'),
        ]);

        return redirect()->to('/admin/artikel')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['artikel'] = $this->artikelModel->find($id);
        if (!$data['artikel']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $data['kategori'] = $this->kategoriModel->findAll();
        $data['title'] = 'Edit Artikel';
        return view('admin/artikel/form', $data);
    }

    public function update($id)
    {
        $rules = [
            'judul'       => 'required|min_length[10]',
            'kategori_id' => 'required|numeric',
            'penulis'     => 'required|min_length[3]',
            'isi'         => 'required',
            'tanggal_publikasi' => 'required|valid_date',
            'gambar'      => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png,image/webp]',
        ];

        $messages = [
            'judul' => [
                'required'   => 'Judul wajib diisi.',
                'min_length' => 'Judul minimal 10 karakter.',
            ],
            'kategori_id' => [
                'required' => 'Kategori wajib dipilih.',
            ],
            'penulis' => [
                'required'   => 'Penulis wajib diisi.',
                'min_length' => 'Penulis minimal 3 karakter.',
            ],
            'isi' => [
                'required' => 'Isi artikel wajib diisi.',
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $gambar = $this->request->getFile('gambar');
        $data = [
            'judul'              => $this->request->getPost('judul'),
            'kategori_id'        => $this->request->getPost('kategori_id'),
            'penulis'            => $this->request->getPost('penulis'),
            'isi'                => $this->request->getPost('isi'),
            'tanggal_publikasi'  => $this->request->getPost('tanggal_publikasi'),
        ];

        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            // Delete old image
            $oldArtikel = $this->artikelModel->find($id);
            if ($oldArtikel['gambar'] && file_exists('uploads/artikel/' . $oldArtikel['gambar'])) {
                unlink('uploads/artikel/' . $oldArtikel['gambar']);
            }
            $namaGambar = $gambar->getRandomName();
            $gambar->move('uploads/artikel', $namaGambar);
            $data['gambar'] = $namaGambar;
        }

        $this->artikelModel->update($id, $data);
        return redirect()->to('/admin/artikel')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function delete($id)
    {
        $artikel = $this->artikelModel->find($id);
        if ($artikel && $artikel['gambar'] && file_exists('uploads/artikel/' . $artikel['gambar'])) {
            unlink('uploads/artikel/' . $artikel['gambar']);
        }
        $this->artikelModel->delete($id);
        return redirect()->to('/admin/artikel')->with('success', 'Artikel berhasil dihapus.');
    }
}
