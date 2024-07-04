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
        global $mysqli;
        $email = $data['email'];
        
        $stmt = $mysqli->prepare('SELECT * FROM users WHERE email=?');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if(is_null($row) || !password_verify($data['password'], $row['password'])) {
            return 'No user with the specific email/password combination was found.';
        } else {
            //TODO: read key from file
            $key = 'd5a70265c2e32c176cbcc1c93493c41d66b32af7043c0c6e49d2d7433b220fec';
            $payload = [
                'sub' => 'user',
                'email' => $email,
                'iat' => time(),
                'exp' => time() + 3600
            ];
            $jwt = JWT::encode($payload, $key, 'HS256');
            return $jwt;
        }
    }
}
