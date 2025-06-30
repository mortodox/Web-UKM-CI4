<?= $this->extend('layouts/admin_template') ?>
<?= $this->section('content') ?>

<div class="container-fluid">


  <h1 class="mb-4">Daftar Artikel</h1>

  <div class="card">
    <div class="card-header">
      <a href="<?= base_url('artikel/create') ?>" class="btn btn-primary">+ Tambah Artikel</a>
    </div>
    <div class="card-body table-responsive p-0">
      <table class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Tanggal</th>
            <th>Views</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach ($artikel as $row): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= esc($row['judul']) ?></td>
              <td><?= esc($row['penulis']) ?></td>
              <td><?= date('d M Y', strtotime($row['tanggal_publikasi'])) ?></td>
              <td><?= esc($row['views']) ?></td>
              <td>
                <a href="<?= base_url('artikel/detail/' . $row['id']) ?>" class="btn btn-info btn-sm">Detail</a>
                <a href="<?= base_url('artikel/edit/' . $row['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="<?= base_url('artikel/delete/' . $row['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>

</div>

<?= $this->endSection() ?>
