<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hasil Quiz</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<nav>
    <div class="nav-wrapper teal">
        <a href="#" class="brand-logo center">Hasil Quiz SDLC</a>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content center-align">
                    <h4>Quiz Selesai!</h4>
                    
                    <div class="row">
                        <div class="col s12 m3">
                            <div class="card-panel <?= $grade == 'A' ? 'green' : ($grade == 'B' ? 'blue' : ($grade == 'C' ? 'orange' : ($grade == 'D' ? 'amber' : 'red'))) ?> lighten-2">
                                <h1 class="white-text"><?= $grade ?></h1>
                                <p class="white-text">Grade</p>
                            </div>
                        </div>
                        <div class="col s12 m3">
                            <div class="card-panel blue lighten-2">
                                <h3 class="white-text"><?= $score ?>/<?= $totalQuestions ?></h3>
                                <p class="white-text">Benar</p>
                            </div>
                        </div>
                        <div class="col s12 m3">
                            <div class="card-panel purple lighten-2">
                                <h3 class="white-text"><?= $percentage ?>%</h3>
                                <p class="white-text">Skor</p>
                            </div>
                        </div>
                        <div class="col s12 m3">
                            <div class="card-panel teal lighten-2">
                                <h3 class="white-text"><?= $totalQuestions - $score ?></h3>
                                <p class="white-text">Salah</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col s12">
                            <?php if ($percentage >= 90): ?>
                                <h5 class="green-text">Excellent! Pemahaman Anda sangat baik!</h5>
                                <p>Anda menguasai konsep SDLC dan keamanan dengan sangat baik.</p>
                            <?php elseif ($percentage >= 80): ?>
                                <h5 class="blue-text">Good! Pemahaman Anda baik!</h5>
                                <p>Anda memiliki pemahaman yang solid tentang SDLC dan keamanan.</p>
                            <?php elseif ($percentage >= 70): ?>
                                <h5 class="orange-text">Fair! Masih bisa ditingkatkan!</h5>
                                <p>Anda memiliki pemahaman dasar, namun perlu lebih mempelajari beberapa konsep.</p>
                            <?php elseif ($percentage >= 60): ?>
                                <h5 class="amber-text">Needs Improvement!</h5>
                                <p>Anda perlu mempelajari lebih banyak tentang SDLC dan konsep keamanan.</p>
                            <?php else: ?>
                                <h5 class="red-text">Poor! Perlu belajar lebih banyak!</h5>
                                <p>Disarankan untuk mempelajari kembali materi SDLC dan keamanan perangkat lunak.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col s12 m6">
                            <a href="<?= base_url('quizzes') ?>" class="btn waves-effect waves-light blue">
                                <i class="material-icons left">refresh</i>Coba Lagi
                            </a>
                        </div>
                        <div class="col s12 m6">
                            <a href="<?= base_url('feedback') ?>" class="btn waves-effect waves-light green">
                                <i class="material-icons left">feedback</i>Berikan Feedback
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Detail Jawaban -->
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Review Jawaban</span>
                    
                    <?php foreach ($questions as $index => $question): ?>
                        <?php 
                            $userAnswer = $answers[$index] ?? null;
                            $isCorrect = $userAnswer === $question['correct'];
                        ?>
                        <div class="card-panel <?= $isCorrect ? 'green lighten-4' : 'red lighten-4' ?>">
                            <p><strong>Soal <?= $index + 1 ?>:</strong> <?= esc($question['question']) ?></p>
                            <p><strong>Jawaban Anda:</strong> <?= $userAnswer ? $userAnswer . '. ' . esc($question['options'][$userAnswer]) : 'Tidak dijawab' ?></p>
                            <p><strong>Jawaban Benar:</strong> <?= $question['correct'] ?>. <?= esc($question['options'][$question['correct']]) ?></p>
                            <p class="<?= $isCorrect ? 'green-text' : 'red-text' ?>">
                                <i class="material-icons tiny"><?= $isCorrect ? 'check' : 'close' ?></i>
                                <?= $isCorrect ? 'Benar' : 'Salah' ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
