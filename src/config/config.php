<?php

$host = 'localhost';
$db = 'pawalert';
$user = 'root';
$pass = '';

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

//TODO: read key from file
$key = 'd5a70265c2e32c176cbcc1c93493c41d66b32af7043c0c6e49d2d7433b220fec';