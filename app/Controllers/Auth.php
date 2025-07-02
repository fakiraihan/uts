<?php

namespace App\Controllers;

class Auth extends BaseController
{    public function login()
    {
        if ($this->request->getMethod() === 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            
            // Optimasi: gunakan match expression untuk PHP 8.2+
            $credentials = match(true) {
                ($username === 'admin' && $password === 'admin123') => [
                    'user_id' => 1,
                    'user_role' => 'admin',
                    'redirect' => '/admin'
                ],
                ($username === 'user' && $password === 'user123') => [
                    'user_id' => 2,
                    'user_role' => 'user', 
                    'redirect' => '/user'
                ],
                default => null
            };
            
            if ($credentials) {
                // Set session semua sekaligus - lebih efisien
                session()->set([
                    'user_id' => $credentials['user_id'],
                    'user_role' => $credentials['user_role'],
                    'logged_in' => true
                ]);
                
                return redirect()->to($credentials['redirect']);
            }
            
            return view('login', ['error' => 'Username atau password salah!']);
        }
        
        return view('login');
    }    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
