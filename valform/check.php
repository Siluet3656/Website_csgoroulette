<?php
    
 $login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
 $pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);

 $mysql = new mysqli('localhost','root','root','register-bd');
 $resulttt = $mysql->query("SELECT*FROM `polzovat` WHERE `login` = '$login' ");
 $resultt = $resulttt->fetch_assoc();
 $mysql->close();
 ?>
 <head>
   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="/styles/other.css">
   <link rel="icon" type="image/png" href="/image/favicon.ico" />
   <title>Успех</title>
</head>
 <?php
 if(count($resultt)==0)
 {

    if(mb_strlen($login)<3 || mb_strlen($login)>20)
    {
    echo 'ЭЭЭЭУ Перебор или Недобор';
    ?>
    <p><a href="/reg.php">Вернуться</a></p>
    <?php
    exit();
    }
    else if (mb_strlen($pass)<2 || mb_strlen($pass)>20)
    {
    ?>
    <p>Пароль МИН 2 Сисмвола!!</p>
    <p><a href="/reg.php">Вернуться</a></p>
    <?php
    exit();
    }

$options = [
    'cost' => 10 // the default cost is 10
];

$pass = password_hash($pass, PASSWORD_BCRYPT, $options);

$qq=0;
$mysql = new mysqli('localhost','root','root','register-bd');
$check = $mysql->query("SELECT `id` FROM `polzovat` WHERE `prava` = ($qq)");
$checkk = $check->fetch_assoc();
if($checkk != '')
{
$checkkk = end($checkk);
}
$mysql->close();
if($checkk == '')
{
$mysql = new mysqli('localhost','root','root','register-bd');
$mysql->query("INSERT INTO `polzovat` (`login`,`pass`) VALUES('$login','$pass')");
$mysql->close();
?>
Вы успешно зарегистрировались!!
<p><a href="/log.php">Войти</a></p>

<?php
}
else
{
   $mysql = new mysqli('localhost','root','root','register-bd');
   $mysql->query("UPDATE `polzovat` SET `pass` = '$pass' WHERE `id` = '$checkkk'");
   $mysql->query("UPDATE `polzovat` SET `login` = '$login' WHERE `id` = '$checkkk'");
   $mysql->query("UPDATE `polzovat` SET `prava` = '1' WHERE `id` = '$checkkk'");
   $mysql->close();
   ?>
   Вы успешно зарегистрировались!!
   <p><a href="/log.php">Войти</a></p>
   <?php
}

   }
 else
 {
    echo 'Логин занят';
    ?>
    <p><a href="/reg.php">Вернуться</a></p>
    <?php
 }
?>