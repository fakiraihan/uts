<?php

namespace App\Controllers;

use App\Models\QuizModel;
use App\Models\QuestionModel;
use App\Models\OptionModel;

class AdminQuiz extends BaseController
{
    protected $quizModel;
    protected $questionModel;
    protected $optionModel;

    public function __construct()
    {
        $this->quizModel = new QuizModel();
        $this->questionModel = new QuestionModel();
        $this->optionModel = new OptionModel();
    }
    
    // Tampilkan daftar quiz (untuk admin)
    public function index()
    {
        $data['quizzes'] = $this->quizModel->getAllQuizzes();
        return view('admin/quiz_list', $data);
    }
    
    // Tampilkan form untuk membuat quiz baru
    public function create()
    {
        return view('admin/quiz_form');
    }
    
    // Proses pembuatan quiz baru
    public function store()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'title' => 'required|min_length[3]|max_length[100]',
            'description' => 'required',
            'time_limit' => 'permit_empty|numeric',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Simpan quiz baru
        $quizId = $this->quizModel->insert([
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'time_limit' => $this->request->getPost('time_limit') ?: null,
            'created_by' => session()->get('user_id'),  // Diasumsikan ID user tersimpan di session
            'status' => 'draft',
        ]);

        return redirect()->to('admin/quiz/edit/' . $quizId)->with('success', 'Quiz created successfully.');
    }
    
    // Tampilkan halaman edit quiz
    public function edit($id)
    {
        $data['quiz'] = $this->quizModel->getQuizWithQuestions($id);
        
        if (empty($data['quiz'])) {
            return redirect()->to('admin/quizzes')->with('error', 'Quiz not found.');
        }
        
        return view('admin/quiz_edit', $data);
    }
    
    // Proses update quiz
    public function update($id)
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'title' => 'required|min_length[3]|max_length[100]',
            'description' => 'required',
            'time_limit' => 'permit_empty|numeric',
            'status' => 'required|in_list[draft,published,archived]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Update quiz
        $this->quizModel->update($id, [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'time_limit' => $this->request->getPost('time_limit') ?: null,
            'status' => $this->request->getPost('status'),
        ]);

        return redirect()->to('admin/quizzes')->with('success', 'Quiz updated successfully.');
    }
    
    // Menambahkan pertanyaan baru ke quiz
    public function addQuestion($quizId)
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'question_text' => 'required',
            'question_type' => 'required|in_list[multiple_choice,true_false]',
            'points' => 'required|numeric',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Simpan pertanyaan baru
        $questionId = $this->questionModel->insert([
            'quiz_id' => $quizId,
            'question_text' => $this->request->getPost('question_text'),
            'question_type' => $this->request->getPost('question_type'),
            'points' => $this->request->getPost('points'),
        ]);

        // Redirect ke halaman tambah opsi jawaban
        return redirect()->to('admin/quiz/' . $quizId . '/question/' . $questionId . '/options')
                        ->with('success', 'Question added successfully. Now add options.');
    }
    
    // Tampilkan halaman untuk menambah/edit opsi jawaban
    public function editOptions($quizId, $questionId)
    {
        $data['quiz'] = $this->quizModel->find($quizId);
        $data['question'] = $this->questionModel->find($questionId);
        $data['options'] = $this->optionModel->getOptionsByQuestion($questionId);
        
        return view('admin/question_options', $data);
    }
    
    // Proses penambahan opsi jawaban
    public function saveOptions($quizId, $questionId)
    {
        // Proses penyimpanan opsi jawaban
        $options = $this->request->getPost('options');
        $isCorrect = $this->request->getPost('is_correct');
        
        // Hapus opsi yang ada sebelumnya
        $this->optionModel->where('question_id', $questionId)->delete();
        
        // Simpan opsi baru
        foreach ($options as $key => $optionText) {
            if (trim($optionText) !== '') {
                $this->optionModel->insert([
                    'question_id' => $questionId,
                    'option_text' => $optionText,
                    'is_correct' => ($isCorrect == $key) ? 1 : 0,
                ]);
            }
        }
        
        return redirect()->to('admin/quiz/edit/' . $quizId)
                        ->with('success', 'Options saved successfully.');
    }
    
    // Hapus quiz
    public function delete($id)
    {
        // Hapus quiz dan semua data terkait (pertanyaan, opsi, hasil)
        // Ini bisa diimplementasikan dengan foreign key constraints dengan CASCADE DELETE
        
        $this->quizModel->delete($id);
        
        return redirect()->to('admin/quizzes')->with('success', 'Quiz deleted successfully.');
    }
}
