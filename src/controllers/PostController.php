<?php

require_once __DIR__ . '/../core/Controller.php';

class PostController extends Controller
{
    public function showMainPage()
    {
        return $this->view('posts/main', [], 'main_header', 'main_footer');
    }
}
