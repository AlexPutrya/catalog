<?php
class Registration{
	private $user_name;
	private $user_login;
	private $password;
	private $repeat_password;
	private $sex;
	private $database;

	public function __construct($user_name, $user_login, $user_password, $repeat_password, $sex){
		$this->user_name = $user_name;
		$this->user_login = $user_login;
		$this->password = $user_password;
		$this->repeat_password = $repeat_password;
		$this->sex = $sex;
		$this->database = new DB();
	}

	// Переводим в нижний регистр и проверяем схожесть структуры с email, а потом уникальность логина
	public function isUnique(){
		$this->user_login = strtolower($this->user_login);
		if(!$this->user_login){
			echo "Поле с электронним адресом должно быть заполненно";
		}elseif(!preg_match("/[0-9a-z_\.\-]+@[0-9a-z_\.\-]+\.[a-z]{2,3}/i", $this->user_login)){
			echo "Это не похоже на email";
		}else{
			$sql ='SELECT email FROM users WHERE email = :email';
			$parametr = array("email" => "$this->user_login");
			$result = $this->database->myQuery($sql, $parametr, 'get');
			if($result){
				echo "Пользователь с таким логином уже зарегистрирован";
				return false;
			}else{
				return true;
			}
		}
	}

	//Сравниеваем пароли, и проверяем на корректность минимум 8 символов
	public function correctPass(){
		if(strlen($this->password) < 8){
			echo "Пароль должен быть не меньше 8 символов";
		}elseif($this->password != $this->repeat_password){
			echo "Пароли не совпадают";
		}else{
			return true;
		}
	}

	public function registration(){
		if(self::isUnique() AND self::correctPass()){
			$sql = "INSERT INTO users VALUES('', :name, :email, :pass, :sex)";
			$parametr = array(
				"name" => "$this->user_name",
				"email" => "$this->user_login",
				"pass" => "$this->password",
				"sex" => "$this->sex"
				);
			$this->database->myQuery($sql, $parametr, 'set');
			echo "Вы успешно зарегистрированны";
			exit;
		}else{
			echo "<br> Отредактируйте данные и попробуйте еще раз";
		}
	}
	//Отправляем код подтверждения на email
	public function confirmReg(){

	}
}
?>