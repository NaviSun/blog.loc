<?php
	 foreach ($articles as $value):
?>
		<h1>
			<a href="article.php?id=<?=$value['id_article']?>"><?=$value['title']?></a>
		</h1>
		<p>
			<?=$value['content']?>
		</p>

<?php endforeach ?>