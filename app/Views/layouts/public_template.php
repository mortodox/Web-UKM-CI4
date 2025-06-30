<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?? 'UKM Bharawana' ?></title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <!-- Bootstrap + Custom -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
      color: #212529;
    }

    .navbar {
      background-color: #003049;
    }

    .navbar-brand,
    .nav-link {
      color: white !important;
    }

    .nav-link:hover {
      color: #f77f00 !important;
    }

    footer {
      background-color: #003049;
      color: white;
      padding: 1rem 0;
      text-align: center;
      margin-top: 2rem;
    }

    .carousel-caption {
      background-color: rgba(0, 0, 0, 0.5);
      padding: 1rem;
      border-radius: 10px;
    }

    .section-title {
      font-weight: 600;
      margin-bottom: 1.5rem;
      color: #003049;
    }

    .bg-section {
      padding: 60px 0;
    }
    .btn-outline-light {
  border-radius: 20px;
  transition: all 0.3s ease;
}

.btn-outline-light:hover {
  background-color: #f77f00;
  color: white;
  border-color: #f77f00;
}

  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand font-weight-bold" href="<?= base_url('/') ?>">
        <img src="<?= base_url('assets/images/logo.svg') ?>" alt="Logo" style="width: 35px; margin-right: 10px;">
        UKM Bharawana
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon" style="color: white;"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav ml-auto">
    <li class="nav-item"><a href="<?= base_url('/') ?>" class="nav-link">Beranda</a></li>
    <li class="nav-item"><a href="<?= base_url('/galeri') ?>" class="nav-link">Galeri</a></li>
    <li class="nav-item"><a href="<?= base_url('/public/artikel') ?>" class="nav-link">Artikel</a></li>
    <li class="nav-item"><a href="<?= base_url('/public/kalkulator') ?>" class="nav-link">Penghitung Kalori</a></li>
    <li class="nav-item"><a href="<?= base_url('/public/peta') ?>" class="nav-link">Peta</a></li>
    <li class="nav-item"><a href="<?= base_url('/public/arsip') ?>" class="nav-link">Arsip</a></li>
    <li class="nav-item"><a href="<?= base_url('/public/tentang') ?>" class="nav-link">Tentang Kami</a></li>
  </ul>
  <a href="<?= base_url('/login') ?>" class="btn btn-outline-light ml-3">Login</a>
</div>

    </div>
  </nav>

  <!-- Main Content -->
  <main>
    <?= $this->renderSection('content') ?>
  </main>

  <!-- Footer -->
  <footer>
    <div class="container">
      <p class="mb-0">© <?= date('Y') ?> UKM Bharawana – UNJANI</p>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
