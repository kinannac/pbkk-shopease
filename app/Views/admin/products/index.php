<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color: #165823;">Manajemen Produk</h2>
        <a href="/admin/products/create" class="btn btn-primary shadow-sm fw-bold px-4">+ Tambah Produk</a>
    </div>

    <div class="card glass-card border-0 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">No</th>
                            <th>Foto</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($products)): ?>
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">Belum ada produk yang tersedia.</td>
                        </tr>
                        <?php else: ?>
                            <?php foreach ($products as $i => $p): ?>
                            <tr>
                                <td class="ps-4 fw-semibold"><?= $i + 1 ?></td>
                                <td>
                                    <img src="<?= base_url('uploads/products/' . esc($p['image'])) ?>" alt="<?= esc($p['name']) ?>" width="45" height="45" class="rounded object-fit-cover shadow-sm bg-white p-1">
                                </td>
                                <td class="fw-bold text-dark"><?= esc($p['name']) ?></td>
                                <td><span class="badge bg-secondary"><?= esc($p['category_name']) ?></span></td>
                                <td class="fw-semibold" style="color: #FF788D;">Rp <?= number_format($p['price'], 0, ',', '.') ?></td>
                                <td><span class="badge bg-success"><?= esc($p['stock']) ?></span></td>
                                <td class="text-center">
                                    <a href="/admin/products/delete/<?= $p['id'] ?>" class="btn btn-sm btn-danger fw-bold px-3" onclick="return confirm('Hapus produk ini?')">Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>