<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Detail Quiz</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
<nav>
    <div class="nav-wrapper teal">
      <a href="#" class="brand-logo center">Quiz Platform</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="<?= base_url('quizzes') ?>">Daftar Quiz</a></li>
        <li><a href="<?= base_url('feedback') ?>">Feedback</a></li>
        <?php if (session()->get('user_id')): ?>
        <li><a href="<?= base_url('logout') ?>">Logout</a></li>
        <?php else: ?>
        <li><a href="<?= base_url('login') ?>">Login</a></li>
        <?php endif; ?>
      </ul>
    </div>
</nav>
<div class="container">
    <h4><?= esc($quiz['title']) ?></h4>
    <p><?= esc($quiz['description']) ?></p>
    <?php if (!empty($previous_result)): ?>
        <div class="card-panel green lighten-4">
            <b>Anda sudah pernah mengerjakan quiz ini.</b><br>
            Skor terakhir: <?= esc($previous_result['score']) ?>%<br>
            <a href="<?= base_url('quiz/'.$quiz['id'].'/finish') ?>" class="btn green">Lihat Hasil</a>
        </div>
    <?php else: ?>
        <a href="<?= base_url('quiz/'.$quiz['id'].'/start') ?>" class="btn teal">Mulai Quiz</a>
    <?php endif; ?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
