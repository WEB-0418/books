<?php

namespace App\Controllers;

use Zend\Diactoros\Response\HtmlResponse;

class AboutController {

  public function __invoke($request)
  {
  	$attributes = $request->getAttributes();
	$content = '<h1>about page</h1>';
  	if (count($attributes)) {
  		$content .= '<h2>Данные "из ниоткуда":</h2> <ul>';

  		foreach ($attributes as $key => $value) {
  			$content .= "<li>{$key}: {$value}</li>";
  		}

		$content .= '</ul>';
  	}
    return new HtmlResponse($content);
  }

}
