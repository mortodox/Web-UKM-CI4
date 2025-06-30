<?= $this->extend('layouts/admin_template') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
  <h1 class="mb-4">Edit Artikel</h1>

  <form action="<?= base_url('/artikel/update/' . $artikel['id']) ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label>Judul</label>
      <input type="text" name="judul" class="form-control" value="<?= esc($artikel['judul']) ?>" required>
    </div>

    <div class="form-group">
      <label>Isi</label>
      <textarea name="isi" class="form-control" rows="6" required><?= esc($artikel['isi']) ?></textarea>
    </div>

    <div class="form-group">
      <label>Penulis</label>
      <input type="text" name="penulis" class="form-control" value="<?= esc($artikel['penulis']) ?>" required>
    </div>

    <div class="form-group">
      <label>Tanggal Publikasi</label>
      <input type="date" name="tanggal_publikasi" class="form-control" value="<?= esc($artikel['tanggal_publikasi']) ?>" required>
    </div>

    <div class="form-group">
      <label>Thumbnail Saat Ini</label><br>
      <?php if (!empty($artikel['thumbnail'])): ?>
        <img src="<?= base_url($artikel['thumbnail']) ?>" style="max-width: 150px;">
      <?php else: ?>
        <p><em>Belum ada thumbnail</em></p>
      <?php endif; ?>
      <input type="file" name="thumbnail" class="form-control mt-2">
    </div>

    <div class="form-group">
      <label>Galeri Foto Saat Ini</label><br>
      <?php if (!empty($fotos)): ?>
        <div class="d-flex flex-wrap gap-2">
          <?php foreach ($fotos as $foto): ?>
            <img src="<?= base_url($foto['file_path']) ?>" style="width: 100px; margin: 5px;">
          <?php endforeach ?>
        </div>
      <?php else: ?>
        <p><em>Belum ada foto galeri</em></p>
      <?php endif; ?>
      <input type="file" name="galeri[]" class="form-control mt-2" multiple>
    </div>

    <button type="submit" class="btn btn-danger">Update</button>
    <a href="<?= base_url('/artikel') ?>" class="btn btn-secondary">Kembali</a>
  </form>
</div>

<?= $this->endSection() ?>
