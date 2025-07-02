<?php

namespace App\Models;

use CodeIgniter\Model;

class OptionModel extends Model
{
    protected $table = 'options';
    protected $primaryKey = 'id';
    protected $allowedFields = ['question_id', 'option_text', 'is_correct'];
    protected $useTimestamps = true;
    
    // Mendapatkan semua opsi untuk pertanyaan tertentu
    public function getOptionsByQuestion($questionId)
    {
        return $this->where('question_id', $questionId)->findAll();
    }
    
    // Mendapatkan jawaban yang benar untuk pertanyaan tertentu
    public function getCorrectOption($questionId)
    {
        return $this->where('question_id', $questionId)
                    ->where('is_correct', 1)
                    ->first();
    }
}
