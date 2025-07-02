<?php

namespace App\Controllers;

class Debug extends BaseController
{
    public function session()
    {
        // Check session directory
        $sessionPath = WRITEPATH . 'session';
        $sessionFiles = glob($sessionPath . '/*');
        $sessionCount = count($sessionFiles) - 1; // Excluding index.html
        
        $info = [
            'session_id' => session_id(),
            'session_data' => session()->get(),
            'session_path' => $sessionPath,
            'session_writable' => is_writable($sessionPath) ? 'Yes' : 'No',
            'session_files_count' => $sessionCount,
            'session_files' => array_slice($sessionFiles, 0, 10), // Show first 10 files
            'cookies' => $_COOKIE,
            'server' => [
                'HTTP_HOST' => $_SERVER['HTTP_HOST'] ?? 'Not set',
                'REQUEST_URI' => $_SERVER['REQUEST_URI'] ?? 'Not set',
                'HTTP_USER_AGENT' => $_SERVER['HTTP_USER_AGENT'] ?? 'Not set',
                'REMOTE_ADDR' => $_SERVER['REMOTE_ADDR'] ?? 'Not set',
                'SERVER_SOFTWARE' => $_SERVER['SERVER_SOFTWARE'] ?? 'Not set',
            ],
            'php_info' => [
                'version' => phpversion(),
                'session.save_path' => ini_get('session.save_path'),
                'session.cookie_path' => ini_get('session.cookie_path'),
                'session.cookie_domain' => ini_get('session.cookie_domain'),
                'session.cookie_secure' => ini_get('session.cookie_secure'),
                'session.cookie_httponly' => ini_get('session.cookie_httponly'),
                'session.cookie_samesite' => ini_get('session.cookie_samesite'),
                'session.use_cookies' => ini_get('session.use_cookies'),
                'session.use_only_cookies' => ini_get('session.use_only_cookies'),
            ]
        ];
        
        // Create test session value
        session()->set('debug_test', 'Session test value at ' . date('Y-m-d H:i:s'));
        
        // Return simple HTML output
        return $this->response->setStatusCode(200)->setBody('
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset="UTF-8">
                <title>Session Debug</title>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
            </head>
            <body>
                <nav>
                    <div class="nav-wrapper teal">
                        <a href="#" class="brand-logo center">Session Debug</a>
                    </div>
                </nav>
                <div class="container">
                    <h4>Session Debug Info</h4>
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Test Session</span>
                            <p><a href="' . site_url('debug/session') . '" class="btn blue">Refresh This Page</a></p>
                            <p><a href="' . site_url('login') . '" class="btn green">Go To Login</a></p>
                            <pre>' . print_r($info, true) . '</pre>
                        </div>
                    </div>
                </div>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            </body>
            </html>
        ');
    }
}
