<?php

namespace App\Middlewares;

use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\RedirectResponse;

class AuthMiddleware implements MiddlewareInterface {

	public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface {

			
		/*
			auth logic

			$request->getParsedBody()['login']
			$request->getParsedBody()['password']

		*/

		$userIsLogin = true;

		if ($userIsLogin) {
    		return $handler->handle($request->withAttribute('auth', 'hello!'));
		}

		return new RedirectResponse('/');
		// return new JsonResponse(['error' => true, 'errorMessage' => 'auth not correct']);

	}

}