<?php

require_once __DIR__ . '/../models/Tag.php';

class TagService
{
    public function getAllTags()
    {
        $tag = new Tag();
        return $tag->getAllTags();
    }
}
