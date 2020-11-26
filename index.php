<?php

use App\Core\Dispatcher;
use App\Core\Router;
use App\Core\View;

error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', '1');

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

define('ROOT', dirname(__FILE__));
$routes = require_once $_SERVER['DOCUMENT_ROOT'] . '/app/core/routes.php';

$track = (new Router) -> getTrack($routes, $_SERVER['REQUEST_URI']);

$page = (new Dispatcher) -> getPage($track);

echo (new View) -> render($page);