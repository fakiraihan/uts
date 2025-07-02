<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Leaderboard Quiz</title>
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
    <h4>Leaderboard: <?= esc($quiz['title']) ?></h4>
    <table class="striped">
        <thead>
            <tr>
                <th>Peringkat</th>
                <th>Username</th>
                <th>Skor</th>
                <th>Benar</th>
                <th>Waktu (detik)</th>
            </tr>
        </thead>
        <tbody>
            <?php $rank = 1; foreach ($leaderboard as $row): ?>
            <tr>
                <td><?= $rank++ ?></td>
                <td><?= esc($row['username']) ?></td>
                <td><?= esc($row['score']) ?>%</td>
                <td><?= esc($row['correct_answers']) ?></td>
                <td><?= esc($row['duration']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?= base_url('quizzes') ?>" class="btn grey">Kembali ke Daftar Quiz</a>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
