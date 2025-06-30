<?= $this->extend('layouts/admin_template') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

  
<h1 class="mb-4">Dashboard Admin</h1>

  <div class="row">
    <!-- Total Kegiatan -->
    <div class="col-lg-3 col-6">
      <div class="small-box bg-info">
        <div class="inner">
          <h3><?= esc($jumlahKegiatan) ?></h3>
          <p>Total Kegiatan</p>
        </div>
        <div class="icon"><i class="fas fa-calendar-alt"></i></div>
        <a href="<?= base_url('kegiatan') ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- Total User -->
    <div class="col-lg-3 col-6">
      <div class="small-box bg-success">
        <div class="inner">
          <h3><?= esc($jumlahUser) ?></h3>
          <p>Total User</p>
        </div>
        <div class="icon"><i class="fas fa-users"></i></div>
        <a href="<?= base_url('user') ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- Total Artikel -->
    <div class="col-lg-3 col-6">
      <div class="small-box bg-warning">
        <div class="inner">
          <h3><?= esc($jumlahArtikel) ?></h3>
          <p>Total Artikel</p>
        </div>
        <div class="icon"><i class="fas fa-newspaper"></i></div>
        <a href="<?= base_url('artikel') ?>" class="small-box-footer">Kelola Artikel <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- Total Views -->
    <div class="col-lg-3 col-6">
      <div class="small-box bg-danger">
        <div class="inner">
          <h3><?= esc($totalViews) ?></h3>
          <p>Total Views Artikel</p>
        </div>
        <div class="icon"><i class="fas fa-eye"></i></div>
      </div>
    </div>
  </div>

  <!-- Tabel Artikel -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Daftar Artikel Terpopuler</h3>
    </div>
    <div class="card-body table-responsive p-0">
      <table class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Tanggal</th>
            <th>Views</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($daftarArtikel as $artikel): ?>
            <tr>
              <td><?= esc($artikel['judul']) ?></td>
              <td><?= esc($artikel['penulis']) ?></td>
              <td><?= date('d M Y', strtotime($artikel['tanggal_publikasi'])) ?></td>
              <td><?= esc($artikel['views']) ?></td>
              <td>
                <a href="<?= base_url('artikel/detail/' . $artikel['id']) ?>" class="btn btn-info btn-sm">Detail</a>
                <a href="<?= base_url('artikel/edit/' . $artikel['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="<?= base_url('artikel/delete/' . $artikel['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Grafik Views Artikel -->
  <div class="card mt-4">
    <div class="card-header">
      <h3 class="card-title">Grafik Views Artikel</h3>
    </div>
    <div class="card-body">
      <canvas id="viewsChart"></canvas>
    </div>
  </div>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('viewsChart').getContext('2d');
  const viewsChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?= json_encode(array_column($daftarArtikel, 'judul')) ?>,
      datasets: [{
        label: 'Jumlah Views',
        data: <?= json_encode(array_column($daftarArtikel, 'views')) ?>,
        backgroundColor: 'rgba(60,141,188,0.9)'
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            stepSize: 1
          }
        }
      }
    }
  });
</script>

<?= $this->endSection() ?>
