<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="theme/style.css">
	<title><?=$article['title']?></title>
</head>
<body>
<div class="wrapper">
<div class="container">
	<div class="content">
			<h1><?=$article['title']?></h1>
			<p><?=$article['content']?></p>
			<small><?=$article['login']?></small>
	</div>
	<div class="sidebar">
		<ul>
			<li><a href="editor.php">Редактор</a></li>
			<li><a href="new.php">Новая статья</a></li>
			<li><a href="/">Главная</a></li>
			<li><a href=""></a></li>
			<li><a href=""></a></li>
		</ul>
	</div>
</div>
</div>

</body>
</html>