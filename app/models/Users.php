<?php

class Users extends Model
{

	public function verifyPass($login, $pass)
	{

		$query = "SELECT password FROM users WHERE username = ?";

		$stmt = $this->executeQuery($query, [$login]);

		$row = $stmt->fetch();

		$_SESSION['authentificated'] = true;

		return password_verify($pass, $row['password']);

	}

}