<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Operator Panel - ShopEase') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark glass-nav sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand text-white fw-bold" href="/operator">Operator Panel - ShopEase</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#operatorNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="operatorNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ps-3">
                    <li class="nav-item">
                        <a class="nav-link text-white <?= (uri_string() == 'operator') ? 'active fw-bold' : '' ?>" href="/operator">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Verifikasi Pembayaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Kelola Resi</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <span class="text-white-50 me-3 small">Halo, <?= esc(session()->get('name')) ?>!</span>
                    <form action="<?= site_url('logout') ?>" method="POST" class="m-0">
                        <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <?= $this->renderSection('content') ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>