<?php
/**
test09122018@gmail.com
test123456789test
*/

require __DIR__ . '/vendor/autoload.php';

use Zend\Diactoros\ServerRequestFactory;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\EmptyResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;
use Moon\HttpMiddleware\Delegate;
use Aura\Router\RouterContainer;
use App\Controllers\HomeController;
use App\Controllers\AboutController;
use App\Middlewares\TestMiddleware;

$request = ServerRequestFactory::fromGlobals();
$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();
$matcher = $routerContainer->getMatcher();


/**
* генерация/заполнение карты маршрутов
*/
// $map->get('main', '/', function($request) {
//   return new HtmlResponse('<h1>main page</h1>');
// });

$map->get('main', '/', new HomeController());

// $map->get('about', '/about', function($request) {
//   return new HtmlResponse('<h1>about page</h1>');
// });
$map->get('about', '/about', new AboutController());


$delegate = new Delegate([
    new TestMiddleware(),
  ], 
  function() {
    new HtmlResponse('<h1>alert!</h1>');
  }
);

$delegate->handle($request);

/**
* проверка соответствия текущего запроса какому-либо из маршрутов приложения
*/
$route = $matcher->match($request);

$response = new RedirectResponse('/');

if ($route) {
  $response = ($route->handler)($request);
  // if($route->name == 'main') {
  //   $response = $route->handler->name();
  // }
}


// dd($response);

// $request = $request->withQueryParams(array_merge(
//   $request->getQueryParams(),
//   [
//     'test' => 100500
//   ]
// ));

function dd($value)
{
  echo '<pre>';
  var_dump($value);
  echo '</pre>';
  die();
}

// dd($request->getURI()->getPath());

// dd($_GET);
// $name = $request->getQueryParams()['name'];
// if ($name) {
//   $response = new HtmlResponse('<h1>Hello ' . $name . '!</h1>');
// }


$emitter = new SapiEmitter();
$emitter->emit($response ?? new EmptyResponse());

// $response = isset($response) ? $response : new EmptyResponse();

// dd($response);





