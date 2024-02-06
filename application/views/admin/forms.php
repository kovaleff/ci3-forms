<h1>Опросы:</h1>
<div><a href="/admin/forms/add"  class="flex is-flex is-justify-items-center"> Добавить <img class='icon' src='/assets/images/add.svg' alt='edit'></a></div>
<table class="table">
	<thead>
		<th>
			id
		</th>
		<th>
			Название
		</th>
		<th>
			Статус
		</th>
		<th>
			Действия
		</th>
	</thead>
	<?php
		foreach($forms as $form){
			?>
				<tr>
					<td>
						<?=$form->id ?>
					</td>
					<td>
						<?=$form->title ?>
					</td>
					<td class="is-flex is-align-content-center">
						<?php
						$processed = $form->status == 'Обработано';
						if($processed){
							echo "<span class='tag success'>";
						} else {
							echo "<span class='tag is-warning'>";
						}
						echo "$form->status </span>";

						if(!$processed){
							echo "<a href='/admin/forms/activate/{$form->id}' class='activate'> <img src='/assets/images/act.svg' alt='Активировать' class='icon'></a>";
						}

						?>
					</td>
					<td align="center">
						<a href='/admin/forms/delete/<?=$form->id?>' title='delete' class='delete'> <img class='icon' src='/assets/images/trash.svg' alt='delete'> </a>
					</td>
				</tr>
	<?php
		}
	?>
</table>
