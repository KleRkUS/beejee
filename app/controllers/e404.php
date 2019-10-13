<?php

class e404 extends Controller
{
	private $auth = false;

	public function getAuth()
	{
		return $this->auth;
	}
	
	function index()
	{
		$this->view->generate('404.php', 'layout.php');
	}

}
