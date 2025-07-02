<?php

namespace App\Controllers;

class Quiz extends BaseController
{
    private $questions = [
        // Level 1: Dasar-Dasar SDLC dan Keamanan
        [
            'id' => 1,
            'level' => 1,
            'question' => 'Apa tujuan utama dari Siklus Hidup Pengembangan Perangkat Lunak yang Aman (Secure Software Development Lifecycle - SSDLC)?',
            'options' => [
                'A' => 'Mengintegrasikan praktik keamanan sejak awal siklus hidup pengembangan.',
                'B' => 'Menambahkan fitur keamanan hanya pada tahap pengujian akhir.',
                'C' => 'Fokus semata-mata pada kecepatan pengiriman perangkat lunak.',
                'D' => 'Mengurangi kebutuhan akan tim keamanan khusus.'
            ],
            'correct' => 'A'
        ],
        [
            'id' => 2,
            'level' => 1,
            'question' => 'Apa perbedaan mendasar antara metodologi Waterfall dan Agile?',
            'options' => [
                'A' => 'Waterfall berfokus pada manajemen risiko, sementara Agile mengabaikannya.',
                'B' => 'Waterfall adalah pendekatan linear dan sekuensial, sedangkan Agile bersifat iteratif dan inkremental.',
                'C' => 'Metodologi agile tidak memerlukan dokumentasi, tidak seperti Waterfall.',
                'D' => 'Hanya model Waterfall yang menyertakan fase pengujian.'
            ],
            'correct' => 'B'
        ],
        [
            'id' => 3,
            'level' => 1,
            'question' => 'Apa tujuan utama dari "Inspeksi Proyek" (Project Inspection) yang dilakukan pada tahap perencanaan SDLC?',
            'options' => [
                'A' => 'Segera mulai menulis kode untuk fitur-fitur utama.',
                'B' => 'Melakukan audit keamanan terakhir sebelum peluncuran produk.',
                'C' => 'Memahami secara mendalam konteks, persyaratan, batasan, dan risiko proyek sebelum memilih metodologi SDLC.',
                'D' => 'Merekrut tim pengembang dan menugaskan peran.'
            ],
            'correct' => 'C'
        ],
        [
            'id' => 4,
            'level' => 1,
            'question' => 'Dalam tahap perencanaan, aktivitas manakah yang BUKAN merupakan bagian dari "Inspeksi Proyek"?',
            'options' => [
                'A' => 'Menulis panduan pengguna akhir.',
                'B' => 'Mengumpulkan dan mendokumentasikan persyaratan fungsional dan non-fungsional.',
                'C' => 'Mewawancarai pemangku kepentingan (stakeholder) untuk memahami kebutuhan mereka.',
                'D' => 'Melakukan penilaian risiko awal untuk mengidentifikasi potensi risiko.'
            ],
            'correct' => 'A'
        ],
        [
            'id' => 5,
            'level' => 1,
            'question' => 'Apa peran kunci dari seorang Penasihat Keamanan (Security Advisor) dalam proses SDLC?',
            'options' => [
                'A' => 'Mengelola anggaran dan jadwal proyek.',
                'B' => 'Menulis semua kode aplikasi.',
                'C' => 'Bertanggung jawab penuh atas semua pengujian jaminan kualitas.',
                'D' => 'Membantu tim dalam menerjemahkan risiko keamanan menjadi tindakan teknis yang dapat diimplementasikan.'
            ],
            'correct' => 'D'
        ],
        // Level 2: Aplikasi dan Analisis SDLC
        [
            'id' => 6,
            'level' => 2,
            'question' => 'Untuk sebuah startup yang mengembangkan Produk Minimum yang Layak (MVP), metodologi mana yang paling direkomendasikan?',
            'options' => [
                'A' => 'Waterfall, karena persyaratannya stabil dan jelas.',
                'B' => 'Agile/DevOps, karena mengakomodasi perubahan dan pengiriman yang cepat.',
                'C' => 'Spiral, karena MVP selalu memiliki risiko keamanan yang sangat tinggi.',
                'D' => 'Kombinasi Waterfall dan Spiral untuk memastikan dokumentasi maksimal.'
            ],
            'correct' => 'B'
        ],
        [
            'id' => 7,
            'level' => 2,
            'question' => 'Bagaimana cara mengintegrasikan keamanan ke dalam metodologi Agile secara efektif?',
            'options' => [
                'A' => 'Dengan menunggu hingga fase penyebaran akhir untuk melakukan satu tes penetrasi tunggal.',
                'B' => 'Dengan menugaskan semua tugas keamanan ke tim terpisah yang tidak berinteraksi dengan pengembang.',
                'C' => 'Dengan memasukkan aktivitas seperti pemodelan ancaman di awal sprint dan pengujian berkelanjutan.',
                'D' => 'Dengan secara ketat mengikuti rencana linear tanpa penyimpangan apa pun.'
            ],
            'correct' => 'C'
        ],
        [
            'id' => 8,
            'level' => 2,
            'question' => 'Apa yang dimaksud dengan "Pemodelan Ancaman" (Threat Modeling) dan pada fase SDLC mana aktivitas ini idealnya diterapkan?',
            'options' => [
                'A' => 'Proses mengidentifikasi ancaman, diterapkan pada fase Desain.',
                'B' => 'Teknik mengelola anggaran proyek, diterapkan pada fase Perencanaan.',
                'C' => 'Nama lain untuk pengujian penetrasi, diterapkan pada fase Pengujian.',
                'D' => 'Proses menambal (patching) perangkat lunak, diterapkan pada fase Pemeliharaan.'
            ],
            'correct' => 'A'
        ],
        [
            'id' => 9,
            'level' => 2,
            'question' => 'Jika sebuah proyek memiliki persyaratan yang tidak stabil, butuh iterasi cepat, namun juga memiliki tingkat risiko teknis dan keamanan yang tinggi, metodologi apa yang paling cocok?',
            'options' => [
                'A' => 'Waterfall',
                'B' => 'Agile murni',
                'C' => 'Campuran Waterfall dan Agile',
                'D' => 'Spiral atau DevSecOps'
            ],
            'correct' => 'D'
        ],
        [
            'id' => 10,
            'level' => 2,
            'question' => 'Apa fungsi spesifik dari seorang "Juara Keamanan" (Security Champion) di dalam sebuah tim pengembang?',
            'options' => [
                'A' => 'Memiliki keputusan akhir atas semua keputusan manajemen proyek.',
                'B' => 'Melakukan semua kegiatan pengujian penetrasi secara eksklusif.',
                'C' => 'Bertindak sebagai jembatan antara tim pengembang dan penasihat keamanan.',
                'D' => 'Menganalisis persyaratan bisnis dan membuat dokumentasi.'
            ],
            'correct' => 'C'
        ]
    ];

