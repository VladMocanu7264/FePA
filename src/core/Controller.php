<?php

class Controller
{
    protected function view($view, $data = [], $header = null, $footer = null)
    {
        if ($header) {
            include __DIR__ . "/../views/templates/{$header}.php";
        }
        include __DIR__ . "/../views/{$view}.php";
        if ($footer) {
            include __DIR__ . "/../views/templates/{$footer}.php";
        }
    }
}
