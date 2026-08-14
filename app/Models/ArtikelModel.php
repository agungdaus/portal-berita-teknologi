<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'kategori_id', 'penulis', 'isi', 'gambar', 'tanggal_publikasi'];

    public function getArtikelWithKategori($id = null)
    {
        $builder = $this->select('artikel.*, kategori.nama as kategori_nama')
                        ->join('kategori', 'kategori.id = artikel.kategori_id');

        if ($id) {
            return $builder->find($id);
        }

        return $builder;
    }
}
