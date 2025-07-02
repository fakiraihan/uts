<?php

namespace App\Models;

use CodeIgniter\Model;

class QuizResultModel extends Model
{
    protected $table = 'quiz_results';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'quiz_id', 'score', 'total_questions', 'correct_answers', 'duration', 'completed_at'];
    protected $useTimestamps = true;
    
    // Mendapatkan semua hasil quiz dari user tertentu
    public function getUserResults($userId)
    {
        return $this->where('user_id', $userId)
                    ->orderBy('completed_at', 'DESC')
                    ->findAll();
    }
    
    // Mendapatkan hasil quiz tertentu dari user
    public function getUserQuizResult($userId, $quizId)
    {
        return $this->where('user_id', $userId)
                    ->where('quiz_id', $quizId)
                    ->first();
    }
    
    // Mendapatkan peringkat user berdasarkan score
    public function getQuizLeaderboard($quizId, $limit = 10)
    {
        return $this->select('quiz_results.*, users.username')
                    ->where('quiz_id', $quizId)
                    ->join('users', 'users.id = quiz_results.user_id')
                    ->orderBy('score', 'DESC')
                    ->orderBy('duration', 'ASC')  // Jika score sama, yang lebih cepat lebih tinggi
                    ->limit($limit)
                    ->findAll();
    }
}
