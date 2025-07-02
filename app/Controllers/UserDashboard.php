<?php

namespace App\Controllers;

class UserDashboard extends BaseController
{    public function index()
    {
        // Cek login dan role user
        if (!session()->get('logged_in') || session()->get('user_role') !== 'user') {
            return redirect()->to('/login');
        }

        return view('user/dashboard');
    }
}
