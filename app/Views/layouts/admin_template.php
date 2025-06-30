<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?? 'Dashboard' ?></title>
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/fontawesome-free/css/all.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/css/adminlte.min.css') ?>">

  <style>
    /* Sidebar */
    .main-sidebar {
      background-color: #003049 !important;
      color: white;
    }

    .brand-link {
      padding: 1rem 0;
      justify-content: center;
    }

    .brand-link .brand-image {
      width: 40px;
      height: 40px;
      object-fit: cover;
      border-radius: 50%;
    }

    .nav-sidebar .nav-link {
      color: white !important;
      text-align: center;
    }

    .nav-sidebar .nav-link span {
      display: none;
    }

    .nav-sidebar .nav-link.active {
      background-color: #f77f00 !important;
      color: #003049 !important;
      font-weight: bold;
    }

    .nav-sidebar .nav-link:hover {
      background-color: #ffba08 !important;
      color: #003049 !important;
    }

    /* Card box */
    .small-box.bg-danger {
      background-color: #dc3545 !important;
      color: white;
    }

    /* Button Primary Override */
    .btn-primary {
      background-color: #dc3545;
      border-color: #dc3545;
    }

    .btn-primary:hover {
      background-color: #c82333;
      border-color: #bd2130;
    }

    /* Background page & card */
    body {
      background-color: #f8f9fa;
      color: #212529;
    }

    .card {
      background-color: white;
      border: 1px solid #dee2e6;
    }

    /* Optional Accent (for badge, etc) */
    .badge-accent {
      background-color: #ffc107;
      color: #212529;
    }
    .nav-sidebar .nav-link {
  text-align: left !important;
  justify-content: flex-start !important;
  padding-left: 1rem;
}

.nav-sidebar .nav-link i {
  margin-right: 10px;
}

.nav-sidebar .nav-link p {
  display: inline;
  margin: 0;
}
/* Sembunyikan teks saat sidebar collapse */
.sidebar-collapse .brand-text {
  display: none !important;
}

  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <!-- Sidebar toggle -->
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button">
          <i class="fas fa-bars"></i>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/logout') ?>">Logout</a>
      </li>
    </ul>
  </nav>

  <!-- Sidebar -->
  <aside class="main-sidebar elevation-4">
  <!-- Brand Logo -->
<a href="<?= base_url('dashboard') ?>" class="brand-link d-flex align-items-center">
  <!-- Logo SELALU tampil -->
  <img src="<?= base_url('assets/images/logo.svg') ?>"
       alt="Logo UKM"
       class="brand-image img-circle elevation-3 bg-white p-1"
       style="width: 35px; height: 35px; object-fit: cover;">

  <!-- Teks hanya tampil saat sidebar TIDAK collapse -->
  <span class="brand-text font-weight-bold text-white ml-2">UKM Bharawana<br><small>UNJANI</small></span>
</a>


    <!-- Sidebar Menu -->
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu">
          <li class="nav-item">
            <a href="<?= base_url('/dashboard') ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>Home</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('/kegiatan') ?>" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>Daftar Kegiatan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('/kalender') ?>" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>Kalender</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('/artikel') ?>" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>Artikel</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content -->
  <div class="content-wrapper p-3">
    <?= $this->renderSection('content') ?>
  </div>

  <!-- Footer -->
  <footer class="main-footer text-center">
    <strong>Bharawana &copy; <?= date('Y') ?></strong>
  </footer>

</div>

<!-- Scripts -->
<script src="<?= base_url('assets/adminlte/plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/js/adminlte.min.js') ?>"></script>
</body>
</html>
