<?php
class Authorization{
	private $user_login;
	private $user_password;
	private $database;

	public function __construct($email, $password){
		$this->user_login = $email;
		$this->user_password = $password;
		$this->database = new DB();
	}
	// Проверяем не пустые ли поля, похож ли логин на email
	public function isCorrect(){
		if(!$this->user_login AND !$this->user_password){
			echo "Все поля должны быть заполненны";
		}elseif(!preg_match("/[0-9a-z_\.\-]+@[0-9a-z_\.\-]+\.[a-z]{2,3}/i", $this->user_login)){
			echo "Это не похоже на email";
		}else{
			return true;
		}
	}

	public function inspectionPassword(){
		$sql = 'SELECT user_password FROM users WHERE email = :email';
		$parametr = array("email" => "$this->user_login");
		$result = $this->database->myQuery($sql, $parametr, 'get');
		if($result['user_password'] == $this->user_password){
			return true;
		}else{
			return false;
		}
	}
}
?>