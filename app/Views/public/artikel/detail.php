<?= $this->extend('layouts/public_template') ?>
<?= $this->section('content') ?>

<div class="container py-5">
  <h2 class="mb-3"><?= esc($artikel['judul']) ?></h2>
  <p class="text-muted mb-2">
    Oleh <strong><?= esc($artikel['penulis']) ?></strong> - <?= date('d M Y', strtotime($artikel['tanggal_publikasi'])) ?> | <?= esc($artikel['views']) ?> views
  </p>

  <?php if ($artikel['thumbnail']): ?>
    <img src="<?= base_url($artikel['thumbnail']) ?>" class="img-fluid rounded mb-4" alt="Thumbnail">
  <?php endif; ?>

  <div class="mb-4"><?= $artikel['isi'] ?></div>

  <?php if (!empty($fotos)): ?>
    <h5>Galeri Foto Terkait</h5>
    <div id="artikelCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php foreach ($fotos as $index => $foto): ?>
          <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
            <img src="<?= base_url($foto['file_path']) ?>" class="d-block w-100" alt="Galeri Foto">
          </div>
        <?php endforeach; ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#artikelCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#artikelCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  <?php endif; ?>

  <a href="<?= base_url('public/artikel') ?>" class="btn btn-secondary">← Kembali ke Daftar Artikel</a>
</div>

<?= $this->endSection() ?>
