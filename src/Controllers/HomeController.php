<?php

namespace App\Controllers;

use Zend\Diactoros\Response\HtmlResponse;

class HomeController {

  protected $blade;

  public function __construct()
  {
    global $blade;
    $this->blade = $blade;
  }

  public function __invoke($request)
  {
    // $attributes = $request->getAttributes();
    // $content = '<h1>home page</h1>';
    // if (count($attributes)) {
    //   $content .= '<h2>Данные "из ниоткуда":</h2> <ul>';

    //   foreach ($attributes as $key => $value) {
    //     $content .= "<li>{$key}: {$value}</li>";
    //   }

    //   $content .= '</ul>';
    // }

    $name = $request->getQueryParams()['name'];

    return $this->blade->make('home', [
      'name' => $name
    ]);
  }

  public function name()
  {
    return new HtmlResponse('<h1>test</h1>');
  }
}
