<?php
include_once('startup.php');
include_once('model.php');
$link = startup();
//Проверка на авторизацию пользователя
$user = $_SESSION['login'];

if($_GET['logout'] == true)
{
	logout();
	header('Location: /');
	exit();
}

$articles = articles_all($link);

include('theme/index.php');