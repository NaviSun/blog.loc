<?php 
include_once('startup.php');
include_once('model.php');

$link = startup();

$data = $_POST;
//Регистрация пользователя
if (!empty($data)) 
{
	if (!empty($data['login']) AND !empty($data['password'])) 
	{
		create_user($link, $data['login'], $data['password']);
	}
	else
	{
		$login = $data['login'];
		$password = '';
		$error = true;
	}
}
else
{
	$login = '';
	$password = '';
	$error = false;
}

//Проверка авторизации пользователя
$user = $_SESSION['login'];


if(!empty($user))
{
	header('Location: /');
	exit();
}
else
{

 // Если не авторизован Вывод в шаблон.
include('theme/reg.php');
}
?>
