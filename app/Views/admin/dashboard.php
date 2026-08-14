<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<h2>Dashboard</h2>
<hr>
<div class="row g-4">
    <div class="col-md-4">
        <div class="card text-bg-primary">
            <div class="card-body text-center">
                <h1 class="display-4"><?= $jumlah_artikel ?></h1>
                <p class="mb-0">Total Artikel</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-bg-success">
            <div class="card-body text-center">
                <h1 class="display-4"><?= $jumlah_kategori ?></h1>
                <p class="mb-0">Total Kategori</p>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
