<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFilter implements FilterInterface
{    public function before(RequestInterface $request, $arguments = null)
    {
        // Pastikan user sudah login
        if (!session()->get('user_id')) {
            return redirect()->to('/login')->with('error', 'Please login first.');
        }
        
        // Pastikan user adalah admin
        if (session()->get('user_role') !== 'admin') {
            return redirect()->to('/quizzes')->with('error', 'You do not have permission to access this area.');
        }
        
        return true;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Nothing to do
    }
}
