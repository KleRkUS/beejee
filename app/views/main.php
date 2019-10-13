<div class="container">
	
	<header>

      <?php if($_SESSION['authentificated']):?>
         <a href="/login/logout">Выйти</a>
      <?php else: ?>
         <a href="/login">Войти</a>
      <?php endif; ?>

	</header>

	<div class="row">
		<table class="table col-8">
			<thead>
      			<th scope="col" name="table-sort" sort-type="email">E-mail</th>
      			<th scope="col" name="table-sort" sort-type="description">Задача</th>
      			<th scope="col" name="table-sort" sort-type="status">Выполнена</th>
      			<th scope="col"></th>
               <th scope="col"></th>
      		</thead>
      		<tbody>
      			<?php foreach ($data[0] as $value): ?>

      				<tr>

      					<td><?= $value['email']?></td>
						   <td><?= $value['description']?></td>
						   <td>

   						   <?php if ($value['status'] == 0): ?>
							     <p style="color: red">Не выполнено</p>
   						   <?php else: ?>
   							  <p style="color: green">Выполнено</p>
   						   <?php endif ?>

      					</td>
      					<td>

      						<?php if ($value['changed'] == 1): ?>
								 <p style="color: gray">Изменено администратором</p>
      						<?php endif ?>
      					
                     </td>
                     <td>  
                        
                        <?php if ($_SESSION['authentificated']): ?>
                           <a href="/admin/edit?<?= $value['id']?>">&#9998;</a>
                        <?php endif; ?>
                        
                     </td>

      				</tr>

      			<?php endforeach ?>

      		</tbody>		
		</table>
		<a href="/add" class="btn btn-primary">Добавить задачу</a>
	</div>
	<div class="row row-pagination">
		<ul class="pagination">
    
			<?php for ($i = 1; $i <= ceil(intval($data[1]["COUNT(*)"])/4); $i++): ?>

				<li class="page-item"><a class="page-link" href="/main/index?<?= $i?>"><?= $i?></a></li>

			<?php endfor ?>

  		</ul>
  	</div>
</div>