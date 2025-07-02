<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
<nav>
    <div class="nav-wrapper green">
      <a href="#" class="brand-logo center">User Dashboard</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="<?= base_url('quizzes') ?>">Quiz</a></li>
        <li><a href="<?= base_url('logout') ?>">Logout</a></li>
      </ul>
    </div>
</nav>
<div class="container">
    <h4>Selamat datang, User!</h4>
    <div class="row">
        <div class="col s12 m6">
            <div class="card green lighten-4">
                <div class="card-content">
                    <span class="card-title">Ikuti Quiz</span>
                    <p>Ikuti berbagai quiz yang tersedia dan lihat hasil Anda.</p>
                </div>
                <div class="card-action">
                    <a href="<?= base_url('quizzes') ?>" class="btn green">Lihat Quiz</a>
                </div>
            </div>
        </div>
        <div class="col s12 m6">
            <div class="card blue lighten-4">
                <div class="card-content">
                    <span class="card-title">Feedback</span>
                    <p>Berikan saran dan kritik untuk perbaikan platform.</p>
                </div>
                <div class="card-action">
                    <a href="<?= base_url('feedback') ?>" class="btn blue">Kirim Feedback</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
