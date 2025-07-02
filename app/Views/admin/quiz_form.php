<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Buat Quiz Baru</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
<nav>
    <div class="nav-wrapper blue">
      <a href="#" class="brand-logo center">Buat Quiz Baru</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
        <li><a href="<?= base_url('admin/quizzes') ?>">Kelola Quiz</a></li>
        <li><a href="<?= base_url('logout') ?>">Logout</a></li>
      </ul>
    </div>
</nav>
<div class="container">
    <h4>Buat Quiz Baru</h4>
    <?php if (session()->getFlashdata('errors')): ?>
        <div class="card-panel red lighten-4">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form action="<?= base_url('admin/quiz/store') ?>" method="post">
        <?= csrf_field() ?>
        <div class="input-field">
            <input id="title" name="title" type="text" required>
            <label for="title">Judul Quiz</label>
        </div>
        <div class="input-field">
            <textarea id="description" name="description" class="materialize-textarea" required></textarea>
            <label for="description">Deskripsi</label>
        </div>
        <div class="input-field">
            <input id="time_limit" name="time_limit" type="number" min="1">
            <label for="time_limit">Batas Waktu (menit, opsional)</label>
        </div>
        <button type="submit" class="btn blue">Buat Quiz</button>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
