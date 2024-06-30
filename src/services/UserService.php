<?php

require_once __DIR__ . '/../models/User.php';

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
}
