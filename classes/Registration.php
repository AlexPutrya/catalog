<?php
class Registration{
	private $user_name;
	private $user_login;
	private $password;
	private $repeat_password;
	private $database;

	public function __construct($user_name, $user_login, $user_password, $repeat_password){
		$this->user_name = $user_name;
		$this->user_login = $user_login;
		$this->password = $password;
		$this->repeat_password = $repeat_password;
		$this->database = new DB();
	}

	// Переводим в нижний регистр и проверяем схожесть структуры с email, а потом уникальность логина
	public function isUnique(){
		$this->user_login = htmlspecialchars(trim(strtolower($this->user_login)));
		if(!$this->user_login){
			echo "Поле с электронним адресом должно быть заполненно";
			exit;
		}elseif(!preg_match("/[0-9a-z_\.\-]+@[0-9a-z_\.\-]+\.[a-z]{2,3}/i", $this->user_login)){
			echo "Это не похоже на email";
			exit;
		}else{
			$sql ='SELECT email FROM users WHERE email = :email';
			$parametr = array("email" => "$this->user_login");
			$result = $this->database->getData($sql, $parametr);
			if($result){
				return true;
			}else{
				return false;
			}
		}
	}

	//Сравниеваем пароли, и проверяем на корректность минимум 8 символов
	public function correctPass(){
		if(strlen($this->password) >= 8){
			if($password == $repeat_password){
				return true;
			}else{
				echo "Пароли не совпадают"
			}
		}else{
			echo "Пароль должен быть не меньше 8 символов";
		}
	}

	//Отправляем код подтверждения на email
	public function confirmReg(){

	}
}
?>