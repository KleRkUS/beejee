<div class="form">

	<h1>Редактировать задачу</h1>

	<form action="/admin/editRec?<?= $data[0]['id']?>" method="POST">

		<label for="description">Задача</label>
		<textarea name="description" placeholder="Описание" id="description"><?= $data[0]['description']?></textarea>

		<input type="submit" name="submit" value="Редактировать задачу" class="btn btn-success">

	</form>

	<?php if (!$data[1]): ?>
		<span class="status">Поля не заполнены или заполнены неверно</span>
	<?php endif;?>

</div>