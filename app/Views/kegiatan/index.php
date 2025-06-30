<?= $this->extend('layouts/admin_template') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

  <h1 class="mb-4">Daftar Kegiatan</h1>

  <div class="card">
    <div class="card-header">
      <a href="<?= base_url('kegiatan/create') ?>" class="btn btn-primary">+ Tambah Kegiatan</a>
    </div>
    <div class="card-body table-responsive p-0">
      <table class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Tanggal</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach ($kegiatan as $item): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= esc($item['judul']) ?></td>
              <td><?= substr(strip_tags($item['deskripsi']), 0, 50) ?>...</td>
              <td><?= date('d M Y', strtotime($item['tanggal_mulai'])) ?> - <?= date('d M Y', strtotime($item['tanggal_selesai'])) ?></td>
              <td>
                <a href="<?= base_url('kegiatan/edit/' . $item['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="<?= base_url('kegiatan/delete/' . $item['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>

</div>

<?= $this->endSection() ?>
