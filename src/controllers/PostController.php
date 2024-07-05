<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../services/PostService.php';
require_once __DIR__ . '/../models/Tag.php';

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
        $tagModel = new Tag();
        $tags = $tagModel->getAllTags();
        return $this->view('posts/create', ['tags' => $tags], 'main_header', 'main_footer');
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

    public function showPost($id)
    {
        $post = $this->postService->getPostById($id);

        if ($post) {
            return $this->view('posts/show', ['post' => $post], 'main_header', 'main_footer');
        } else {
            http_response_code(404);
            echo 'Post not found.';
        }
    }

    public function news()
    {
        header('Content-Type: application/rss+xml; charset=UTF-8');
        $posts = $this->postService->getAllPosts();
        echo $this->generateRssFeed($posts);
    }

    private function generateRssFeed($posts)
    {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $baseUrl = $protocol . $_SERVER['HTTP_HOST'] . '/PawAlert/FePA/src/public';

        $rssFeed = '<?xml version="1.0" encoding="UTF-8" ?>';
        $rssFeed .= '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">';
        $rssFeed .= '<channel>';
        $rssFeed .= '<title>Paw Alert News</title>';
        $rssFeed .= '<link>' . $baseUrl . '/news</link>';
        $rssFeed .= '<description>Latest reports of unsupervised animals</description>';
        $rssFeed .= '<language>en-us</language>';
        $rssFeed .= '<atom:link href="' . $baseUrl . '/news" rel="self" type="application/rss+xml" />';

        foreach ($posts as $post) {
            $rssFeed .= '<item>';
            $rssFeed .= '<title>' . htmlspecialchars($post['title']) . '</title>';
            $rssFeed .= '<description>' . htmlspecialchars($post['description']) . '</description>';
            $rssFeed .= '<link>' . $baseUrl . '/post/show/' . $post['id'] . '</link>';
            $rssFeed .= '<guid>' . $baseUrl . '/post/show/' . $post['id'] . '</guid>';
            $rssFeed .= '<pubDate>' . date(DATE_RSS, strtotime($post['time'])) . '</pubDate>';
            $rssFeed .= '</item>';
        }

        $rssFeed .= '</channel>';
        $rssFeed .= '</rss>';

        return $rssFeed;
    }
}
