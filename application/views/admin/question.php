<h1>вопрос: <?= $question->question ?></h1>

<form action="" method="post">
	<input class="input is-primary" type="text" name="question" placeholder="Вопрос" required value="<?=$question->question?>">
	<input type="hidden" name="id" value="<?=$question->id?>">
	<a href="/admin/questions" class="m1 button is-primary">Отмена</a>
	<button class="m1 button is-primary">Сохранить</button>
</form>

