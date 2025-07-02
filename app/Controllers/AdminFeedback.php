<?php

namespace App\Controllers;

use App\Models\ContactModel;

class AdminFeedback extends BaseController
{
    protected $contactModel;

    public function __construct()
    {
        $this->contactModel = new ContactModel();
    }
    
    // Tampilkan semua feedback
    public function index()
    {
        $data = [
            'title' => 'Feedback Management',
            'feedbacks' => $this->contactModel->orderBy('created_at', 'DESC')->findAll()
        ];
        
        return view('admin/feedback_list', $data);
    }
    
    // Tampilkan detail feedback
    public function view($id)
    {
        $feedback = $this->contactModel->find($id);
        
        if (empty($feedback)) {
            return redirect()->to('admin/feedback')->with('error', 'Feedback not found.');
        }
        
        $data = [
            'title' => 'View Feedback',
            'feedback' => $feedback
        ];
        
        return view('admin/feedback_view', $data);
    }
    
    // Filter feedback berdasarkan tipe
    public function byType($type = null)
    {
        if ($type && in_array($type, ['suggestion', 'bug_report', 'question', 'content_improvement', 'other'])) {
            $data = [
                'title' => 'Feedback - ' . ucfirst(str_replace('_', ' ', $type)),
                'feedbacks' => $this->contactModel->getFeedbackByType($type)
            ];
        } else {
            return redirect()->to('admin/feedback');
        }
        
        return view('admin/feedback_list', $data);
    }
    
    // Filter feedback berdasarkan quiz
    public function byQuiz($quizName = null)
    {
        if ($quizName) {
            $data = [
                'title' => 'Feedback for Quiz: ' . $quizName,
                'feedbacks' => $this->contactModel->getFeedbackByQuiz($quizName)
            ];
        } else {
            return redirect()->to('admin/feedback');
        }
        
        return view('admin/feedback_list', $data);
    }
    
    // Hapus feedback
    public function delete($id)
    {
        $feedback = $this->contactModel->find($id);
        
        if (empty($feedback)) {
            return redirect()->to('admin/feedback')->with('error', 'Feedback not found.');
        }
        
        $this->contactModel->delete($id);
        
        return redirect()->to('admin/feedback')->with('success', 'Feedback deleted successfully.');
    }
}
