<?php
class DB{
	private $user = "alex";
	private $pass = "starwars";
	private $dsn = "mysql:host=localhost;dbname=catalog";
	private $opt = array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		);
	private $pdo;
	// При созданиие экземпляра сразу подключаемся к бд
	public function __construct(){
		$pdo = new PDO($this->dsn, $this->user, $this->pass, $this->opt);
	}
	// Запрос на получение данных, сам запрос будет формироватся в других классах
	public function getData($sql, $parametr){
		$smtm = $this->pdo->prepare($sql);
		$smtm->execute($parametr);
	}
}
?>