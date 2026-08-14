<?= $this->extend('frontend/layout') ?>
<?= $this->section('content') ?>

<h2 class="mb-3">
    <?php if (!empty($keyword)): ?>
        Hasil Pencarian: "<?= esc($keyword) ?>"
    <?php else: ?>
        Semua Artikel
    <?php endif; ?>
</h2>

<?php if (!empty($artikel)): ?>
    <?php foreach ($artikel as $a): ?>
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-3">
                <?php if ($a['gambar']): ?>
                    <img src="/uploads/artikel/<?= esc($a['gambar']) ?>" class="img-fluid rounded-start h-100" style="object-fit:cover;" alt="<?= esc($a['judul']) ?>">
                <?php else: ?>
                    <div class="bg-secondary d-flex align-items-center justify-content-center h-100 rounded-start" style="min-height:150px;">
                        <span class="text-white fs-1">📰</span>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-9">
                <div class="card-body">
                    <span class="badge bg-primary"><?= esc($a['kategori_nama']) ?></span>
                    <h5 class="card-title mt-1"><?= esc($a['judul']) ?></h5>
                    <p class="card-text text-muted small"><?= esc($a['penulis']) ?> · <?= date('d M Y', strtotime($a['tanggal_publikasi'])) ?></p>
                    <p class="card-text"><?= mb_substr(strip_tags($a['isi']), 0, 150) ?>...</p>
                    <a href="/artikel/<?= $a['id'] ?>" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <?= $pager->links('default', 'bootstrap_pagination') ?>
<?php else: ?>
    <p class="text-muted">Tidak ada artikel ditemukan.</p>
<?php endif; ?>

<?= $this->endSection() ?>
