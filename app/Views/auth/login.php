<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login | UKM Bharawana</title>
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/fontawesome-free/css/all.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/css/adminlte.min.css') ?>">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo"><b>UKM</b> Bharawana</div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Silakan login untuk masuk</p>

      <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
      <?php endif; ?>

      <form action="<?= base_url('login/process') ?>" method="post">
        <?= csrf_field() ?>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-lock"></span></div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
      </form>
    </div>
  </div>
</div>

<script src="<?= base_url('assets/adminlte/plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/js/adminlte.min.js') ?>"></script>
</body>
</html>
