<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'ShopEase Online Store') ?></title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS Terpisah -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

    <!-- Navbar dengan Glassmorphism Hijau -->
    <nav class="navbar navbar-expand-lg navbar-dark glass-nav sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-white" href="/">🛍️ ShopEase</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="/">Home</a>
                    </li>
                    
                    <?php if(session()->get('isLoggedIn')): ?>
                        <li class="nav-item ms-3 text-white-50">
                            Halo, <strong class="text-white"><?= esc(session()->get('name')) ?></strong> (<?= esc(session()->get('role')) ?>)
                        </li>
                        <li class="nav-item ms-2">
                            <form action="<?= site_url('logout') ?>" method="POST" class="d-inline">
                                <button type="submit" class="btn btn-sm btn-outline-light">Logout</button>
                            </form>
                        </li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link text-white" href="/login">Login</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="/register">Register</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section dengan Glassmorphism -->
    <div class="container mt-5">
        <div class="p-5 text-center hero-glass shadow-sm">
            <h1 class="display-4 fw-bold mb-3" style="color: #165823;">Selamat Datang di ShopEase</h1>
            <p class="lead text-secondary mb-4">Belanja online mudah, aman, dan berestetika.</p>
            
            <?php if(session()->get('isLoggedIn')): ?>
                <?php if(session()->get('role') === 'admin'): ?>
                    <a href="/admin" class="btn btn-success btn-lg shadow-sm px-4">Masuk ke Admin Panel</a>
                <?php elseif(session()->get('role') === 'operator'): ?>
                    <a href="/operator" class="btn btn-success btn-lg shadow-sm px-4">Masuk ke Operator Panel</a>
                <?php else: ?>
                    <a href="#katalog" class="btn btn-primary btn-lg shadow-sm px-4">Mulai Belanja</a>
                <?php endif; ?>
            <?php else: ?>
                <a href="/login" class="btn btn-primary btn-lg shadow-sm px-4">Login untuk Mulai</a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Katalog Produk Dinamis dengan Glass Cards -->
    <section id="katalog" class="container mt-5 pt-3 mb-5">
        <h3 class="fw-bold mb-4 pb-2" style="color: #165823; border-bottom: 2px solid #FF788D;">Produk Terbaru</h3>
        
        <div class="row g-4">
            <?php if (empty($products)): ?>
                <div class="col-12 text-center py-5">
                    <p class="text-muted fs-5">Belum ada produk yang tersedia saat ini.</p>
                </div>
            <?php else: ?>
                <?php foreach ($products as $p): ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card h-100 border-0 glass-card">
                        <img src="<?= base_url('uploads/products/' . esc($p['image'])) ?>" class="card-img-top p-3 bg-transparent" alt="<?= esc($p['name']) ?>" style="height: 200px; object-fit: contain;">
                        
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fs-6 fw-bold mb-2 text-truncate text-dark"><?= esc($p['name']) ?></h5>
                            <p class="text-muted small mb-2 text-truncate"><?= esc($p['description']) ?></p>
                            
                            <h5 class="fw-bold mb-3 mt-auto" style="color: #FF788D;">Rp <?= number_format($p['price'], 0, ',', '.') ?></h5>
                            <span class="text-muted small mb-3">Stok: <strong><?= esc($p['stock']) ?></strong></span>

                            <div class="d-grid gap-2">
                                <a href="#" class="btn btn-outline-success btn-sm fw-bold">Detail</a>
                                <form action="/cart/add" method="POST" class="m-0">
                                    <input type="hidden" name="product_id" value="<?= $p['id'] ?>">
                                    <button type="submit" class="btn btn-primary btn-sm w-100 fw-bold"> Keranjang</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>

</body>
</html>