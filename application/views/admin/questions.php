<h1>вопросы:</h1>
<table class="table">
	<thead>
		<th>
			id
		</th>
		<th>
			Вопрос
		</th>
		<th>
			Действия
		</th>
	</thead>
	<?php
		foreach($questions as $question){
			echo "
			<tr>
				<td>
					{$question->id}
				</td>
				<td>
					{$question->question}
				</td>
				<td>
					<a href='/admin/questions/edit/{$question->id}' title='edit'> <img class='icon' src='/assets/images/edit.svg' alt='edit'> </a>
					<a href='/admin/questions/delete/{$question->id}' title='edit' class='delete'> <img class='icon' src='/assets/images/trash.svg' alt='delete'> </a>
				</td>
				
			</tr>	
			";
		}
	?>
</table>
