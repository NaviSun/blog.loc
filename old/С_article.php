<?php
include_once('startup.php');
include_once('model.php');
$link = startup();
$data = $_GET;

$id = $data['id'];

$article = articles_get($link, $id);

include('theme/article.php');
 ?>