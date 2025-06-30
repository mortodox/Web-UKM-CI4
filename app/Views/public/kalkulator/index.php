<?= $this->extend('layouts/public_template') ?>
<?= $this->section('content') ?>

<div class="container py-5">
  <h2 class="text-center mb-4">Kalkulator Kebutuhan Kalori</h2>
  <form method="post" action="<?= base_url('kalkulator/hitung') ?>" class="mx-auto" style="max-width: 500px;">
    <div class="form-group">
      <label>Usia (tahun)</label>
      <input type="number" name="usia" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Jenis Kelamin</label>
      <select name="jenis_kelamin" class="form-control" required>
        <option value="pria">Pria</option>
        <option value="wanita">Wanita</option>
      </select>
    </div>
    <div class="form-group">
      <label>Berat Badan (kg)</label>
      <input type="number" name="berat" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Tinggi Badan (cm)</label>
      <input type="number" name="tinggi" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Aktivitas Fisik</label>
      <select name="aktivitas" class="form-control" required>
        <option value="sangat_ringan">Sangat Ringan (tidak olahraga)</option>
        <option value="ringan">Ringan (1–3 hari/minggu)</option>
        <option value="sedang">Sedang (3–5 hari/minggu)</option>
        <option value="berat">Berat (6–7 hari/minggu)</option>
        <option value="sangat_berat">Sangat Berat (dua kali/hari)</option>
      </select>
    </div>
    <button type="submit" class="btn btn-danger btn-block mt-3">Hitung</button>
  </form>

  <?php if (isset($hasil)): ?>
    <div class="alert alert-success mt-4 text-center">
      <strong>Kebutuhan kalori harian kamu: <?= $hasil ?> kkal</strong>
    </div>
  <?php endif; ?>
</div>

<?= $this->endSection() ?>
