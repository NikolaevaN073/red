<?php

namespace App\Core;

class Route
{
	public function __construct(
		//private Auth $auth,
		private Session $session
	)
	{ }

	public function start()
	{
		// контроллер и действие по умолчанию
		$controllerClassname = 'Home' . 'Controller';
        $actionName = 'index';
		$payload = [];

		$routes = explode('/', $_SERVER['REQUEST_URI']);

		// получаем имя контроллера
		if (!empty($routes[1])) {	
			$controllerClassname = ucfirst(strtolower($routes[1])) . 
			'Controller';
		}		
		
		// получаем имя экшена
		if (!empty($routes[2])) {
			$actionName = strtolower($routes[2]);
		}
					
		// проверяем, указано ли действие и перезаписываем значение по умолчанию
		if (!empty($routes[3])) {
			$payload = array_slice($routes, 3);
		}
		
		$controllerName = 'App\\Controllers\\' . $controllerClassname;
		$controllerFile = $controllerClassname . '.php';
		$controllerPath = ROOT_DIR . '/src/Controllers/' . $controllerFile;

		//var_dump($controllerPath);
		//die();

		if(file_exists($controllerPath)) {
			include_once $controllerPath ;
		}
		else {
			Route::ErrorPage404();
		}

		// создаем контроллер
		$controller = new $controllerName;

		//call_user_func([$controller, 'setAuth'], $this->auth);
		call_user_func([$controller, 'setSession'], $this->session);
		
		if(method_exists($controller, $actionName)) {	
			
			// вызываем действие контроллера
			$controller->$actionName($payload);
		} 
		else {
		    $this->ErrorPage404();
		}
	}
	
	public function ErrorPage404()	
	{	
		header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:/error404');
    }
}
