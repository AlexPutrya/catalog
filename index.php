<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

spl_autoload_register(function($class_name){
    include 'classes/' . $class_name . '.php';
});
$menu = [
    ['href'=>'home', 'value'=>'Главная'],
    ['href'=>'catalog', 'value'=>'Каталог'],
    ['href'=>'about', 'value'=>'О нас'],
    ['href'=>'contacts', 'value'=>'Контакты']
];
if(isset($_GET['page'])){
    $page = htmlspecialchars($_GET['page']);
}else{
    $page = 'home';
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $page?></title>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <?php
        //Навигация по станице
        echo "<ul>";
        foreach ($menu as $punkt){
            if($page == $punkt['href']){
                echo "<li><a class='bt_active' href ='index.php?page={$punkt['href']}'> {$punkt['value']}</a></li>";
            }else{
                echo "<li><a href ='index.php?page={$punkt['href']}'> {$punkt['value']}</a></li>";
            }
        }
        echo "<ul>";
        //Форма авторизации,должна выводится если не авторизирован
        include "template/authorization.tpl";
        
        include "template/$page.tpl";
        ?>
        
    </body>
</html>