
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Регистрация</title>
</head>
<body>
<h1>Форма регистрации</h1>
<hr>
	<? if($error) :?>
		<b style="color: red;">Заполните все поля!</b>
	<? endif ?>	
	<form action="" method="post">
	<label>
		<input type="text" name="login" value = "<?=$login?>"></input> Имя
		<br>
		<br>
	</label>
	<label>
		<input type="text" name="password"></input> Пароль
	</label>
		<br>
		<br>
		<input type="submit" value = "Регистрация"></input>
	</form>
</body>
</html>