<?php
/**
test09122018@gmail.com
test123456789test
*/

require __DIR__ . '/vendor/autoload.php';
require_once(__DIR__ . '/vendor/j4mie/idiorm/idiorm.php');

use Zend\HttpHandlerRunner\RequestHandlerRunner;
use Zend\Diactoros\ServerRequestFactory;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\EmptyResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;
use Aura\Router\RouterContainer;
use App\Controllers\HomeController;
use App\Controllers\AboutController;
use App\Middlewares\TestMiddleware;
use Jenssegers\Blade\Blade;

$config = include(__DIR__ . '/config.php');

ORM::configure("mysql:host={$config['db_host']};dbname={$config['db_name']}");
ORM::configure('username', "{$config['db_user']}");
ORM::configure('password', "{$config['db_password']}");

$blade = new Blade(__DIR__ . '\templates\views', __DIR__ . '\templates\cache');

$request = ServerRequestFactory::fromGlobals();
$router = new Aura\Router\RouterContainer();

$map = $router->getMap();

$map->get('home', '/', App\Controllers\HomeController::class);
$map->get('about', '/about', App\Controllers\AboutController::class);

$dispatcher = new Middlewares\Utils\Dispatcher([
	new App\Middlewares\AuthMiddleware(),
    new App\Middlewares\TestMiddleware(),
    new Middlewares\AuraRouter($router),
    new Middlewares\RequestHandler()
]);

$response = $dispatcher->dispatch($request);

function dd($value)
{
  echo '<pre>';
  var_dump($value);
  echo '</pre>';
  die();
}

$emitter = new SapiEmitter();
$emitter->emit($response ?? new EmptyResponse());





