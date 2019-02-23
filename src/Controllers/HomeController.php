<?php

namespace App\Controllers;

use Zend\Diactoros\Response\HtmlResponse;
use ORM;

class HomeController {

  protected $blade;

  public function __construct()
  {
    global $blade;
    $this->blade = $blade;
  }

  public function __invoke($request)
  {

    $categories = ORM::for_table('categories')->find_array();

    return $this->blade->make('home.index', [
      'categories' => $categories
    ]);
  }

  public function name()
  {
    return new HtmlResponse('<h1>test</h1>');
  }
}
