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


Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
