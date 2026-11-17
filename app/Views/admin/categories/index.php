<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color: #165823;">Manajemen Kategori</h2>
        <a href="/admin/categories/create" class="btn btn-primary shadow-sm fw-bold px-4">+ Tambah Kategori</a>
    </div>

    <div class="card glass-card border-0 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">No</th>
                            <th>Nama</th>
                            <th>Slug</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($categories)): ?>
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">Belum ada kategori data.</td>
                        </tr>
                        <?php else: ?>
                            <?php foreach ($categories as $i => $item): ?>
                            <tr>
                                <td class="ps-4 fw-semibold"><?= $i + 1 ?></td>
                                <td><?= esc($item['name']) ?></td>
                                <td><span class="badge px-3 py-2" style="background-color: var(--shopease-pink);"><?= esc($item['slug']) ?></span></td>
                                <td class="text-center">
                                    <a href="/admin/categories/edit/<?= $item['id'] ?>" class="btn btn-sm btn-warning text-white fw-bold px-3 me-1">Edit</a>
                                    <a href="/admin/categories/delete/<?= $item['id'] ?>" class="btn btn-sm btn-danger fw-bold px-3" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</a>
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