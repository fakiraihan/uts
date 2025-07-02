# 📚 SDLC Quiz Platform

> **Platform Quiz Online untuk Pembelajaran Software Development Life Cycle (SDLC) dan Keamanan Perangkat Lunak**

![CodeIgniter](https://img.shields.io/badge/CodeIgniter-4.x-red)
![PHP](https://img.shields.io/badge/PHP-8.2+-blue)
![License](https://img.shields.io/badge/License-MIT-green)

## 🎯 **Fitur Utama**

### 🔐 **Multi-Role Login System**
- **Admin Dashboard** - Kelola sistem dan lihat statistik
- **User Dashboard** - Akses quiz dan tracking progress
- **Simple Authentication** - Login cepat tanpa database

### 📝 **Interactive Quiz System**
- **Level 1: Dasar-Dasar SDLC** (5 soal)
- **Level 2: Aplikasi & Analisis SDLC** (5 soal)  
- **Quiz Lengkap** - Gabungan semua level (10 soal)
- **Real-time Progress Tracking**
- **Detailed Result Analysis**

### 🎨 **Modern UI/UX**
- **Materialize CSS Framework**
- **Responsive Design** - Mobile & Desktop friendly
- **Progress Indicators**
- **Grade System** (A-F)
- **Interactive Feedback**

## 🚀 **Quick Start**

### **Prerequisites**
- PHP 8.1+ (Recommended: PHP 8.2+)
- Composer
- Web Server (Apache/Nginx) atau PHP Built-in Server

### **Installation**

1. **Clone Repository**
   ```bash
   git clone https://github.com/yourusername/sdlc-quiz-platform.git
   cd sdlc-quiz-platform
   ```

2. **Install Dependencies**
   ```bash
   composer install
   ```

3. **Environment Setup**
   ```bash
   cp env .env
   ```

4. **Run Development Server**
   ```bash
   php spark serve --host=0.0.0.0 --port=8080
   ```

5. **Access Application**
   - **Homepage:** http://localhost:8080
   - **Admin Login:** http://localhost:8080/login
   - **Start Quiz:** http://localhost:8080/quizzes

## 👤 **Default Credentials**

| Role  | Username | Password  | Access |
|-------|----------|-----------|--------|
| Admin | `admin`  | `admin123` | Full dashboard access |
| User  | `user`   | `user123`  | Quiz & user dashboard |

## 📖 **Quiz Content**

### **Level 1: SDLC Fundamentals**
- Secure Software Development Lifecycle (SSDLC)
- Waterfall vs Agile Methodology
- Project Inspection dalam SDLC
- Security Advisor Role

### **Level 2: Advanced SDLC**
- MVP Development Strategy
- Security Integration in Agile
- Threat Modeling
- DevSecOps Methodology
- Security Champion Role

## 🛠️ **Tech Stack**

- **Backend:** CodeIgniter 4.x
- **Frontend:** Materialize CSS, Vanilla JavaScript
- **Session:** File-based (default)
- **Architecture:** MVC Pattern
- **PHP Version:** 8.2+ (with match expressions)

## 📁 **Project Structure**

```
sdlc-quiz-platform/
├── app/
│   ├── Controllers/
│   │   ├── Auth.php          # Authentication logic
│   │   ├── Quiz.php          # Quiz management
│   │   ├── Dashboard.php     # Admin dashboard
│   │   └── UserDashboard.php # User dashboard
│   ├── Views/
│   │   ├── quiz/            # Quiz interface
│   │   ├── admin/           # Admin views
│   │   └── user/            # User views
│   └── Config/
│       └── Routes.php       # Application routing
├── public/                  # Web root
├── writable/               # Cache, logs, sessions
└── README.md
```

## 🎮 **How to Use**

### **For Students:**
1. Visit homepage
2. Choose quiz level
3. Answer questions
4. Review results and learn from feedback

### **For Instructors/Admins:**
1. Login as admin
2. Access dashboard for overview
3. Monitor quiz usage (extensible)

## 🤝 **Contributing**

1. Fork the repository
2. Create feature branch (`git checkout -b feature/amazing-feature`)
3. Commit changes (`git commit -m 'Add amazing feature'`)
4. Push to branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📝 **License**

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🙏 **Acknowledgments**

- **CodeIgniter Team** - Amazing PHP framework
- **Materialize CSS** - Beautiful material design framework
- **SDLC Community** - Knowledge and best practices

## 📞 **Support**

Jika ada pertanyaan atau issue:
- Open an issue di GitHub
- Dokumentasi: [CodeIgniter 4 Docs](https://codeigniter.com/user_guide/)

---

**⭐ Jika project ini membantu, jangan lupa kasih star ya! ⭐**
