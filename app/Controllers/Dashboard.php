<?php

namespace App\Controllers;

class Dashboard extends BaseController
{    public function index()
    {
        // Cek login dan role admin
        if (!session()->get('logged_in') || session()->get('user_role') !== 'admin') {
            return redirect()->to('/login');
        }

        return view('admin/dashboard');
    }
}
