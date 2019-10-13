<div class="form">

	<h1>Войти</h1>

	<form action="/login/verify" method="POST">
	
		<label for="login">Логин</label>
		<input type="text" name="login" placeholder="Логин" id="login">

		<label for="password">Пароль</label>
		<input type="password" name="password" placeholder="******" id="password">

		<input type="submit" name="submit" value="Войти" class="btn btn-success">

	</form>

	<?php if ($data == 0): ?>
		<span class="status">Данные не указаны</span>
	<?php elseif ($data == 1): ?>
		<span class="status">Данные указаны неверно</span>
	<?php else: ?>
	<?php endif;?>

</div>