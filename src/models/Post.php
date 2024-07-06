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
    public $time;

    public function save()
    {
        global $mysqli;

        $stmt = $mysqli->prepare("INSERT INTO posts (userId, title, description, latitude, longitude, image, time) VALUES (?, ?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param('issdds', $this->userId, $this->title, $this->description, $this->latitude, $this->longitude, $this->image);

        return $stmt->execute();
    }

    public function findById($id)
    {
        global $mysqli;

        $stmt = $mysqli->prepare("
            SELECT 
                posts.*, 
                users.name as userName, 
                users.profileImage as userProfileImage 
            FROM 
                posts 
            JOIN 
                users 
            ON 
                posts.userId = users.id 
            WHERE 
                posts.id = ?
        ");
        if (!$stmt) {
            echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
            return null;
        }

        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $post = $result->fetch_assoc();

        if (!$post) {
            echo "Fetch failed: (" . $stmt->errno . ") " . $stmt->error;
        }

        // Fetch tags
        $post['tags'] = $this->getTagsByPostId($id);

        return $post;
    }

    public function findAll()
    {
        global $mysqli;

        $result = $mysqli->query("
            SELECT 
                posts.*, 
                users.name as userName, 
                users.profileImage as userProfileImage 
            FROM 
                posts 
            JOIN 
                users 
            ON 
                posts.userId = users.id 
            ORDER BY 
                posts.time DESC
        ");

        if (!$result) {
            echo "Query failed: (" . $mysqli->errno . ") " . $mysqli->error;
            return [];
        }

        $posts = [];
        while ($row = $result->fetch_assoc()) {
            $row['tags'] = $this->getTagsByPostId($row['id']);
            $posts[] = $row;
        }

        return $posts;
    }

    private function getTagsByPostId($postId)
    {
        global $mysqli;

        $stmt = $mysqli->prepare("
            SELECT 
                tags.name 
            FROM 
                tags 
            JOIN 
                posts_tags 
            ON 
                tags.id = posts_tags.tagId 
            WHERE 
                posts_tags.postId = ?
        ");
        $stmt->bind_param('i', $postId);
        $stmt->execute();
        $result = $stmt->get_result();

        $tags = [];
        while ($row = $result->fetch_assoc()) {
            $tags[] = $row['name'];
        }

        return $tags;
    }

    public function findByTag($tagId = null)
    {
        global $mysqli;

        $query = "
            SELECT 
                posts.*, 
                users.name as userName, 
                users.profileImage as userProfileImage,
                GROUP_CONCAT(tags.name SEPARATOR ', ') as tags
            FROM 
                posts 
            JOIN 
                users 
            ON 
                posts.userId = users.id
            LEFT JOIN 
                posts_tags 
            ON 
                posts.id = posts_tags.postId
            LEFT JOIN 
                tags 
            ON 
                posts_tags.tagId = tags.id
        ";

        if ($tagId !== null) {
            $query .= "WHERE posts_tags.tagId = ?";
        }

        $query .= " GROUP BY posts.id ORDER BY posts.time DESC";

        $stmt = $mysqli->prepare($query);

        if ($tagId !== null) {
            $stmt->bind_param('i', $tagId);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $posts = [];

        while ($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }

        return $posts;
    }
}
