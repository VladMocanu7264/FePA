<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../models/Post.php';
require_once __DIR__ . '/../models/Comment.php';

class PostService
{
    public function createPost($postData, $fileData)
    {
        $title = $postData['title'];
        $description = $postData['description'];
        $latitude = $postData['latitude'];
        $longitude = $postData['longitude'];
        $image = $fileData['image'];

        if (empty($title) || empty($description) || empty($latitude) || empty($longitude)) {
            return 'Title, description, latitude, and longitude are required.';
        }

        if ($image['error'] == UPLOAD_ERR_OK) {
            $imageContent = file_get_contents($image['tmp_name']);
        } else {
            $imageContent = null;
        }

        $post = new Post();
        $post->userId = 2;
        $post->title = $title;
        $post->description = $description;
        $post->latitude = $latitude;
        $post->longitude = $longitude;
        $post->image = $imageContent;

        $result = $post->save();

        if ($result) {
            return 'Post created successfully!';
        } else {
            return 'Failed to create post.';
        }
    }

    public function getPostById($id)
    {
        $post = new Post();
        return $post->findById($id);
    }

    public function getAllPosts()
    {
        $post = new Post();
        return $post->findAll();
    }

    public function addComment($postData)
    {
        $postId = $postData['postId'];
        $userId = 2; // Replace with actual user ID logic
        $comment = $postData['comment'];

        if (empty($postId) || empty($comment)) {
            return 'Post ID and comment are required.';
        }

        $commentModel = new Comment();
        $commentModel->postId = $postId;
        $commentModel->userId = $userId;
        $commentModel->comment = $comment;

        $result = $commentModel->save();

        if ($result) {
            return 'Comment added successfully!';
        } else {
            return 'Failed to add comment.';
        }
    }

    public function getCommentsByPostId($postId)
    {
        return Comment::findByPostId($postId);
    }
}
