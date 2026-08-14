<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Admin Panel') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs5.min.css" rel="stylesheet">
    <style>
        .sidebar { min-height: 100vh; background: #212529; }
        .sidebar a { color: #adb5bd; text-decoration: none; display: block; padding: .75rem 1rem; }
        .sidebar a:hover, .sidebar a.active { color: #fff; background: #343a40; }
    </style>
</head>
<body>
    <div class="d-flex">
        <div class="sidebar" style="width: 250px;">
            <div class="p-3 text-white fw-bold fs-5">🔧 Admin Panel</div>
            <hr class="text-secondary mx-3">
            <a href="/admin/dashboard" class="<?= url_is('admin/dashboard*') ? 'active' : '' ?>">📊 Dashboard</a>
            <a href="/admin/artikel" class="<?= url_is('admin/artikel*') ? 'active' : '' ?>">📝 Artikel</a>
            <hr class="text-secondary mx-3">
            <a href="/admin/logout">🚪 Logout</a>
        </div>
        <div class="flex-grow-1">
            <nav class="navbar navbar-light bg-light px-4 shadow-sm">
                <span class="navbar-text">Halo, <strong><?= esc(session('admin_nama')) ?></strong></span>
                <a href="/" class="btn btn-outline-primary btn-sm" target="_blank">Lihat Website</a>
            </nav>
            <div class="p-4">
                <?php if (session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show">
                        <?= session('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                <?php if (session('errors')): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php foreach (session('errors') as $e): ?>
                                <li><?= esc($e) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <?= $this->renderSection('content') ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs5.min.js"></script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>
