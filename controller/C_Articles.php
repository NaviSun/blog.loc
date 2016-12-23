<?php
//
// Конттроллер статей
//

class C_Articles extends C_Base
{
	
	//
	// Конструктор.
	//
	function __construct()
	{		
		parent::__construct();
	}
	
	public function action_all(){
		$this->title=$this->title.' :: Все статьи';
		$mArticles = M_Articles::Instance();
		$articles = $mArticles->all();
		
		foreach($articles as $key => $article){
			$articles[$key]['content'] = $mArticles->articles_intro($article['content']);
		}
		
		$this->content = $this->Template('view/v_index.php', array('articles'=>$articles));
	}
}
