<?php

require_once __DIR__ . '/../config/config.php';

class User
{
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
}
