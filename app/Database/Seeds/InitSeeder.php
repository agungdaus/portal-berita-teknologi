<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InitSeeder extends Seeder
{
    public function run()
    {
        // Admin default
        $this->db->table('admin')->insert([
            'username'   => 'admin',
            'password'   => password_hash('admin123', PASSWORD_DEFAULT),
            'nama'       => 'Administrator',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        // Kategori
        $kategori = ['Gadget', 'Software', 'Internet', 'AI & Machine Learning', 'Startup'];
        foreach ($kategori as $k) {
            $this->db->table('kategori')->insert([
                'nama'       => $k,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }

        // Sample artikel
        $articles = [
            ['judul' => 'Perkembangan AI di Tahun 2024', 'kategori_id' => 4, 'penulis' => 'Admin', 'isi' => '<h2>Revolusi AI</h2><p>Kecerdasan buatan terus berkembang pesat di tahun 2024. Berbagai inovasi muncul dari perusahaan teknologi besar maupun startup.</p><p>Salah satu tren utama adalah <strong>generative AI</strong> yang semakin canggih dan dapat digunakan untuk berbagai keperluan.</p><ul><li>ChatGPT dan model bahasa besar</li><li>AI untuk coding</li><li>AI untuk desain grafis</li></ul>', 'gambar' => null, 'tanggal_publikasi' => '2024-06-15'],
            ['judul' => 'Review Smartphone Terbaru 2024', 'kategori_id' => 1, 'penulis' => 'Admin', 'isi' => '<h2>Smartphone Flagship</h2><p>Tahun ini dipenuhi dengan peluncuran smartphone flagship dari berbagai brand. Berikut adalah review singkat dari beberapa yang paling menarik.</p><p><strong>Kamera</strong> menjadi fokus utama inovasi, dengan sensor yang semakin besar dan kemampuan computational photography.</p>', 'gambar' => null, 'tanggal_publikasi' => '2024-07-01'],
            ['judul' => 'Tips Keamanan Internet untuk Pemula', 'kategori_id' => 3, 'penulis' => 'Admin', 'isi' => '<h2>Lindungi Data Anda</h2><p>Keamanan di internet sangat penting di era digital ini. Berikut beberapa tips yang bisa Anda terapkan:</p><ol><li>Gunakan password yang kuat</li><li>Aktifkan autentikasi dua faktor</li><li>Hati-hati dengan phishing</li><li>Update software secara berkala</li></ol>', 'gambar' => null, 'tanggal_publikasi' => '2024-07-10'],
            ['judul' => 'Framework PHP Terpopuler untuk Web Development', 'kategori_id' => 2, 'penulis' => 'Admin', 'isi' => '<h2>PHP Masih Relevan</h2><p>Meskipun banyak bahasa pemrograman baru bermunculan, PHP tetap menjadi salah satu bahasa yang paling banyak digunakan untuk web development.</p><p>Beberapa framework populer:</p><ul><li><strong>Laravel</strong> - Full-featured framework</li><li><strong>CodeIgniter</strong> - Lightweight dan cepat</li><li><strong>Symfony</strong> - Enterprise-grade</li></ul>', 'gambar' => null, 'tanggal_publikasi' => '2024-07-20'],
            ['judul' => 'Startup Teknologi Indonesia yang Mendunia', 'kategori_id' => 5, 'penulis' => 'Admin', 'isi' => '<h2>Bangga Indonesia</h2><p>Indonesia memiliki ekosistem startup yang berkembang pesat. Beberapa startup telah berhasil mencapai status <strong>unicorn</strong> dan bahkan <em>decacorn</em>.</p><p>Keberhasilan ini tidak lepas dari populasi digital yang besar dan adopsi teknologi yang cepat.</p>', 'gambar' => null, 'tanggal_publikasi' => '2024-08-01'],
            ['judul' => 'Panduan Lengkap Belajar Programming untuk Pemula', 'kategori_id' => 2, 'penulis' => 'Admin', 'isi' => '<h2>Mulai dari Mana?</h2><p>Belajar programming bisa terasa overwhelming bagi pemula. Artikel ini akan membantu Anda memulai perjalanan coding.</p><h3>Langkah-langkah:</h3><ol><li>Pilih bahasa pemrograman pertama</li><li>Pelajari dasar-dasar logika</li><li>Praktik dengan project kecil</li><li>Bergabung dengan komunitas</li></ol>', 'gambar' => null, 'tanggal_publikasi' => '2024-08-10'],
        ];

        foreach ($articles as $a) {
            $a['created_at'] = date('Y-m-d H:i:s');
            $this->db->table('artikel')->insert($a);
        }
    }
}
