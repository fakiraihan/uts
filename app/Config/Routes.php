<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Halaman beranda -> langsung ke daftar quiz
$routes->get('/', 'Quiz::index');

// Akses langsung tanpa login
$routes->get('/admin', 'Dashboard::index');
$routes->get('/user', 'UserDashboard::index');

// Route untuk form kontak/feedback
$routes->get('feedback', 'Contact::index');
$routes->post('feedback/submit', 'Contact::submit');

// Route untuk autentikasi
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

// Route untuk dashboard - akses langsung atau lewat login
$routes->get('admin/dashboard', 'Dashboard::index');
$routes->get('user/dashboard', 'UserDashboard::index');

// Route untuk User Quiz
$routes->get('quizzes', 'Quiz::index');
$routes->get('quiz/start/(:num)', 'Quiz::start/$1');
$routes->get('quiz/start', 'Quiz::start');
$routes->get('quiz/question', 'Quiz::question');
$routes->post('quiz/answer', 'Quiz::answer');
$routes->get('quiz/result', 'Quiz::result');
$routes->get('quiz/reset', 'Quiz::reset');

// Route untuk Admin Quiz - bypass filter sementara
$routes->group('admin', function($routes) {
    $routes->get('dashboard', 'Dashboard::index');
    
    // CRUD Quiz
    $routes->get('quizzes', 'AdminQuiz::index');
    $routes->get('quiz/create', 'AdminQuiz::create');
    $routes->post('quiz/store', 'AdminQuiz::store');
    $routes->get('quiz/edit/(:num)', 'AdminQuiz::edit/$1');
    $routes->post('quiz/update/(:num)', 'AdminQuiz::update/$1');
    $routes->get('quiz/delete/(:num)', 'AdminQuiz::delete/$1');
    
    // Manage Questions & Options
    $routes->post('quiz/(:num)/question', 'AdminQuiz::addQuestion/$1');
    $routes->get('quiz/(:num)/question/(:num)/options', 'AdminQuiz::editOptions/$1/$2');
    $routes->post('quiz/(:num)/question/(:num)/options', 'AdminQuiz::saveOptions/$1/$2');
    
    // View Feedback
    $routes->get('feedback', 'AdminFeedback::index');
});

