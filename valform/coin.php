<?php


$balance = filter_var(trim($_GET['bet']),FILTER_SANITIZE_STRING);
$betss = trim($_GET['cho']);

if($_COOKIE['admin'] != '')
{
$lol = $_COOKIE['admin'];
}
else if($_COOKIE['user'] != '')
{
    $lol = $_COOKIE['user'];
}
$mysql = new mysqli('localhost','root','root','register-bd');
    $res = $mysql->query("SELECT `score` FROM `polzovat` WHERE `login`= '$lol'");
    $ress = $res->fetch_assoc();
    $ress = end($ress);
    $mysql->close();



if($balance>$ress)
{
    setcookie('answer', 1, time() + 3, "/");
    exit();
}
function make_seed()
{
  list($usec, $sec) = explode(' ', microtime());
  return $sec + $usec * 1000000;
}
srand(make_seed()+time());
$coin = rand(1,2);
if($betss == $coin)
{
    $mysql = new mysqli('localhost','root','root','register-bd');
    $res1 = $mysql->query("SELECT `score` FROM `polzovat` WHERE `login`= '$lol'");
    $ress1 = $res1->fetch_assoc();
    $ress1 = end($ress1);
    $balance = $ress1 + $balance;
    $mysql->query("UPDATE `polzovat` SET `score` = '$balance' WHERE `login`= '$lol'");
    $mysql->close();
    setcookie('answer', 2, time() + 3, "/");
    setcookie('score', $balance, time() + 3600, "/");
}
else
{
    $mysql = new mysqli('localhost','root','root','register-bd');
    $res1 = $mysql->query("SELECT `score` FROM `polzovat` WHERE `login`= '$lol'");
    $ress1 = $res1->fetch_assoc();
    $ress1 = end($ress1);
    $balance = $ress1 - $balance;
    $mysql->query("UPDATE `polzovat` SET `score` = '$balance' WHERE `login`= '$lol'");
    $mysql->close();
    setcookie('answer', 3, time() + 3, "/");
    setcookie('score', $balance, time() + 3600, "/");
}
?>