<?php
const BASE_PATH = __DIR__ . "/../";
require BASE_PATH . "core/functions.php";
spl_autoload_register(function ($class) {
    $class = str_replace("\\", "/", $class);
    require base("$class.php");
});
require base("bootstrap.php");
$router = new \Core\Router;
$routes = require base("router.php");

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];

$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];

$router->route($uri, $method);
