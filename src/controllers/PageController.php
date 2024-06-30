<?php

require_once __DIR__ . '/../core/Controller.php';

class PageController extends Controller
{
    public function landing()
    {
        return $this->view('pages/landing', [], 'unsigned_header', 'unsigned_footer');
    }

    public function aboutUs()
    {
        return $this->view('pages/about_us', [], 'main_header', 'main_footer');
    }

    public function contact()
    {
        return $this->view('pages/contact', [], 'main_header', 'main_footer');
    }

    public function help()
    {
        return $this->view('pages/help', [], 'main_header', 'main_footer');
    }
}
