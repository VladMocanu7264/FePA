<?php

$router->map('GET', '/', 'PageController@landing', 'home');
$router->map('GET', '/login', 'AuthController@showLoginForm', 'login');
$router->map('GET', '/signup', 'AuthController@showSignupForm', 'signup');
$router->map('GET', '/main', 'PostController@showMainPage', 'main');
