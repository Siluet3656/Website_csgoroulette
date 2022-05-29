<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="image/favicon.ico" />
	<link rel="stylesheet" href="styles/regstyle.css">
	<script src="scripts/align.js"></script>
	<title>Регистрация</title>
</head>
<body>


<div class="defolt">

	<?php
	//	if($_COOKIE['user']== '' && $_COOKIE['admin']== ''):
	?>


	<div class="row">
		<div class="col">
			<h1>Регистрация</h1>
			<form class="main" action="valform/check.php" method="post">
			<h2 class="ncolor">Login:</h2>
			<input class="button" type="text" name="login" placeholder="Login" required="" />
			<br>
			<h4 class="ncolor">Password:</h4>
			<input class="button" type="password" name="pass" placeholder="Password" 
			required="" />
			<br>
			<br>
			<input class="button" type="submit" value="Регистрация">
			<br><br>
			<a class="ncolor" href="index.php">Назад</a>
			</form>
		</div>
	</div>

</div>
</body>
</html>