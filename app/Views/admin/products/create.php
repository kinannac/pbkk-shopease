<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white">
            <h4 class="mb-0">Tambah Produk Baru</h4>
        </div>
        <div class="card-body">
            
            <?php if(session()->has('error')): ?>
                <div class="alert alert-danger"><?= session('error') ?></div>
            <?php endif; ?>

            <form method="post" action="/admin/products/store" enctype="multipart/form-data">
                <?= csrf_field() ?>
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Produk</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Kategori</label>
                    <select name="category_id" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        <?php foreach ($categories as $c): ?>
                            <option value="<?= $c['id'] ?>"><?= esc($c['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Harga (Rp)</label>
                        <input type="number" name="price" class="form-control" min="0" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Stok</label>
                        <input type="number" name="stock" class="form-control" min="0" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Foto Produk</label>
                    <input type="file" name="image" class="form-control" accept="image/jpeg, image/png, image/webp" required>
                </div>

                <button type="submit" class="btn btn-success">Simpan Produk</button>
                <a href="/admin/products" class="btn btn-secondary">Batal</a>
            </form>

        </div>
    </div>
</div>
<?= $this->endSection() ?>