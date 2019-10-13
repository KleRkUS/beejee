<?php
	
class Route
{
		
	static function start()
	{

		require 'core/controller.php';
		require 'core/view.php';
		require 'core/model.php';

		session_start();

		$controller = "main";
		$action = "index";

		$routes = explode('/', $_SERVER['REQUEST_URI']);

	    if (!empty($routes[1])) {
	    	$controller = $routes[1]; 
	    }

	    if (!empty($routes[2])) {
	    	$acts = explode('?', $routes[2]);
	    	$action = $acts[0];
	    	$argument = $acts[1];
	    }

	    $controller_file = $controller.".php";

	    $controller_path = "app/controllers/".$controller_file;

	    if(file_exists($controller_path)) {
			include $controller_path;
		} else {
			Route::ErrorPage404();
		}


		$controller = new $controller;
		$action = $action;
		
		if ($controller->getAuth() && ($_SESSION['authentificated'] != 1)) {
			Route::ErrorPage404();
		}

		if(method_exists($controller, $action) && !empty($argument)) {
			$controller->$action($argument);
		} else if (method_exists($controller, $action) && empty($argument)){
			$controller->$action();
		} else{
			Route::ErrorPage404();
		}

	}

	static function ErrorPage404()
	{

        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'e404');
    
    }

} 