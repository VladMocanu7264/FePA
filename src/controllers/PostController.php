<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../services/PostService.php';

class PostController extends Controller
{
    protected $postService;

    public function __construct()
    {
        $this->postService = new PostService();
    }

    public function showMainPage()
    {
        return $this->view('posts/main', [], 'main_header', 'main_footer');
    }

    public function createPostForm()
    {
        return $this->view('posts/create', [], 'main_header', 'main_footer');
    }

    public function createPost()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->postService->createPost($_POST, $_FILES);

            if ($result === 'Post created successfully!') {
                http_response_code(200);
                echo json_encode(['status' => 'success', 'message' => $result]);
            } else {
                http_response_code(400);
                echo json_encode(['status' => 'error', 'message' => $result]);
            }
        }
    }
}