<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../services/UserService.php';

class AuthController extends Controller
{
    protected $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function showLoginForm()
    {
        return $this->view('auth/login', [], 'unsigned_header', 'unsigned_footer');
    }

    public function login()
    {
        // Placeholder for login logic
    }

    public function showSignupForm()
    {
        return $this->view('auth/signup', [], 'unsigned_header', 'unsigned_footer');
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->userService->register($_POST);

            if ($result === 'User registered successfully!') {
                http_response_code(200);
                echo $result;
            } else {
                http_response_code(400);
                echo $result;
            }
        }
    }
}
