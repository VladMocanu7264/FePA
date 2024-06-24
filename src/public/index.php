<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../dependencies/vendor/autoload.php';
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../core/App.php';

$router = new AltoRouter();
$router->setBasePath('/PawAlert/FePA/src/public');

$app = new App($router);
