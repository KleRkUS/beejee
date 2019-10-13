<?php 

include 'app/models/Tasks.php';

class Add extends Controller
{

	public $model;
	private $auth = false;

	public function getAuth()
	{
		return $this->auth;
	}

	public function index()
	{
		$status = true;
		$this->view->generate('add.php', 'layout.php', $status);
	}

	public function create()
	{

		$this->model = new Tasks;

		if (!isset($_POST['email']) || !isset($_POST['description']) || !$this->checkEmail($_POST['email'])) {

			$status = false;
			$this->view->generate('add.php', 'layout.php', $status);
			return 0;
		
		}

		$email = htmlspecialchars($_POST['email'], ENT_QUOTES);
		$description = htmlspecialchars($_POST['description'], ENT_QUOTES);

		$record = $this->model->createRecord($email, $description);

		if ($record) {
			header("Location: /");
			die();
		} else {
			$status = "Error";
			$this->view->generate('add.php', 'layout.php', $status);
		}
	}

	private function checkEmail($email)
	{

		$regExp = "/\w+@\w+.\D+/";
		return preg_match($regExp, $email);

	}

}