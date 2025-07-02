<?php

namespace App\Models;

use CodeIgniter\Model;

class QuestionModel extends Model
{
    protected $table = 'questions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['quiz_id', 'question_text', 'points', 'question_type'];
    protected $useTimestamps = true;
    
    // Mendapatkan semua pertanyaan dari quiz tertentu
    public function getQuestionsByQuiz($quizId)
    {
        return $this->where('quiz_id', $quizId)->findAll();
    }
    
    // Mendapatkan pertanyaan dengan opsi jawabannya
    public function getQuestionWithOptions($questionId)
    {
        $question = $this->find($questionId);
        
        if ($question) {
            $optionModel = new OptionModel();
            $question['options'] = $optionModel->where('question_id', $questionId)->findAll();
        }
        
        return $question;
    }
}
