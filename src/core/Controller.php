<?php

class Controller
{
    protected function view($view, $data = [], $header = null, $footer = null)
    {
        extract($data);

        if ($header) {
            include __DIR__ . "/../views/templates/{$header}.php";
        }

        include __DIR__ . "/../views/{$view}.php";

        if ($footer) {
            include __DIR__ . "/../views/templates/{$footer}.php";
        }
    }

    protected function setSessionMessage($key, $message)
    {
        $_SESSION[$key] = $message;
    }

    protected function getSessionMessage($key)
    {
        if (isset($_SESSION[$key])) {
            $message = $_SESSION[$key];
            unset($_SESSION[$key]);
            return $message;
        }
        return null;
    }
}