    public function index()
    {
        return view('quiz/index', ['questions' => $this->questions]);
    }

    public function start($level = null)
    {
        $filteredQuestions = $this->questions;
        
        if ($level) {
            $filteredQuestions = array_filter($this->questions, function($q) use ($level) {
                return $q['level'] == $level;
            });
        }

        // Reset quiz session
        session()->set('quiz_started', true);
        session()->set('current_question', 0);
        session()->set('quiz_questions', array_values($filteredQuestions));
        session()->set('quiz_answers', []);
        session()->set('quiz_score', 0);

        return redirect()->to('/quiz/question');
    }

    public function question()
    {
        if (!session()->get('quiz_started')) {
            return redirect()->to('/quizzes');
        }

        $questions = session()->get('quiz_questions');
        $currentIndex = session()->get('current_question');

        if ($currentIndex >= count($questions)) {
            return redirect()->to('/quiz/result');
        }

        $question = $questions[$currentIndex];
        $totalQuestions = count($questions);

        return view('quiz/question', [
            'question' => $question,
            'currentIndex' => $currentIndex + 1,
            'totalQuestions' => $totalQuestions
        ]);
    }

    public function answer()
    {
        if (!session()->get('quiz_started')) {
            return redirect()->to('/quizzes');
        }

        $selectedAnswer = $this->request->getPost('answer');
        $questions = session()->get('quiz_questions');
        $currentIndex = session()->get('current_question');
        $answers = session()->get('quiz_answers') ?: [];
        $score = session()->get('quiz_score') ?: 0;

        if ($currentIndex < count($questions)) {
            $question = $questions[$currentIndex];
            $answers[$currentIndex] = $selectedAnswer;

            // Check if answer is correct
            if ($selectedAnswer === $question['correct']) {
                $score++;
            }

            session()->set('quiz_answers', $answers);
            session()->set('quiz_score', $score);
            session()->set('current_question', $currentIndex + 1);
        }

        return redirect()->to('/quiz/question');
    }

    public function result()
    {
        if (!session()->get('quiz_started')) {
            return redirect()->to('/quizzes');
        }

        $questions = session()->get('quiz_questions');
        $answers = session()->get('quiz_answers');
        $score = session()->get('quiz_score');
        $totalQuestions = count($questions);

        // Calculate percentage
        $percentage = ($score / $totalQuestions) * 100;

        // Determine grade
        $grade = 'F';
        if ($percentage >= 90) $grade = 'A';
        elseif ($percentage >= 80) $grade = 'B';
        elseif ($percentage >= 70) $grade = 'C';
        elseif ($percentage >= 60) $grade = 'D';

        return view('quiz/result', [
            'score' => $score,
            'totalQuestions' => $totalQuestions,
            'percentage' => round($percentage, 1),
            'grade' => $grade,
            'questions' => $questions,
            'answers' => $answers
        ]);
    }

    public function reset()
    {
        session()->remove('quiz_started');
        session()->remove('current_question');
        session()->remove('quiz_questions');
        session()->remove('quiz_answers');
        session()->remove('quiz_score');

        return redirect()->to('/quizzes');
    }
}
