<?php

$router->map('GET', '/', 'PageController@landing', 'home');
$router->map('GET', '/login', 'AuthController@showLoginForm', 'login');
$router->map('GET', '/signup', 'AuthController@showSignupForm', 'signup');
$router->map('POST', '/login', 'AuthController@login', 'login_post');
$router->map('POST', '/signup', 'AuthController@register', 'signup_post');
$router->map('GET', '/main', 'PostController@showMainPage', 'main');
$router->map('GET', '/about', 'PageController@aboutUs', 'about');
$router->map('GET', '/contact', 'PageController@contact', 'contact');
$router->map('GET', '/help', 'PageController@help', 'help');
$router->map('GET', '/post/create', 'PostController@createPostForm', 'post_create_form');
$router->map('POST', '/post/create', 'PostController@createPost', 'post_create');
$router->map('GET', '/post/show/[i:id]', 'PostController@showPost', 'post_show');
$router->map('GET', '/news', 'PostController@news', 'news');
$router->map('POST', '/post/add-comment', 'PostController@addComment', 'post_add_comment');
$router->map('GET', '/post/get-comments/[i:id]', 'PostController@getComments', 'post_get_comments');
$router->map('GET', '/tags', 'TagController@getAllTags', 'get_tags');
$router->map('GET', '/posts', 'PostController@getPostsByTags', 'get_posts_by_tag');
$router->map('GET', '/profile/[i:id]', 'ProfileController@viewProfile', 'view_profile');
$router->map('GET', '/fetch-profile/[i:id]', 'ProfileController@fetchProfile', 'fetch_profile');
$router->map('GET', '/settings', 'PostController@getComments', 'edit_profile');
