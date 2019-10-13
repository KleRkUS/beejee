<?

include 'app/models/Tasks.php';

class Main extends Controller
{

	public $model;
	private $auth = false;

	public function getAuth()
	{
		return $this->auth;
	}

	public function index($page = 1) 
	{

		$this->model = new Tasks;

		$tasks = $this->model->getTasks($page);
		$amount = $this->model->getAmount();

		$this->view->generate('main.php', 'layout.php', [$tasks, $amount]);

	}

	public function changeOrder($order)
	{

		$orderArr = ["0" => "DESC", "1" => "ASC"];

		if ($_SESSION['order'] == $order) {

			$key = !boolval(array_search($_SESSION['order-direction'], $orderArr));
			$_SESSION['order-direction'] = $orderArr[$key];

		} else {

			$_SESSION['order-direction'] = "ASC";
			$_SESSION['order'] = $order;
		}

	}

}