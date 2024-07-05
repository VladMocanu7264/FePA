<?php

require_once __DIR__ . '/../config/config.php';

class Comment
{
    public $postId;
    public $userId;
    public $comment;

    public function save()
    {
        global $mysqli;

        $stmt = $mysqli->prepare("INSERT INTO comments (postId, userId, comment, time) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param('iis', $this->postId, $this->userId, $this->comment);

        return $stmt->execute();
    }

    public static function findByPostId($postId)
    {
        global $mysqli;

        $stmt = $mysqli->prepare("
            SELECT 
                comments.*, 
                users.name as userName, 
                users.profileImage as userProfileImage 
            FROM 
                comments 
            JOIN 
                users 
            ON 
                comments.userId = users.id 
            WHERE 
                comments.postId = ?
            ORDER BY 
                comments.time DESC
        ");
        $stmt->bind_param('i', $postId);
        $stmt->execute();
        $result = $stmt->get_result();

        $comments = [];
        while ($row = $result->fetch_assoc()) {
            $comments[] = $row;
        }

        return $comments;
    }
}
