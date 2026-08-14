<?= $this->extend('frontend/layout') ?>
<?= $this->section('content') ?>

<div class="hero rounded-3 mb-4 p-5 text-center">
    <h1 class="fw-bold">Berita Teknologi</h1>
    <p class="lead">Portal informasi teknologi terkini</p>
</div>

<h2 class="mb-3">Artikel Terbaru</h2>
<div class="row g-4">
    <?php if (!empty($artikel)): ?>
        <?php foreach ($artikel as $a): ?>
        <div class="col-md-4">
            <div class="card card-article h-100">
                <?php if ($a['gambar']): ?>
                    <img src="/uploads/artikel/<?= esc($a['gambar']) ?>" class="card-img-top" alt="<?= esc($a['judul']) ?>" style="height:200px;object-fit:cover;">
                <?php else: ?>
                    <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center" style="height:200px;">
                        <span class="text-white fs-1">📰</span>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <span class="badge bg-primary mb-2"><?= esc($a['kategori_nama']) ?></span>
                    <h5 class="card-title"><?= esc($a['judul']) ?></h5>
                    <p class="card-text text-muted small"><?= esc($a['penulis']) ?> · <?= date('d M Y', strtotime($a['tanggal_publikasi'])) ?></p>
                </div>
                <div class="card-footer bg-white border-0">
                    <a href="/artikel/<?= $a['id'] ?>" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12"><p class="text-muted">Belum ada artikel.</p></div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
