<?= $this->extend('layouts/admin_template') ?>

<?= $this->section('content') ?>
<div class="container">
  <h1 class="mb-4">Edit Kegiatan</h1>

  <form action="<?= base_url('kegiatan/update/' . $kegiatan['id']) ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="form-group">
      <label for="judul">Judul</label>
      <input type="text" class="form-control" id="judul" name="judul" value="<?= esc($kegiatan['judul']) ?>" required>
    </div>

    <div class="form-group">
      <label for="deskripsi">Deskripsi</label>
      <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?= esc($kegiatan['deskripsi']) ?></textarea>
    </div>

    <div class="form-group">
      <label for="tanggal_mulai">Tanggal Mulai</label>
      <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="<?= esc($kegiatan['tanggal_mulai']) ?>" required>
    </div>

    <div class="form-group">
      <label for="tanggal_selesai">Tanggal Selesai</label>
      <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="<?= esc($kegiatan['tanggal_selesai']) ?>" required>
    </div>

    <div class="form-group">
      <label for="lokasi_gunung">lokasi_gunung</label>
      <input type="text" class="form-control" id="lokasi_gunung" name="lokasi_gunung" value="<?= esc($kegiatan['lokasi_gunung']) ?>" required>
    </div>

    <div class="form-group">
      <label for="tim_ekspeditor">Tim Ekspeditor</label>
      <input type="text" class="form-control" id="tim_ekspeditor" name="tim_ekspeditor" value="<?= esc($kegiatan['tim_ekspeditor']) ?>">
    </div>

    <div class="form-group">
      <label for="koordinat_puncak">Koordinat Puncak</label>
      <input type="text" class="form-control" id="koordinat_puncak" name="koordinat_puncak" value="<?= esc($kegiatan['koordinat_puncak']) ?>" placeholder="-6.9147, 107.6098">
    </div>

    <div class="form-group">
      <label for="file_gpx">File GPX (biarkan kosong jika tidak ingin mengubah)</label><br>
      <?php if (!empty($kegiatan['file_gpx'])) : ?>
        <small>File saat ini: <?= esc($kegiatan['file_gpx']) ?></small><br>
      <?php endif; ?>
      <input type="file" class="form-control-file" id="file_gpx" name="file_gpx">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="<?= base_url('kegiatan') ?>" class="btn btn-secondary">Kembali</a>
  </form>
</div>
<?= $this->endSection() ?>
