<?php

require_once __DIR__ . '/../config/config.php';

class Post
{
    public $userId;
    public $title;
    public $description;
    public $latitude;
    public $longitude;
    public $image;

    public function save()
    {
        global $mysqli;

        $stmt = $mysqli->prepare("INSERT INTO posts (userId, title, description, latitude, longitude, image) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('issdds', $this->userId, $this->title, $this->description, $this->latitude, $this->longitude, $this->image);

        return $stmt->execute();
    }
}
