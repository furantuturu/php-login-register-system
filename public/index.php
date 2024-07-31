<?php
use Classes\Session;
session_start();
const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'functions.php';

vendorAutoloader();

$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

spl_autoload_register(function ($class) {

    //* e.g Classes\Database becomes Classes/Database
    $result = str_replace('\\', '/', $class);

    require basePath("{$result}.php");

});

require basePath('bootstrap.php');

$router = new Classes\Router;

require basePath('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

Session::unflash();
