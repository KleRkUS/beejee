<?php

include 'app/models/Users.php';

class Login extends Controller
{

	public $model;
	private $auth = false;

	public function getAuth()
	{
		return $this->auth;
	}

	public function index()
	{

		$this->view->generate('login.php', 'layout.php');

	}

	public function verify()
	{

		$this->model = new Users;

		if (!isset($_POST['login']) || !isset($_POST['password'])) {
			$this->view->generate('login.php', 'layout.php', 0);
			return 0;
		}

		$login = $_POST['login'];
		$pass = $_POST['password'];

		$status = $this->model->verifyPass($login, $pass);

		if (!$status) {
			$this->view->generate('login.php', 'layout.php', 1);
			return 0;
		}

		header("Location: /");
		die();

	}

	public function logout()
	{
		$_SESSION['authentificated'] = 0;

		header("Location: /");
		die();
	}

}