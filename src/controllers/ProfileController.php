<?php

class ProfileController extends Controller
{
    public function viewProfile($id)
    {
        return $this->view('profile/profile', ['id' => $id], 'main_header', 'main_footer');
    }

    public function editProfile()
    {
        return $this->view('profile/settings', [], 'main_header', 'main_footer');
    }
}

