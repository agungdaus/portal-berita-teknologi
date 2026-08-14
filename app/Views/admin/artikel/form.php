<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<?php
$isEdit = isset($artikel);
$action = $isEdit ? '/admin/artikel/update/' . $artikel['id'] : '/admin/artikel/create';
?>

<h2><?= $isEdit ? 'Edit' : 'Tambah' ?> Artikel</h2>
<hr>

<form action="<?= $action ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="mb-3">
        <label class="form-label">Judul <span class="text-danger">*</span></label>
        <input type="text" name="judul" class="form-control" value="<?= old('judul', $isEdit ? $artikel['judul'] : '') ?>" required minlength="10">
        <div class="form-text">Minimal 10 karakter.</div>
    </div>

    <div class="mb-3">
        <label class="form-label">Kategori <span class="text-danger">*</span></label>
        <select name="kategori_id" class="form-select" required>
            <option value="">-- Pilih Kategori --</option>
            <?php foreach ($kategori as $k): ?>
                <option value="<?= $k['id'] ?>" <?= old('kategori_id', $isEdit ? $artikel['kategori_id'] : '') == $k['id'] ? 'selected' : '' ?>>
                    <?= esc($k['nama']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Penulis <span class="text-danger">*</span></label>
        <input type="text" name="penulis" class="form-control" value="<?= old('penulis', $isEdit ? $artikel['penulis'] : '') ?>" required minlength="3">
        <div class="form-text">Minimal 3 karakter.</div>
    </div>

    <div class="mb-3">
        <label class="form-label">Isi Artikel <span class="text-danger">*</span></label>
        <textarea name="isi" id="summernote" class="form-control"><?= old('isi', $isEdit ? $artikel['isi'] : '') ?></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Tanggal Publikasi <span class="text-danger">*</span></label>
        <input type="date" name="tanggal_publikasi" class="form-control" value="<?= old('tanggal_publikasi', $isEdit ? $artikel['tanggal_publikasi'] : date('Y-m-d')) ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Gambar</label>
        <?php if ($isEdit && $artikel['gambar']): ?>
            <div class="mb-2">
                <img src="/uploads/artikel/<?= esc($artikel['gambar']) ?>" alt="" style="max-height:150px;" class="rounded">
            </div>
        <?php endif; ?>
        <input type="file" name="gambar" class="form-control" accept="image/*">
        <div class="form-text">Format: JPG, PNG, WebP. Maks 2MB.</div>
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary"><?= $isEdit ? 'Perbarui' : 'Simpan' ?></button>
        <a href="/admin/artikel" class="btn btn-secondary">Batal</a>
    </div>
</form>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
$(document).ready(function() {
    $('#summernote').summernote({
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline']],
            ['para', ['ul', 'ol']],
            ['insert', ['link', 'picture']],
            ['view', ['codeview']]
        ]
    });
});
</script>
<?= $this->endSection() ?>
