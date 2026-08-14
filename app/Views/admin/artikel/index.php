<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Manajemen Artikel</h2>
    <a href="/admin/artikel/new" class="btn btn-primary">+ Tambah Artikel</a>
</div>

<form class="row g-2 mb-3" method="get" action="/admin/artikel">
    <div class="col-auto">
        <input type="text" name="q" class="form-control" placeholder="Cari judul/penulis..." value="<?= esc($keyword ?? '') ?>">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-outline-secondary">Cari</button>
        <?php if (!empty($keyword)): ?>
            <a href="/admin/artikel" class="btn btn-outline-danger">Reset</a>
        <?php endif; ?>
    </div>
</form>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Penulis</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($artikel)): ?>
                <?php foreach ($artikel as $i => $a): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= esc($a['judul']) ?></td>
                    <td><span class="badge bg-primary"><?= esc($a['kategori_nama']) ?></span></td>
                    <td><?= esc($a['penulis']) ?></td>
                    <td><?= date('d/m/Y', strtotime($a['tanggal_publikasi'])) ?></td>
                    <td>
                        <a href="/admin/artikel/edit/<?= $a['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/admin/artikel/delete/<?= $a['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus artikel ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="6" class="text-center text-muted">Tidak ada artikel.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
