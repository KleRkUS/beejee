<div class="form">

	<h1>Добавить задачу</h1>

	<form action="/add/create" method="POST">

		<label for="email">E-mail</label>
		<input type="text" name="email" placeholder="E-mail" id="email">

		<label for="description">Задача</label>
		<textarea name="description" placeholder="Описание" id="description"></textarea>

		<input type="submit" name="submit" value="Создать задачу" class="btn btn-success">

	</form>

	<?php if (!$data): ?>
		<span class="status">Поля не заполнены или заполнены неверно</span>
	<?php elseif ($data === "Error"): ?>
		<span class="status">Ошибка базы данных</span>
	<?php else: ?>
	<?php endif;?>

</div>