<?php

namespace App\Controllers;

use Zend\Diactoros\Response\HtmlResponse;

class HomeController {

  public function __construct()
  {
    // dd(123);
  }

  public function __invoke($request)
  {
    return new HtmlResponse('<h1>main page</h1>');
  }

  public function name()
  {
    return new HtmlResponse('<h1>test</h1>');
  }
}
