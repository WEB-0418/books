<?php

require __DIR__ . '/vendor/autoload.php';

use Zend\Diactoros\ServerRequestFactory;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\EmptyResponse;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;

$request = ServerRequestFactory::fromGlobals();
$request = $request->withQueryParams(array_merge(
  $request->getQueryParams(),
  [
    'test' => 100500
  ]
));

function dd($value)
{
  echo '<pre>';
  var_dump($value);
  echo '</pre>';
  die();
}

// dd($_GET);
$name = $request->getQueryParams()['name'];
if ($name) {
  $response = new HtmlResponse('<h1>Hello ' . $name . '!</h1>');
}

$emitter = new SapiEmitter();
$emitter->emit($response ?? new EmptyResponse());

// $response = isset($response) ? $response : new EmptyResponse();

// dd($response);





