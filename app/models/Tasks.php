<?php

class Tasks extends Model
{

	public function getAmount()
	{

		$query = "SELECT COUNT(*) FROM tasks";

		$stmt = $this->pdo->query($query);
		return $stmt->fetch();

	}

	public function getTasks($page)
	{
		$query = "SELECT * FROM tasks";

		$start = (intval($page)-1)*4;
		$end = 4;

		if (isset($_SESSION['order']) && isset($_SESSION['order-direction'])) {
			
			$order = $_SESSION['order'];
			$direction = $_SESSION['order-direction'];

			$query .= " ORDER BY $order $direction LIMIT :startRec, :endRec";

			$stmt = $this->executeQuery($query, ['startRec' => $start, 'endRec' => $end]);
		} else {

			$query .= " LIMIT :startRec, :endRec";

			$stmt = $this->executeQuery($query, ['startRec' => $start, 'endRec' => $end]);
		}

		return $stmt->fetchAll();
	}

	public function createRecord($email, $description)
	{

		$query = "INSERT INTO tasks (email, description) VALUES (:email, :description)";

		$stmt = $this->executeQuery($query, ['email' => $email, 'description' => $description]);

		if ($stmt) {
			return true;
		} else {
			return false;
		}
	}

	public function getTask($id)
	{

		$query = "SELECT * FROM tasks WHERE id = ?";

		$stmt = $this->executeQuery($query, [$id]);

		return $stmt->fetch();

	}

	public function editRecord($description, $id)
	{

		$query = "UPDATE tasks SET description = ?, changed = ? WHERE id = ?";

		$this->executeQuery($query, [$description, true, $id]);

	}

}