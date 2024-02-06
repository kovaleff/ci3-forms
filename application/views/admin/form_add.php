<h1>Формы:</h1>
<?php $options = '';
foreach($questions as $question){
	$options .= "<option value='$question->id'>$question->question</option>";
}
?>
<form method="post">

	<div class="field">
		<label class="label">имя</label>
		<div class="control">
			<input class="input" name="title" placeholder="имя" required>
		</div>
	</div>
	<?php
	for($i=0;$i<5;$i++){
		?>
		<div class="field">
			<div class="select is-primary">
				<select  name="questions[]" placeholder="Вопрос" >
					<?=$options?>
				<select>
			</div>
		</div>
		<?php
	}
	?>
<div>
	<button class="m1 button is-primary">Сохранить</button>
</div>

</form>

