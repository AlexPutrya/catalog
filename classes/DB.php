<?php
class DB{
	public $user = "alex";
	public $pass = "starwars";
	public $dsn = "mysql:host=localhost;dbname=catalog";
	public $opt = array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		);
	private $pdo;
	// При созданиие экземпляра сразу подключаемся к бд
	public function __construct(){
		$this->pdo = new PDO($this->dsn, $this->user, $this->pass, $this->opt);
	}
	// Запрос на получение данных, сам запрос будет формироватся в других классах
	public function myQuery($sql, $parametr, $die){
		$smtm = $this->pdo->prepare($sql);
		switch ($die) {
			case 'get':
				$smtm->execute($parametr);
				 return $smtm->fetch();
				break;
			case 'set':
				$smtm->execute($parametr);
				break;
			default:
				echo "Неизвестный запрос";
				break;
		}
		
	}
}
?>