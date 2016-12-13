<?php
$menu = [
    ['href'=>'home', 'value'=>'Главная'],
    ['href'=>'catalog', 'value'=>'Каталог'],
    ['href'=>'about', 'value'=>'О нас'],
    ['href'=>'info', 'value'=>'Контакты']
];
if(isset($_GET['page'])){
    $page = htmlspecialchars($_GET['page']);
}else{
    $page = 'home';
}

?>
<html>
    <head>
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