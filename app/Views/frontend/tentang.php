<?= $this->extend('frontend/layout') ?>
<?= $this->section('content') ?>

<h1>Tentang Kami</h1>
<hr>
<div class="row">
    <div class="col-md-8">
        <p class="fs-5">
            <strong>Berita Teknologi</strong> adalah portal informasi yang menyajikan berita dan artikel seputar dunia teknologi terkini.
        </p>
        <p>
            Website ini dibuat sebagai proyek Ujian Akhir Semester (UAS) mata kuliah Pemrograman Web menggunakan framework <strong>CodeIgniter 4</strong>.
        </p>
        <h4>Fitur Website:</h4>
        <ul>
            <li>Halaman admin untuk mengelola artikel</li>
            <li>Rich text editor untuk penulisan artikel</li>
            <li>Sistem kategori artikel</li>
            <li>Pencarian artikel</li>
            <li>Pagination</li>
            <li>Responsif dengan Bootstrap 5</li>
            <li>CSRF Protection</li>
        </ul>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title">Teknologi yang Digunakan</h5>
                <ul class="list-unstyled">
                    <li>PHP 8.1+</li>
                    <li>CodeIgniter 4</li>
                    <li>MySQL</li>
                    <li>Bootstrap 5</li>
                    <li>Summernote Editor</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
