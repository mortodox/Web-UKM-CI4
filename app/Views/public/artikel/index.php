<?= $this->extend('layouts/public_template') ?>
<?= $this->section('content') ?>

<div class="container py-5">
  <h2 class="mb-4 text-center">Artikel</h2>

  <div class="row">
    <?php foreach ($artikel as $a): ?>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <?php if ($a['thumbnail']): ?>
            <img src="<?= base_url($a['thumbnail']) ?>" class="card-img-top" alt="Thumbnail">
          <?php endif; ?>
          <div class="card-body">
            <h5 class="card-title"><?= esc($a['judul']) ?></h5>
            <p class="card-text text-muted mb-2">
              Oleh <strong><?= esc($a['penulis']) ?></strong> - <?= date('d M Y', strtotime($a['tanggal_publikasi'])) ?>
            </p>
            <p class="card-text"><?= esc(substr(strip_tags($a['isi']), 0, 100)) ?>...</p>
            <a href="<?= base_url('artikel/' . $a['id']) ?>" class="btn btn-sm btn-primary">Baca Selengkapnya</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?= $this->endSection() ?>
