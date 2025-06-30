<?= $this->extend('layouts/admin_template') ?>

<?= $this->section('content') ?>
<div class="container">
  <h2>Tambah Kegiatan</h2>

  <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>

  <form action="<?= base_url('/kegiatan/store') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="form-group">
      <label>Judul Kegiatan</label>
      <input type="text" name="judul" class="form-control" required>
    </div>

    <div class="form-group">
      <label>Deskripsi</label>
      <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
    </div>

    <div class="form-group">
      <label>Tanggal Mulai</label>
      <input type="date" name="tanggal_mulai" class="form-control" required>
    </div>

    <div class="form-group">
      <label>Tanggal Selesai</label>
      <input type="date" name="tanggal_selesai" class="form-control">
    </div>

    <div class="form-group">
      <label>Nama Gunung / Lokasi</label>
      <input type="text" name="lokasi_gunung" class="form-control" required>
    </div>

    <div class="form-group">
      <label>Provinsi</label>
      <input type="text" name="provinsi" class="form-control">
    </div>

    <div class="form-group">
      <label>Koordinat Puncak (contoh: -7.1234, 110.1234)</label>
      <input type="text" name="koordinat_puncak" class="form-control">
    </div>

    <div class="form-group">
      <label>Tim Ekspeditor</label>
      <textarea name="tim_ekspeditor" class="form-control" placeholder="Nama-nama anggota, bisa dipisah koma" rows="3"></textarea>
    </div>

    <div class="form-group">
      <label>Upload File GPX</label>
      <input type="file" name="gpx_file" class="form-control-file" accept=".gpx">
    </div>

    <div class="form-group">
      <label>Upload Laporan Kegiatan (PDF)</label>
      <input type="file" name="laporan_kegiatan" class="form-control-file" accept=".pdf">
    </div>

    <div class="form-group">
      <label>Dibuat Oleh</label>
      <input type="text" name="dibuat_oleh" class="form-control" value="<?= session()->get('user_name') ?>" readonly>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>
</div>
<?= $this->endSection() ?>
