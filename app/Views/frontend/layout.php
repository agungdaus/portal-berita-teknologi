<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Berita Teknologi') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero { background: linear-gradient(135deg, #0d6efd, #6610f2); color: white; padding: 3rem 0; }
        .card-article:hover { transform: translateY(-3px); transition: .2s; box-shadow: 0 4px 15px rgba(0,0,0,.1); }
        footer { background: #212529; color: #adb5bd; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">🔬 Berita Teknologi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="/artikel">Semua Artikel</a></li>
                    <li class="nav-item"><a class="nav-link" href="/tentang">Tentang</a></li>
                </ul>
                <form class="d-flex" action="/search" method="get">
                    <input class="form-control me-2" type="search" name="q" placeholder="Cari artikel..." value="<?= esc($keyword ?? '') ?>">
                    <button class="btn btn-outline-light" type="submit">Cari</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            <?= $this->renderSection('content') ?>
        </div>
    </main>

    <footer class="py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">&copy; <?= date('Y') ?> Berita Teknologi. UAS Pemrograman Web.</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
