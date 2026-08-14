<?= $this->extend('frontend/layout') ?>
<?= $this->section('content') ?>

<article>
    <div class="mb-3">
        <a href="/artikel" class="text-decoration-none">&laquo; Kembali ke Semua Artikel</a>
    </div>
    <h1><?= esc($artikel['judul']) ?></h1>
    <p class="text-muted">
        <span class="badge bg-primary"><?= esc($artikel['kategori_nama']) ?></span>
        &middot; <?= esc($artikel['penulis']) ?>
        &middot; <?= date('d M Y', strtotime($artikel['tanggal_publikasi'])) ?>
    </p>
    <?php if ($artikel['gambar']): ?>
        <img src="/uploads/artikel/<?= esc($artikel['gambar']) ?>" class="img-fluid rounded mb-4" alt="<?= esc($artikel['judul']) ?>">
    <?php endif; ?>
    <div class="article-content fs-5 lh-lg">
        <?= $artikel['isi'] ?>
    </div>
</article>

<?= $this->endSection() ?>
