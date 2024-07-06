<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../services/TagService.php';

class TagController extends Controller
{
    protected $tagService;

    public function __construct()
    {
        $this->tagService = new TagService();
    }

    public function getAllTags()
    {
        $tags = $this->tagService->getAllTags();
        echo json_encode($tags);
    }
}
