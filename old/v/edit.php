	<? if($error) :?>
		<b style="color: red;">Заполните все поля!</b>
	<? endif ?>
	<form action ="" method="post">
		Название:
		<br/>
		<input type="text" name="title" value="<?=$title?>" />
		<br/>
		<br/>
		Содержание:
		<br/>
		<textarea name="content"><?=$content?></textarea>
		<br/>
		<input type="submit" value="Изменить" />
	</form>
