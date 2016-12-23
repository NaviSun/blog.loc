<?php 
session_start();
// Менеджеры.

class C_Login extends C_Base
{
	public function action_login()
	{
			$mUsers = M_Users::Instance();
// Очистка старых сессий.
			$mUsers->ClearSessions();

	// Выход.
			$mUsers->Logout();
	// Обработка отправки формы.
			if (!empty($_POST))
			{
				if ($mUsers->Login($_POST['login'], 
				                   $_POST['password'], 
								   isset($_POST['remember'])))
				{
					header('Location: /');
					die();
				}
			}


		$this->title=$this->title.' :: Вход';
		$this->sidebar=$this->Template('view/v_right.php');
		$this->content = $this->Template('view/v_login.php', array('articles'=>$articles));
	}

	public function action_register()
	{
		$mUsers = M_Users::Instance();

			$a = $mUsers->Can(2, 1);
			var_dump($a);

		if (!empty($_POST))
			{
				if ($mUsers->Register($_POST['login'], 
				                   $_POST['password']))
				{
					header('Location: /');
					die();
				}
			}

		$this->title=$this->title.' :: Регистрация';
		$this->sidebar=$this->Template('view/v_right.php');
		$this->content = $this->Template('view/v_register.php', array('user'=>$this->user));
	}
}
?>