<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    
    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">⚙️ ShopEase Admin</a>
            <a class="btn btn-outline-light btn-sm" href="/">Kembali ke Toko</a>
        </div>
    </nav>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Manajemen Kategori</h2>
            <a href="/admin/categories/create" class="btn btn-primary">+ Tambah Kategori</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th class="ps-4">No</th>
                            <th>Nama</th>
                            <th>Slug</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $i => $item): ?>
                        <tr>
                            <td class="ps-4"><?= $i + 1 ?></td>
                            <td><?= esc($item['name']) ?></td>
                            <td><span class="badge bg-secondary"><?= esc($item['slug']) ?></span></td>
                            <td>
                            <a href="/admin/categories/edit/<?= $item['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="/admin/categories/delete/<?= $item['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</a>                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>