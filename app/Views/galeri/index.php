<?= $this->extend('layouts/public_template') ?>
<?= $this->section('content') ?>

<div class="container py-5">
  <h2 class="text-center mb-4">Galeri Kegiatan</h2>

  <div class="row">
    <?php foreach ($galeri as $item): ?>
      <div class="col-md-4 mb-4">
        <div class="card h-100 border-0 shadow-sm">
          <div class="position-relative">
            <img src="<?= esc($item['img']) ?>" class="card-img-top" style="object-fit: cover; height: 250px;" alt="...">
            <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-white bg-dark bg-opacity-75 opacity-0 hover-opacity-100 transition-opacity p-3">
              <h5><?= esc($item['judul']) ?></h5>
              <p class="mb-0"><?= esc($item['lokasi']) ?> - <?= esc($item['tahun']) ?></p>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</div>

<style>
  .overlay {
    opacity: 0;
    transition: 0.3s ease;
  }

  .card:hover .overlay {
    opacity: 1;
  }
</style>

<?= $this->endSection() ?>
