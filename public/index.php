<?php
declare(strict_types = 1);

use Router\Router;
use Router\Exceptions\NotFoundException;
use Router\Exceptions\InvalidParameterTypeException;

use AdventCalendar\Controllers\Days;

require_once dirname(__DIR__) . "/vendor/autoload.php";

$controllers = [
    Days::class
];

$router = new Router($controllers);

$uri    = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];

try {
    echo $router->resolve(strtolower($method), $uri);
} catch (NotFoundException | InvalidParameterTypeException) {
    header("Location: /");
}
