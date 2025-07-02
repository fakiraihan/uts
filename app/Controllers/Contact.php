<?php

namespace App\Controllers;

use App\Models\ContactModel;

class Contact extends BaseController
{
    public function index()
    {
        return view('contact_form');
    }    public function submit()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'name' => 'required|min_length[3]|max_length[50]',
            'email' => 'required|valid_email',
            'message' => 'required|min_length[10]',
            'feedback_type' => 'required',
            'related_quiz' => 'permit_empty'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $model = new ContactModel();
        $model->save([
            'name' => htmlspecialchars($this->request->getPost('name')),
            'email' => htmlspecialchars($this->request->getPost('email')),
            'message' => htmlspecialchars($this->request->getPost('message')),
            'feedback_type' => htmlspecialchars($this->request->getPost('feedback_type')),
            'related_quiz' => htmlspecialchars($this->request->getPost('related_quiz')),
        ]);

        return redirect()->to('/feedback')->with('success', 'Feedback berhasil dikirim!');
    }
}
