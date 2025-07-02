<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Quiz Question</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<nav>
    <div class="nav-wrapper teal">
        <a href="#" class="brand-logo center">SDLC Quiz</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="<?= base_url('quiz/reset') ?>">Reset Quiz</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <div class="card-title">
                        Soal <?= $currentIndex ?> dari <?= $totalQuestions ?>
                        <span class="right">Level <?= $question['level'] ?></span>
                    </div>
                    
                    <div class="progress">
                        <div class="determinate" style="width: <?= ($currentIndex / $totalQuestions) * 100 ?>%"></div>
                    </div>
                    
                    <h5><?= esc($question['question']) ?></h5>
                    
                    <form action="<?= base_url('quiz/answer') ?>" method="post">
                        <?= csrf_field() ?>
                        
                        <?php foreach ($question['options'] as $key => $option): ?>
                            <p>
                                <label>
                                    <input name="answer" type="radio" value="<?= $key ?>" required />
                                    <span><strong><?= $key ?>.</strong> <?= esc($option) ?></span>
                                </label>
                            </p>
                        <?php endforeach; ?>
                        
                        <div class="card-action center-align">
                            <button class="btn waves-effect waves-light blue" type="submit">
                                <i class="material-icons left">arrow_forward</i>
                                <?= ($currentIndex == $totalQuestions) ? 'Selesai' : 'Lanjut' ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
