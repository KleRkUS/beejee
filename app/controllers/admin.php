<?php

include 'app/models/Tasks.php';

class Admin extends Controller
{
	
	private $auth = true;

	public function getAuth()
	{
		return $this->auth;
	}

	public function index()
	{
		$this->view->generate('main.php', 'layout.php');
	}

	public function edit($id)
	{

		$this->model = new Tasks;

		$task = $this->model->getTask($id);

		$status = true;
		$this->view->generate('edit.php', 'layout.php', [$task, $status]);
	}

	public function editRec($id)
	{

		$this->model = new Tasks;

		if (!isset($_POST['description'])) {
			$status = false;
			$this->view->generate('edit.php', 'layout.php', [$task, $status]);
		}

		if ($_SESSION['authentificated'] != 1) {
			header("Location: /e404");
			die();	
		}

		$description = htmlspecialchars($_POST['description'], ENT_QUOTES);

		$this->model->editRecord($description, $id);
		header("Location: /");
		die();
	}

}