<?php

namespace App\Controllers;

use Zend\Diactoros\Response\HtmlResponse;

class AboutController {
  public function __invoke($request)
  {
    return new HtmlResponse('<h1>about page</h1>');
  }
}
