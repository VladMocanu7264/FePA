<?php

require_once __DIR__ . '/../config/config.php';

class User
{
    public $id;
    public $email;
    public $password;
    public $name;
    public $profileImage;
    public $country;
    public $city;
    public $isAdmin;

    public function save()
    {
        global $mysqli;

        $stmt = $mysqli->prepare("INSERT INTO users (email, password, name, profileImage, country, city, isAdmin) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('ssssssi', $this->email, $this->password, $this->name, $this->profileImage, $this->country, $this->city, $this->isAdmin);

        return $stmt->execute();
    }

    public static function findByEmail($email)
    {
        global $mysqli;
        
        $stmt = $mysqli->prepare('SELECT * FROM users WHERE email=?');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        if (is_null($row)) {
            return null;
        }
        $user = new User();
        $user->id = $row['id'];
        $user->email = $row['email'];
        $user->password = $row['password'];
        $user->name = $row['name'];
        $user->profileImage = $row['profileImage'];
        $user->country = $row['country'];
        $user->city = $row['city'];
        $user->isAdmin = $row['isAdmin'];
        
        return $user;
    }
}
