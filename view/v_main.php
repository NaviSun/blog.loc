<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="view/style.css">
	<title><?=$title?></title>
</head>
<body>
	<div class="wrapper">
		<header>
		<?php if ($user == null): ?>
			Вы вошли как Гость <a href = "login.php">Вход</a> | <a href = "registretion.php">Регистрация</a>		
		<?php else:?>		
				Вы вошли как <?=$user['login']?>
				<a href = "?logout=true">Выход</a>
		<?php endif ?>
			<h1><?=$title?></h1>

		</header>
		<div class="container">
		<div class="content">
			<?=$content?>
		</div>
		<div class="sidebar">
			<ul>
				<?=$sidebar?>
			</ul>
		</div>
	</div>
		<footer>
			Школа программирования &copy
		</footer>
	</div>

</body>
</html>