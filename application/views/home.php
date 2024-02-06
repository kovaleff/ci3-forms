<?php
?>
<h1>Опрос: - <?php echo $quesions[0]->title ?></h1>
<form action="" method="post">
	<?php
	foreach($quesions as $quesion){
		echo "<div class='field'>
				<label>{$quesion->question}</label>
				<input type='hidden' name='question_id[]' value='{$quesion->question_id}'>
				<input name='answer[]' required>
			  </div>";
	}
	?>
	<input type="hidden" name="form_id" value="<?=$quesions[0]->id?>">
	<div>
		<span class="tag is-success"><?=$this->session->flashdata('message')?></span>
		<button class="m1 button is-primary">Сохранить</button>
	</div>
</form>
