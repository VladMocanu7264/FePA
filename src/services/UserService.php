<?php

require_once __DIR__ . '/../models/User.php';
use Firebase\JWT\JWT;

class UserService
{
    public function register($data)
    {
        if ($data['password'] !== $data['confirm-password']) {
            return 'Passwords do not match.';
        }

        // Handle file upload
        $profileImage = null;
        if (isset($_FILES['profileImage']) && $_FILES['profileImage']['error'] === UPLOAD_ERR_OK) {
            $profileImage = file_get_contents($_FILES['profileImage']['tmp_name']);
        }

        // Hash the password
        $hashedPassword = password_hash($data['password'], PASSWORD_BCRYPT);

        // Create a new user
        $user = new User();
        $user->email = $data['email'];
        $user->password = $hashedPassword;
        $user->name = $data['name'];
        $user->profileImage = $profileImage;
        $user->country = $data['country'];
        $user->city = $data['city'];
        $user->isAdmin = 0;

        if ($user->save()) {
            return 'User registered successfully!';
        } else {
            return 'Error registering user.';
        }
    }
    public function login($data)
    {
        $user = User::findByEmail($data['email']);
        
        if(is_null($user) || !password_verify($data['password'], $user->password)) {
            return 'No user with the specific email/password combination was found.';
        }
        
        global $key;
        $payload = [
            'sub' => 'user',
            'id' => $user->id,
            'email' => $data['email'],
            'name' => $user->name,
            'profileImage' => $user->profileImage ? base64_encode($user->profileImage) : null,
            'country' => $user->country,
            'city' => $user->city,
            'isAdmin' => $user->isAdmin,
            'iat' => time(),
            'exp' => time() + 3600
        ];
        $jwt = JWT::encode($payload, $key, 'HS256');
        return $jwt;
    }
}
