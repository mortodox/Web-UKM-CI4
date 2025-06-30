<?= $this->extend('layouts/public_template') ?>

<?= $this->section('content') ?>

<!-- Hero Carousel -->
<div id="heroCarousel" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?= base_url('assets/images/hero1.jpg') ?>" class="d-block w-100" alt="Petualangan 1" style="height: 500px; object-fit: cover;">
      <div class="carousel-caption d-none d-md-block">
        <h3>Penjelajah Rimba dan Pendaki Gunung Bharawana</h3>
        <p>Ekspedisi Bharawana sebagai bakti untuk negeri.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?= base_url('assets/images/hero2.jpg') ?>" class="d-block w-100" alt="Petualangan 2" style="height: 500px; object-fit: cover;">
      <div class="carousel-caption d-none d-md-block">
        <h3>Petualangan di setiap hembusan nafas</h3>
        <p>Berpetualanglah dengan aman dan nyaman</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  </a>
  <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
  </a>
</div>

<!-- Artikel Terbaru -->
<section class="bg-section">
  <div class="container">
    <h2 class="section-title text-center">Artikel Terbaru</h2>
    <div class="row">
      <?php foreach ($artikel as $a): ?>
        <div class="col-md-4 mb-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title"><?= esc($a['judul']) ?></h5>
              <p class="card-text"><?= substr(strip_tags($a['isi']), 0, 100) ?>...</p>
              <a href="<?= base_url('artikel/detail/' . $a['id']) ?>" class="btn btn-sm btn-primary">Lihat Selengkapnya</a>
            </div>
            <div class="card-footer text-muted small">
              Dipublikasikan oleh <?= esc($a['penulis']) ?> pada <?= date('d M Y', strtotime($a['tanggal_publikasi'])) ?>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
