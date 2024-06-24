<?php

require_once __DIR__ . '/../core/Controler.php';

class PageController extends Controller
{
    public function landing()
    {
        return $this->view('pages/landing', [], 'unsigned_header', 'unsigned_footer');
    }
}
