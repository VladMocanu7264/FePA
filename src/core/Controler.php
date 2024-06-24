<?php

class Controller
{
    protected function view($view, $data = [], $header = 'header', $footer = 'footer')
    {
        extract($data);
        require_once __DIR__ . "/../views/templates/{$header}.php";
        require_once __DIR__ . "/../views/{$view}.php";
        require_once __DIR__ . "/../views/templates/{$footer}.php";
    }
}
