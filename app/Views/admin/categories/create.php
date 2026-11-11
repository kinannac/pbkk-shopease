<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/admin/categories">⚙️ ShopEase Admin</a>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h4 class="mb-0">Tambah Kategori Baru</h4>
                    </div>
                    <div class="card-body">
                        
                        <!-- Menampilkan Error Validasi jika ada -->
                        <?php if(session()->has('errors')): ?>
                            <div class="alert alert-danger">
                                <?php foreach(session('errors') as $error): ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <form method="post" action="/admin/categories/store">
                            <?= csrf_field() ?>
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama Kategori</label>
                                <input type="text" name="name" class="form-control" placeholder="Contoh: Elektronik" required value="<?= old('name') ?>">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">Deskripsi</label>
                                <textarea name="description" class="form-control" rows="3" placeholder="Masukkan deskripsi opsional..."><?= old('description') ?></textarea>
                            </div>
                            
                            <div class="d-flex justify-content-between">
                                <a href="/admin/categories" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-success">Simpan Kategori</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>