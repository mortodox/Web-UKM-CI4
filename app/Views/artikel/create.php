<?= $this->extend('layouts/admin_template') ?>
<?= $this->section('content') ?>

<div class="container">
  <h1 class="mb-4">Tambah Artikel</h1>
  <form action="<?= base_url('/artikel/store') ?>" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Judul</label>
    <input type="text" name="judul" class="form-control" required>
  </div>

  <div class="form-group">
    <label>Isi</label>
    <textarea name="isi" class="form-control" rows="5" required></textarea>
  </div>

  <div class="form-group">
    <label>Penulis</label>
    <input type="text" name="penulis" class="form-control" required>
  </div>

  <div class="form-group">
    <label>Thumbnail</label>
    <input type="file" name="thumbnail" class="form-control">
  </div>

  <div class="form-group">
    <label>Galeri Foto (bisa pilih banyak)</label>
    <input type="file" name="galeri[]" class="form-control" multiple>
  </div>

  <button type="submit" class="btn btn-danger">Simpan</button>
</form>
</div>

<?= $this->endSection() ?>
