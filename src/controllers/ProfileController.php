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
    
    public function fetchProfile($id)
    {
        header('Content-Type: application/json; charset=UTF-8');
        $user = User::findById($id);
        
        $user_json = [];
        
        $user_json['name'] = $user->name;
        $user_json['email'] = $user->email;
        $user_json['profileImage'] = $user->profileImage ? base64_encode($user->profileImage) : null;
        $user_json['city'] = $user->city;
        $user_json['country'] = $user->country;
        $user_json['isAdmin'] = $user->isAdmin;
        
        echo json_encode($user_json);
    }
}

