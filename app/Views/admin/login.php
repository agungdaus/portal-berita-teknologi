<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body p-4">
                        <h3 class="text-center mb-4">🔐 Login Admin</h3>

                        <?php if (session('error')): ?>
                            <div class="alert alert-danger"><?= session('error') ?></div>
                        <?php endif; ?>

                        <form action="/admin/login" method="post">
                            <?= csrf_field() ?>
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                    </div>
                </div>
                <p class="text-center mt-3 text-muted small">Default: admin / admin123</p>
            </div>
        </div>
    </div>
</body>
</html>
