<?php

namespace App\Models;

use CodeIgniter\Model;

class QuizModel extends Model
{
    protected $table = 'quizzes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'description', 'created_by', 'status', 'time_limit'];
    protected $useTimestamps = true;
    
    // Mendapatkan semua quiz yang dipublish (untuk user)
    public function getPublishedQuizzes()
    {
        return $this->where('status', 'published')->findAll();
    }
    
    // Mendapatkan semua quiz (untuk admin)
    public function getAllQuizzes()
    {
        return $this->findAll();
    }
    
    // Mendapatkan quiz berdasarkan ID dengan semua pertanyaannya
    public function getQuizWithQuestions($quizId)
    {
        $quiz = $this->find($quizId);
        
        if ($quiz) {
            $questionModel = new QuestionModel();
            $quiz['questions'] = $questionModel->where('quiz_id', $quizId)->findAll();
            
            // Load opsi jawaban untuk setiap pertanyaan
            $optionModel = new OptionModel();
            foreach ($quiz['questions'] as &$question) {
                $question['options'] = $optionModel->where('question_id', $question['id'])->findAll();
            }
        }
        
        return $quiz;
    }
}
