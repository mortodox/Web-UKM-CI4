<?= $this->extend('layouts/public_template') ?>
<?= $this->section('content') ?>

<div class="container py-5">
  <h2 class="text-center mb-4">Peta Ekspedisi</h2>

  <div id="map" style="height: 600px;"></div>
</div>

<!-- Leaflet & Omnivore (GPX) -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-omnivore@0.3.4/leaflet-omnivore.min.js"></script>

<script>
  var map = L.map('map').setView([-6.9, 107.6], 6); // zoom awal

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
  }).addTo(map);

  <?php foreach ($kegiatan as $k): ?>
    omnivore.gpx("<?= base_url('uploads/gpx/' . $k['gpx_file']) ?>")
      .on('ready', function () {
        this.bindPopup(`
          <strong><?= esc($k['judul']) ?></strong><br>
          <?= date('d M Y', strtotime($k['tanggal_mulai'])) ?> – <?= date('d M Y', strtotime($k['tanggal_selesai'])) ?><br>
          Lokasi: <?= esc($k['lokasi_gunung']) ?>, <?= esc($k['provinsi']) ?>
        `);
        map.fitBounds(this.getBounds());
      })
      .addTo(map);
  <?php endforeach; ?>
</script>

<?= $this->endSection() ?>
