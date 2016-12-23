<?php
Class M_Db
{
	// Настройки подключения к БД.
	private $hostname = 'localhost';
	private $username = 'root';
	private $password = 'mysql';
	private $dbName = 'blog';
	public $link;

	private static $instance;
	
	public static function Instance()
	{
		if (self::$instance == null)
			self::$instance = new M_Db();
		
		return self::$instance;
	}
	
	private function __construct()
	{
		self::startup();
	}
	private function startup()
	{
		// Языковая настройка.
	setlocale(LC_ALL, 'utf8');

	// Подключение к БД.
	$this->link = mysqli_connect($this->hostname, $this->username, $this->password, $this->dbName) or die('No connect with data base');
	mysqli_query($this->link, 'SET NAMES utf8');
	mysqli_select_db($this->link, $this->dbName) or die('No data base');
	return $this->link;
	}

		public function Select($query)
	{
		$result = mysqli_query($this->link, $query);
		
		if (!$result)
			die(mysqli_error($this->link));
		
		$n = mysqli_num_rows($result);
		$arr = array();
	
		for($i = 0; $i < $n; $i++)
		{
			$row = mysqli_fetch_assoc($result);		
			$arr[] = $row;
		}

		return $arr;				
	}
	
	//
	// Вставка строки
	// $table 		- имя таблицы
	// $object 		- ассоциативный массив с парами вида "имя столбца - значение"
	// результат	- идентификатор новой строки
	//
	public function Insert($table, $object)
	{			
		$columns = array(); 
		$values = array(); 
	
		foreach ($object as $key => $value)
		{
			$key = mysqli_real_escape_string($this->link, $key . '');
			$columns[] = $key;
			
			if ($value === null)
			{
				$values[] = 'NULL';
			}
			else	
				$value = mysqli_real_escape_string($this->link, $value . '');							
				$values[] = "'$value'";
			}
		

		$columns_s = implode(',', $columns); 
		$values_s = implode(',', $values);  
			
		$query = "INSERT INTO $table ($columns_s) VALUES ($values_s)";
		$result = mysqli_query($this->link, $query);
								
		if (!$result)
			die(mysqli_error($this->link));
			
		return mysqli_insert_id($this->link);
	}
	
	//
	// Изменение строк
	// $table 		- имя таблицы
	// $object 		- ассоциативный массив с парами вида "имя столбца - значение"
	// $where		- условие (часть SQL запроса)
	// результат	- число измененных строк
	//	
	public function Update($table, $object, $where)
	{
		$sets = array();
	
		foreach ($object as $key => $value)
		{
			$key = mysqli_real_escape_string($this->link, $key . '');
			
			if ($value === null)
			{
				$sets[] = "$value=NULL";			
			}
			else
			{
				$value = mysqli_real_escape_string($this->link, $value . '');					
				$sets[] = "$key='$value'";			
			}			
		}

		$sets_s = implode(',', $sets);			
		$query = "UPDATE $table SET $sets_s WHERE $where";
		$result = mysqli_query($this->link, $query);
		
		if (!$result)
			die(mysqli_error($this->link));

		return mysqli_affected_rows($this->link);	
	}
	
	//
	// Удаление строк
	// $table 		- имя таблицы
	// $where		- условие (часть SQL запроса)	
	// результат	- число удаленных строк
	//		
	public function Delete($table, $where)
	{
		$query = "DELETE FROM $table WHERE $where";		
		$result = mysqli_query($this->link, $query);
						
		if (!$result)
			die(mysqli_error($this->link));

		return mysqli_affected_rows($this->link);	
	}

}
