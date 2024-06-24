<?php

require_once __DIR__ . '/../core/Controller.php';

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return $this->view('auth/login', [], 'unsigned_header', 'unsigned_footer');
    }

    public function login()
    {
        // Handle login logic
    }

    public function showSignupForm()
    {
        return $this->view('auth/signup', [], 'unsigned_header', 'unsigned_footer');
    }

    public function signup()
    {
        // Handle signup logic
    }
}
