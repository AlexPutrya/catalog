<?php
$post_data = array();
if(!empty($_POST['user_name'])){
	foreach ($_POST as $key => $value) {
		$post_data[$key] = trim(htmlspecialchars($value));
	}
	$registration = new Registration($post_data['user_name'], $post_data['user_login'], $post_data['user_password'], $post_data['repeat_password'], $post_data['sex']);
	$registration->registration();
}
?>
<h1>Регистрация</h1>
<form action="index.php?page=registration" method="post"><br>
	Имя<br>
	<input type="text" name="user_name"><br>
	Логин(email)<br>
	<input type="text" name="user_login"><br>
	Пароль<br>
	<input type="password" name="user_password"><br>
	Повторите пароль<br>
	<input type="password" name="repeat_password"><br>
	Укажите ваш пол:<br> <input type="radio" name="sex" value="м" checked>мужской 
	<input type="radio" name="sex" value="ж"> 
	женский<br>
	<input type="submit" value="Отправить">
</form>