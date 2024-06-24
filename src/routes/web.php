<?php
global $router;
$router->map('GET', '/', 'PageController@landing');
$router->map('GET', '/login', 'AuthController@showLoginForm');
$router->map('POST', '/login', 'AuthController@login');
$router->map('GET', '/signup', 'AuthController@showSignupForm');
$router->map('POST', '/signup', 'AuthController@signup');
