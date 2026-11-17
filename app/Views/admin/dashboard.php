<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="alert glass-card border-0 shadow-sm p-4 mb-4" style="border-left: 5px solid var(--shopease-green) !important;">
        <h4 class="fw-bold" style="color: #165823;">Selamat datang, Admin <?= esc(session()->get('name')) ?>!</h4>
        <p class="mb-0 text-muted">Di sini kamu memiliki hak akses penuh untuk mengelola Kategori, Produk, dan Laporan toko.</p>
    </div>

    <div class="row mt-4">
        <div class="col-md-4 mb-3">
            <div class="card glass-card border-0 h-100">
                <div class="card-body text-center py-4">
                    <h1 class="display-5 mb-3">📁</h1>
                    <h5 class="card-title fw-bold">Kategori Produk</h5>
                    <p class="card-text text-muted small mb-4">Tambah, edit, dan hapus kategori produk yang dijual.</p>
                    <a href="/admin/categories" class="btn btn-primary w-100 fw-bold">Kelola Kategori</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-3">
            <div class="card glass-card border-0 h-100">
                <div class="card-body text-center py-4">
                    <h1 class="display-5 mb-3">📦</h1>
                    <h5 class="card-title fw-bold">Katalog Produk</h5>
                    <p class="card-text text-muted small mb-4">Tambah, edit, hapus, dan atur stok serta foto produk.</p>
                    <a href="/admin/products" class="btn btn-success w-100 fw-bold">Kelola Produk</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>