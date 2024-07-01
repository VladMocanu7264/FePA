<?php

require_once __DIR__ . '/../models/Post.php';

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
}
