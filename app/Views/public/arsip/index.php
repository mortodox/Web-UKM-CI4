<?= $this->extend('layouts/public_template') ?>
<?= $this->section('content') ?>

<div class="container py-5">
  <h2 class="text-center mb-4">Arsip Perjalanan</h2>

  <div class="row">
    <?php foreach ($kegiatan as $item): ?>
      <div class="col-md-6 mb-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="card-title"><?= esc($item['judul']) ?></h5>
            <p class="card-text mb-1"><strong>Tanggal:</strong> <?= date('d M Y', strtotime($item['tanggal_mulai'])) ?> - <?= date('d M Y', strtotime($item['tanggal_selesai'])) ?></p>
            <p class="card-text mb-1"><strong>Gunung:</strong> <?= esc($item['lokasi_gunung']) ?> (<?= esc($item['provinsi']) ?>)</p>
            <p class="card-text"><?= character_limiter(strip_tags($item['deskripsi']), 120) ?></p>

            <?php if ($item['laporan_kegiatan']): ?>
              <a href="<?= base_url('uploads/laporan/' . $item['laporan_kegiatan']) ?>" class="btn btn-sm btn-outline-primary" target="_blank">
                📄 Lihat Laporan
              </a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?= $this->endSection() ?>
