<?php

class Application
{
	protected $controller;
	protected $method;
	protected $param;

	public function __construct() 
	{
		global $route;

		$this->controller 		= $route['default_controller'];
		$this->method 			= 'index';
		$this->param 			= [];

		if(isset($_GET['url']))
			$url = $this->parseUrl($_GET['url']);

		if(file_exists(APP_DIR.'controllers/'.$url[0].'.php'))
		{
			$this->controller 	= $url[0];
			unset($url[0]);
		}
		elseif(!file_exists(APP_DIR.'controllers/'.$url[0].'.php') and $url[0] != '')
		{
			$this->controller 	= $route['error_controller'];
			unset($url[0]);
		}
		require_once APP_DIR.'controllers/'.$this->controller.'.php';
		$this->controller = new $this->controller;

		if(isset($url[1]) && method_exists($this->controller, $url[1]))
			$this->method 		= $url[1];
		unset($url[1]);

		$this->parameters = $url ? array_values($url) : [];
		
		call_user_func_array([$this->controller, $this->method], $this->parameters);
	}

	public function parseUrl($url)
	{
		return explode('/', filter_var(rtrim($url), FILTER_SANITIZE_URL));
	}
}