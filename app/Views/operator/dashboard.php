<?= $this->extend('operator/layout/template') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="alert glass-card border-0 shadow-sm p-4 mb-4" style="border-left: 5px solid var(--shopease-green) !important;">
        <h4 class="fw-bold" style="color: #165823;">Selamat datang, Operator <?= esc(session()->get('name')) ?>!</h4>
        <p class="mb-0 text-muted">Panel ini digunakan untuk memverifikasi pembayaran *customer*, memproses pesanan, dan menginput nomor resi pengiriman.</p>
    </div>

    <div class="row g-4">
        <div class="col-md-6 mb-3">
            <div class="card glass-card border-0 h-100">
                <div class="card-body text-center py-5">
                    <h1 class="display-5 mb-3">💳</h1>
                    <h5 class="card-title fw-bold">Verifikasi Pembayaran</h5>
                    <p class="card-text text-muted small mb-4">Cek bukti transfer dan setujui pembayaran pesanan masuk.</p>
                    <button class="btn btn-primary px-4 fw-bold" disabled>Segera Hadir</button>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 mb-3">
            <div class="card glass-card border-0 h-100">
                <div class="card-body text-center py-5">
                    <h1 class="display-5 mb-3">🚚</h1>
                    <h5 class="card-title fw-bold">Pengiriman & Resi</h5>
                    <p class="card-text text-muted small mb-4">Masukkan nomor resi kurir untuk pesanan yang dikemas.</p>
                    <button class="btn btn-success px-4 fw-bold" disabled>Segera Hadir</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>