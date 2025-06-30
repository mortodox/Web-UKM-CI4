<?= $this->extend('layouts/public_template') ?>
<?= $this->section('content') ?>

<div class="container my-5">
  <h1 class="mb-3"><?= esc($artikel['judul']) ?></h1>
  <p class="text-muted">Ditulis oleh <strong><?= esc($artikel['penulis']) ?></strong> pada <?= date('d M Y', strtotime($artikel['tanggal_publikasi'])) ?> — <?= $artikel['views'] ?> views</p>

  <?php if (!empty($artikel['thumbnail'])): ?>
    <img src="<?= base_url($artikel['thumbnail']) ?>" class="img-fluid mb-4" alt="Thumbnail Artikel">
  <?php endif; ?>

  <div class="artikel-isi mb-5">
    <?= nl2br($artikel['isi']) ?>
  </div>

  <?php if (!empty($fotos)): ?>
  <h4 class="mt-5 mb-3">Galeri Kegiatan</h4>

  <div id="artikelCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <?php foreach ($fotos as $i => $foto): ?>
        <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
          <img src="<?= base_url($foto['file_path']) ?>" class="d-block w-100 rounded" alt="Foto Galeri <?= $i+1 ?>">
        </div>
      <?php endforeach ?>
    </div>
    <a class="carousel-control-prev" href="#artikelCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Sebelumnya</span>
    </a>
    <a class="carousel-control-next" href="#artikelCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Berikutnya</span>
    </a>
  </div>
<?php endif; ?>


  <a href="<?= base_url('/artikel') ?>" class="btn btn-secondary mt-4">← Kembali ke Daftar Artikel</a>
</div>

<?= $this->endSection() ?>
