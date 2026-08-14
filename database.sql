-- Buat database
CREATE DATABASE IF NOT EXISTS berita_teknologi;
USE berita_teknologi;

-- Tabel kategori
CREATE TABLE IF NOT EXISTS kategori (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    created_at DATETIME NULL,
    updated_at DATETIME NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabel artikel
CREATE TABLE IF NOT EXISTS artikel (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    kategori_id INT(11) UNSIGNED NOT NULL,
    penulis VARCHAR(100) NOT NULL,
    isi TEXT NOT NULL,
    gambar VARCHAR(255) NULL,
    tanggal_publikasi DATE NOT NULL,
    created_at DATETIME NULL,
    updated_at DATETIME NULL,
    FOREIGN KEY (kategori_id) REFERENCES kategori(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabel admin
CREATE TABLE IF NOT EXISTS admin (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    created_at DATETIME NULL,
    updated_at DATETIME NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed kategori
INSERT INTO kategori (nama, created_at) VALUES
('Gadget', NOW()),
('Software', NOW()),
('Internet', NOW()),
('AI & Machine Learning', NOW()),
('Startup', NOW());

-- Seed admin (password: admin123)
INSERT INTO admin (username, password, nama, created_at) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrator', NOW());

-- Seed artikel
INSERT INTO artikel (judul, kategori_id, penulis, isi, gambar, tanggal_publikasi, created_at) VALUES
('Perkembangan AI di Tahun 2024', 4, 'Admin', '<h2>Revolusi AI</h2><p>Kecerdasan buatan terus berkembang pesat di tahun 2024. Berbagai inovasi muncul dari perusahaan teknologi besar maupun startup.</p><p>Salah satu tren utama adalah <strong>generative AI</strong> yang semakin canggih.</p><ul><li>ChatGPT dan model bahasa besar</li><li>AI untuk coding</li><li>AI untuk desain grafis</li></ul>', NULL, '2024-06-15', NOW()),
('Review Smartphone Terbaru 2024', 1, 'Admin', '<h2>Smartphone Flagship</h2><p>Tahun ini dipenuhi dengan peluncuran smartphone flagship dari berbagai brand.</p><p><strong>Kamera</strong> menjadi fokus utama inovasi.</p>', NULL, '2024-07-01', NOW()),
('Tips Keamanan Internet untuk Pemula', 3, 'Admin', '<h2>Lindungi Data Anda</h2><p>Keamanan di internet sangat penting.</p><ol><li>Gunakan password yang kuat</li><li>Aktifkan autentikasi dua faktor</li><li>Hati-hati dengan phishing</li><li>Update software secara berkala</li></ol>', NULL, '2024-07-10', NOW()),
('Framework PHP Terpopuler untuk Web Development', 2, 'Admin', '<h2>PHP Masih Relevan</h2><p>PHP tetap menjadi bahasa yang paling banyak digunakan untuk web development.</p><ul><li><strong>Laravel</strong></li><li><strong>CodeIgniter</strong></li><li><strong>Symfony</strong></li></ul>', NULL, '2024-07-20', NOW()),
('Startup Teknologi Indonesia yang Mendunia', 5, 'Admin', '<h2>Bangga Indonesia</h2><p>Indonesia memiliki ekosistem startup yang berkembang pesat. Beberapa startup telah berhasil mencapai status <strong>unicorn</strong>.</p>', NULL, '2024-08-01', NOW()),
('Panduan Lengkap Belajar Programming untuk Pemula', 2, 'Admin', '<h2>Mulai dari Mana?</h2><p>Belajar programming bisa terasa overwhelming bagi pemula.</p><h3>Langkah-langkah:</h3><ol><li>Pilih bahasa pemrograman pertama</li><li>Pelajari dasar-dasar logika</li><li>Praktik dengan project kecil</li><li>Bergabung dengan komunitas</li></ol>', NULL, '2024-08-10', NOW());
