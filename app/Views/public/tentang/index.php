<?= $this->extend('layouts/public_template') ?>
<?= $this->section('content') ?>

<div class="container py-5">
  <div class="row align-items-center">
    <div class="col-md-4 text-center">
      <img src="<?= base_url('assets/images/achyar.jpg') ?>" alt="Foto Achyar"
           class="img-fluid rounded-circle shadow" style="width: 250px; height: 250px; object-fit: cover;">
    </div>
    <div class="col-md-8">
      <h2 class="mb-3">Tentang Kami</h2>
      <p><strong>Nama:</strong> Muhammad Achyar Saputra</p>
      <p><strong>NIM:</strong> 3411211096</p>
      <p><strong>Jurusan:</strong> Informatika</p>
      <p><strong>Fakultas:</strong> Sains dan Informatika</p>
      <p><strong>Universitas:</strong> Jenderal Achmad Yani</p>
      <p><strong>Kelas:</strong> Teknologi Web AIGB</p>
      <p>Halaman ini merupakan bagian dari proyek sistem informasi dokumentasi kegiatan UKM Bharawana.</p>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
