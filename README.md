# 📚 SDLC Quiz Platform - CodeIgniter 4

**Platform quiz interaktif untuk pembelajaran Software Development Life Cycle (SDLC) dan Keamanan Perangkat Lunak**

## 🚀 Features

### 🎯 Quiz System
- **Level 1**: Dasar-Dasar SDLC dan Keamanan (5 soal)
- **Level 2**: Aplikasi dan Analisis SDLC (5 soal)  
- **Quiz Lengkap**: Semua soal dalam satu sesi (10 soal)
- Progress tracking dengan progress bar
- Grading system (A-F) berdasarkan persentase
- Review jawaban lengkap dengan kunci jawaban

### 🔐 Authentication System
- **Admin Dashboard**: Akses penuh untuk manajemen
- **User Dashboard**: Akses user untuk quiz dan feedback
- Simple login dengan session management

### 🎨 Modern UI/UX
- Responsive design dengan Materialize CSS
- Modern card-based layout
- Color-coded feedback (hijau untuk benar, merah untuk salah)

## 🛠️ Tech Stack
- **Framework**: CodeIgniter 4
- **Frontend**: Materialize CSS, HTML5, JavaScript
- **Backend**: PHP 8.2+
- **Session**: File-based session storage

## ⚡ Quick Start

### Installation
1. Clone repository
2. Run `composer install`
3. Copy `env` to `.env`
4. Run `php spark serve --host=0.0.0.0 --port=8080`
5. Access: `http://localhost:8080`

## 👥 Default Credentials
- **Admin**: admin / admin123
- **User**: user / user123

## 📚 Quiz Content
### Level 1: Dasar-Dasar SDLC dan Keamanan
1. Tujuan utama SSDLC
2. Perbedaan Waterfall vs Agile
3. Inspeksi Proyek dalam SDLC
4. Aktivitas bukan bagian Inspeksi Proyek
5. Peran Security Advisor

### Level 2: Aplikasi dan Analisis SDLC
1. Metodologi untuk startup MVP
2. Integrasi keamanan dalam Agile
3. Pemodelan Ancaman (Threat Modeling)
4. Metodologi untuk proyek berisiko tinggi
5. Fungsi Security Champion

---
**Made with ❤️ for Software Engineering Education**

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 8.1 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> [!WARNING]
> - The end of life date for PHP 7.4 was November 28, 2022.
> - The end of life date for PHP 8.0 was November 26, 2023.
> - If you are still using PHP 7.4 or 8.0, you should upgrade immediately.
> - The end of life date for PHP 8.1 will be December 31, 2025.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
