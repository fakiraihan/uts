<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table = 'contacts';
    protected $allowedFields = ['name', 'email', 'message', 'feedback_type', 'related_quiz'];
    protected $useTimestamps = true;
    
    // Bisa tambahkan method untuk get feedback berdasarkan tipe
    public function getFeedbackByType($type)
    {
        return $this->where('feedback_type', $type)->findAll();
    }
    
    // Method untuk mengambil semua feedback terkait quiz tertentu
    public function getFeedbackByQuiz($quizName)
    {
        return $this->like('related_quiz', $quizName)->findAll();
    }
}
