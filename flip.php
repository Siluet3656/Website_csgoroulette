<!DOCTYPE html>
<html lang="ru">
<head>
<title>csgodan.fun</title>
<link rel="icon" type="image/png" href="image/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="styles/style.css">
<script src="scripts/sessions.js"></script>
</head>
<body class="body">
<header class="header">
<h1 align="left" class="h1text">CSGODAN</h1>
<ul class="menu">
	<a class="menu" href="index.php">Главная &nbsp;&nbsp;</a>
	<a class="menu" href="flip.php">Флип &nbsp;&nbsp;</a>
	<a class="menu" href="mines.php">Мины</a>
</ul>
	<?php
@session_start();
$lol = $_SESSION["login"];
$mysql = new mysqli('localhost','root','root','register-bd');
$res = $mysql->query("SELECT * FROM `polzovat` WHERE `login`= '$lol'");
$ress = $res->fetch_assoc();
$mysql->close();
?>
<div class="name">
	<img src="image/noname.jpg" class="avatar">
	<p class="nametext" id="nametext"><?php echo $_SESSION['login']; ?></p>
	<p class="score" id="score">счёт: <?php echo $ress['score']; ?></p>
	<p><button class="exitb" onclick="deleteAllCookies()">Выйти</button></p>
	<p class="vos"><a href="admin.php"><?php if ($_SESSION['prava'] == 'admin') echo "Возможности создателя"; ?></a></p>
</div>
<div class="regiserform">
	<a class="button" href="reg.php">Регистрация&nbsp;&nbsp;&nbsp;</a>
	<a class="button" href="log.php">Вход</a>
</div>
</header>
<br>
<main class="main">
	<div class="hiden">
		<h1 style="text-align: center;">Флип</h1>
		<input class="bets" type="text" name="bet" id="bet" placeholder="Ставка" required="">
		<br><br>
		<input type="radio" name="coin" id="orel" class="orel" required="">
	<label class="oreltxt">Орёл</label>
</input>
		<input type="radio" name="coin" id="reshka" class="reshka">
	<label class="reshkatxt">Решка</label>
</input>
		<br><br>
		<img class="betimg" id="coinimg" src="/image/ru_hz.png">
		<button class="gobetbutton" onclick="coin()">Играть</button>
		<p style="position: relative; text-align: center; top: 70px;" id="result"></p>
	</div>
	<br><br>
</main>
<footer class="footer">
	<hr class="hr">
  <p>© 2021 Копирайт. <a href="">Влад а4</a>.</p>
  <p>Почта: <a href="mailto:sudaeto@yandex.ru">sudaeto@yandex.ru</a></p>
  <p id="phpsender"></p>
</footer>
</body>
</html>