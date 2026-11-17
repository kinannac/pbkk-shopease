<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi ShopEase</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS Terpisah -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body class="py-5">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card glass-card shadow-lg border-0 p-3">
                <div class="card-header bg-transparent border-0 text-center pt-4">
                    <h3 class="fw-bold" style="color: #165823;">🛍️ ShopEase</h3>
                    <p class="text-muted mb-0">Buat Akun Pelanggan Baru</p>
                </div>
                <div class="card-body p-4">
                    <?php if (isset($validation)): ?>
                        <div class="alert alert-danger">
                            <?= $validation->listErrors() ?>
                        </div>
                    <?php endif; ?>
                    <form action="<?= site_url('register') ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control bg-light" value="<?= old('name') ?>" placeholder="Nama lengkap" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" class="form-control bg-light" value="<?= old('email') ?>" placeholder="nama@email.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nomor Telepon</label>
                            <input type="text" name="phone" class="form-control bg-light" value="<?= old('phone') ?>" placeholder="08xxxxxxxxxx">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Alamat</label>
                            <textarea name="address" class="form-control bg-light" rows="2" placeholder="Alamat lengkap..."><?= old('address') ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password</label>
                            <input type="password" name="password" class="form-control bg-light" placeholder="Minimal 8 karakter" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Konfirmasi Password</label>
                            <input type="password" name="password_confirm" class="form-control bg-light" placeholder="Ulangi password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2 fw-bold shadow-sm">Daftar Sekarang</button>
                    </form>
                    <hr class="my-4 text-muted">
                    <p class="text-center mb-0 small text-muted">
                        Sudah punya akun? <a href="<?= site_url('login') ?>" class="fw-bold text-decoration-none" style="color: #FF788D;">Login di sini</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>