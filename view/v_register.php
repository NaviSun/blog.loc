<?php
	if ($user !== null){
			//header('Location: /');
			//die();
		} ?>
	
	<form method="post">
		E-mail: <input type="text" name="login" value = "<?=$_POST['login']?>" /><br/>
		Пароль: <input type="password" name="password" value = "<?=$_POST['password']?>"/><br/>
		<input type="submit" value = "Регистрация"/>		
	</form>