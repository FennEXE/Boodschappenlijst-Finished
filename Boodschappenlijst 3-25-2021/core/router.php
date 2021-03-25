<?php


class router
{
	/*
	protected $routes = [

		'GET' => [],
		'POST' => []
	];
	*/

	public $routes = [

		'GET' => [],
		'POST' => []
	];

	/* Obsolete
	public function define($routes)
	{
		$this->routes = $routes;
	}
	*/

	public function get($uri, $controller)
	{
		$this->routes['GET'][$uri] = $controller;
	}

	public function post($uri, $controller)
	{
		$this->routes['POST'][$uri] = $controller;
	}

	public static function load($file){

        $router = new static;
        require $file;
        return $router;
    }
	
	public function direct($uri, $requestType)
	{
		if (array_key_exists($uri, $this->routes[$requestType]))
		{
			return $this->routes[$requestType][$uri];
			//return $this->callAction();
		}
		throw new Exception('No route');
	}

	protected function callAction($controller, $action)
	{
		if(! method_exists($controller, $action))
		{
			throw new Exception('404');
		}
		return (new $controller)->$action();
	}
	
}






