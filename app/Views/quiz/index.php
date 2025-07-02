<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SDLC Quiz Platform</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<nav>
    <div class="nav-wrapper teal">
        <a href="#" class="brand-logo center">SDLC Quiz Platform</a>        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="<?= base_url('/admin') ?>">Admin Dashboard</a></li>
            <li><a href="<?= base_url('/user') ?>">User Dashboard</a></li>
            <li><a href="<?= base_url('feedback') ?>">Feedback</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <h3 class="center-align">Quiz SDLC dan Keamanan</h3>
    
    <div class="row">
        <div class="col s12 m6">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Level 1: Dasar-Dasar SDLC</span>
                    <p>Quiz dasar tentang Siklus Hidup Pengembangan Perangkat Lunak dan konsep keamanan fundamental.</p>
                    <p><strong>5 Soal</strong> | Tingkat: Pemula</p>
                </div>
                <div class="card-action">
                    <a href="<?= base_url('quiz/start/1') ?>" class="btn green waves-effect waves-light">
                        <i class="material-icons left">play_arrow</i>Mulai Level 1
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col s12 m6">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Level 2: Aplikasi dan Analisis</span>
                    <p>Quiz lanjutan tentang penerapan metodologi SDLC dan analisis kasus dalam pengembangan perangkat lunak.</p>
                    <p><strong>5 Soal</strong> | Tingkat: Menengah</p>
                </div>
                <div class="card-action">
                    <a href="<?= base_url('quiz/start/2') ?>" class="btn blue waves-effect waves-light">
                        <i class="material-icons left">play_arrow</i>Mulai Level 2
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col s12">
            <div class="card orange lighten-4">
                <div class="card-content">
                    <span class="card-title">Quiz Lengkap</span>
                    <p>Kerjakan semua soal dari Level 1 dan Level 2 dalam satu sesi quiz.</p>
                    <p><strong>10 Soal</strong> | Semua Level</p>
                </div>
                <div class="card-action">
                    <a href="<?= base_url('quiz/start') ?>" class="btn orange waves-effect waves-light">
                        <i class="material-icons left">assignment</i>Mulai Quiz Lengkap
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
