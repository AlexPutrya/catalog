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
	}
	// Проверяем уникальность логина,и схожесть структуры с email
	public function isUnique(){

	}
	//Сравниеваем пароли, и проверяем на корректность минимум 8 символов
	public function correctPass(){

	}
	//Отправляем код подтверждения на email
	public function confirmReg(){
		
	}
}
?>