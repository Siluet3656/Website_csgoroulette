<?php
    $login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);

$mysql = new mysqli('localhost','root','root','register-bd');


$result = $mysql->query("SELECT*FROM `polzovat` WHERE `login`= '$login'");
$user = $result->fetch_assoc();
if(count($user)==0)
{
    echo 'Тебя нет, зарегайся';
    ?>
    <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/styles/other.css">
    <link rel="icon" type="image/png" href="/image/favicon.ico" />
    <title>Не успех</title>
    </head>
    <p><a href="/reg.php">Регистрация</a></p>
    <p><a href="/log.php">Вернуться</a></p>
    <?php
    exit();
  
} elseif (password_verify($pass, $user['pass'])) {

if (end($user)==1)
{
setcookie('session',1, time() + 3600, "/");    
session_start();
$_SESSION["login"] = $user['login'];
$_SESSION["prava"] = "user";
}
else if (end($user)==2 || end($user)==3)
{
setcookie('session',1, time() + 3600, "/");
session_start();
$_SESSION["login"] = $user['login'];
$_SESSION["prava"] = "admin";
}

}
$mysql->close();
 

header('Location: /')

?>