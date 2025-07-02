<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
<nav>
    <div class="nav-wrapper blue">
      <a href="#" class="brand-logo center">Admin Dashboard</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="<?= base_url('admin/quizzes') ?>">Kelola Quiz</a></li>
        <li><a href="<?= base_url('admin/feedback') ?>">Feedback</a></li>
        <li><a href="<?= base_url('logout') ?>">Logout</a></li>
      </ul>
    </div>
</nav>
<div class="container">
    <h4>Selamat datang, Admin!</h4>
    <div class="row">
        <div class="col s12 m6">
            <div class="card blue lighten-4">
                <div class="card-content">
                    <span class="card-title">Kelola Quiz</span>
                    <p>Buat, edit, dan hapus quiz beserta soal-soalnya.</p>
                </div>
                <div class="card-action">
                    <a href="<?= base_url('admin/quizzes') ?>" class="btn blue">Lihat Quiz</a>
                </div>
            </div>
        </div>
        <div class="col s12 m6">
            <div class="card green lighten-4">
                <div class="card-content">
                    <span class="card-title">Feedback User</span>
                    <p>Lihat saran, kritik, dan laporan dari user terkait quiz.</p>
                </div>
                <div class="card-action">
                    <a href="<?= base_url('admin/feedback') ?>" class="btn green">Lihat Feedback</a>
                </div>
            </div>        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
