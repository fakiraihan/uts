<?php

namespace App\Controllers;

use App\Models\QuizModel;
use App\Models\QuestionModel;
use App\Models\OptionModel;
use App\Models\QuizResultModel;

class Quiz extends BaseController
{
    protected $quizModel;
    protected $questionModel;
    protected $optionModel;
    protected $resultModel;

    public function __construct()
    {
        $this->quizModel = new QuizModel();
        $this->questionModel = new QuestionModel();
        $this->optionModel = new OptionModel();
        $this->resultModel = new QuizResultModel();
    }
    
    // Halaman utama yang menampilkan daftar quiz yang tersedia
    public function index()
    {
        $data['quizzes'] = $this->quizModel->getPublishedQuizzes();
        
        // Jika user sudah login, ambil hasil quiz sebelumnya
        if (session()->get('user_id')) {
            $userId = session()->get('user_id');
            $data['user_results'] = $this->resultModel->getUserResults($userId);
        }
        
        return view('quiz/index', $data);
    }
    
    // Tampilkan detail quiz sebelum memulai
    public function details($quizId)
    {
        $data['quiz'] = $this->quizModel->find($quizId);
        
        if (empty($data['quiz'])) {
            return redirect()->to('quizzes')->with('error', 'Quiz not found.');
        }
        
        // Cek apakah user sudah pernah mengambil quiz ini
        if (session()->get('user_id')) {
            $userId = session()->get('user_id');
            $data['previous_result'] = $this->resultModel->getUserQuizResult($userId, $quizId);
        }
        
        return view('quiz/details', $data);
    }
    
    // Mulai mengerjakan quiz
    public function start($quizId)
    {
        $quiz = $this->quizModel->find($quizId);
        
        if (empty($quiz) || $quiz['status'] !== 'published') {
            return redirect()->to('quizzes')->with('error', 'Quiz not available.');
        }
        
        // Siapkan data quiz di session
        $questions = $this->questionModel->getQuestionsByQuiz($quizId);
        session()->set('current_quiz', [
            'quiz_id' => $quizId,
            'questions' => $questions,
            'total_questions' => count($questions),
            'current_question' => 0,
            'answers' => [],
            'start_time' => time()
        ]);
        
        return redirect()->to('quiz/' . $quizId . '/question');
    }
    
    // Tampilkan pertanyaan quiz
    public function question($quizId)
    {
        // Cek apakah ada quiz yang sedang berlangsung
        $currentQuiz = session()->get('current_quiz');
        
        if (empty($currentQuiz) || $currentQuiz['quiz_id'] != $quizId) {
            return redirect()->to('quiz/' . $quizId . '/details')
                           ->with('error', 'Please start the quiz first.');
        }
        
        // Cek apakah quiz sudah selesai
        if ($currentQuiz['current_question'] >= $currentQuiz['total_questions']) {
            return redirect()->to('quiz/' . $quizId . '/finish');
        }
        
        // Ambil pertanyaan saat ini
        $questionIndex = $currentQuiz['current_question'];
        $question = $currentQuiz['questions'][$questionIndex];
        
        // Ambil opsi jawaban
        $options = $this->optionModel->getOptionsByQuestion($question['id']);
        
        $data = [
            'quiz_id' => $quizId,
            'question' => $question,
            'options' => $options,
            'question_number' => $questionIndex + 1,
            'total_questions' => $currentQuiz['total_questions']
        ];
        
        return view('quiz/question', $data);
    }
    
    // Proses jawaban dan tampilkan pertanyaan berikutnya
    public function answer($quizId)
    {
        $currentQuiz = session()->get('current_quiz');
        
        if (empty($currentQuiz) || $currentQuiz['quiz_id'] != $quizId) {
            return redirect()->to('quizzes');
        }
        
        // Simpan jawaban user
        $questionIndex = $currentQuiz['current_question'];
        $question = $currentQuiz['questions'][$questionIndex];
        $selectedOption = $this->request->getPost('option_id');
        
        $currentQuiz['answers'][$question['id']] = $selectedOption;
        $currentQuiz['current_question']++;
        
        session()->set('current_quiz', $currentQuiz);
        
        // Cek apakah sudah pertanyaan terakhir
        if ($currentQuiz['current_question'] >= $currentQuiz['total_questions']) {
            return redirect()->to('quiz/' . $quizId . '/finish');
        }
        
        return redirect()->to('quiz/' . $quizId . '/question');
    }
    
    // Selesaikan quiz dan tampilkan hasil
    public function finish($quizId)
    {
        $currentQuiz = session()->get('current_quiz');
        
        if (empty($currentQuiz) || $currentQuiz['quiz_id'] != $quizId) {
            return redirect()->to('quizzes');
        }
        
        // Hitung score
        $correctAnswers = 0;
        $totalPoints = 0;
        $earnedPoints = 0;
        
        foreach ($currentQuiz['questions'] as $question) {
            $totalPoints += $question['points'];
            
            // Cek apakah jawaban benar
            if (isset($currentQuiz['answers'][$question['id']])) {
                $selectedOption = $currentQuiz['answers'][$question['id']];
                $correctOption = $this->optionModel->getCorrectOption($question['id']);
                
                if ($correctOption && $selectedOption == $correctOption['id']) {
                    $correctAnswers++;
                    $earnedPoints += $question['points'];
                }
            }
        }
        
        // Hitung score dalam persentase
        $score = ($totalPoints > 0) ? round(($earnedPoints / $totalPoints) * 100) : 0;
        
        // Hitung durasi
        $duration = time() - $currentQuiz['start_time'];
        
        // Simpan hasil quiz jika user login
        if (session()->get('user_id')) {
            $userId = session()->get('user_id');
            
            $this->resultModel->insert([
                'user_id' => $userId,
                'quiz_id' => $quizId,
                'score' => $score,
                'total_questions' => $currentQuiz['total_questions'],
                'correct_answers' => $correctAnswers,
                'duration' => $duration,
                'completed_at' => date('Y-m-d H:i:s')
            ]);
        }
        
        // Siapkan data untuk view hasil
        $data = [
            'quiz' => $this->quizModel->find($quizId),
            'score' => $score,
            'total_questions' => $currentQuiz['total_questions'],
            'correct_answers' => $correctAnswers,
            'duration' => $duration,
            'leaderboard' => $this->resultModel->getQuizLeaderboard($quizId, 5)
        ];
        
        // Hapus data quiz dari session
        session()->remove('current_quiz');
        
        return view('quiz/result', $data);
    }
    
    // Tampilkan leaderboard quiz
    public function leaderboard($quizId)
    {
        $data = [
            'quiz' => $this->quizModel->find($quizId),
            'leaderboard' => $this->resultModel->getQuizLeaderboard($quizId, 20)
        ];
        
        return view('quiz/leaderboard', $data);
    }
}
