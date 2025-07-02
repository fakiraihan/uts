<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Quiz Platform</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            justify-content: center;
        }
        .login-card {
            max-width: 400px;
            margin: 2rem auto;
            padding: 2rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card login-card">
            <div class="card-content">
                <span class="card-title blue-text center-align">Login</span>
                
                <?php if (isset($error)): ?>
                    <div class="red-text center-align"><?= esc($error) ?></div>
                <?php endif; ?>
                  <form action="<?= base_url('login') ?>" method="post">
                    
                    <div class="input-field">
                        <i class="material-icons prefix">person</i>
                        <input id="username" name="username" type="text" class="validate" required>
                        <label for="username">Username</label>
                    </div>
                    
                    <div class="input-field">
                        <i class="material-icons prefix">lock</i>
                        <input id="password" name="password" type="password" class="validate" required>
                        <label for="password">Password</label>
                    </div>
                    
                    <div class="center-align">
                        <button class="waves-effect waves-light btn blue" type="submit">
                            <i class="material-icons left">login</i> Login
                        </button>
                    </div>
                </form>
                  <div class="center-align" style="margin-top: 20px;">
                    <p><small><strong>Admin:</strong> admin / admin123</small></p>
                    <p><small><strong>User:</strong> user / user123</small></p>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
