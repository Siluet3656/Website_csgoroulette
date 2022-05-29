<?php
    $idd = filter_var(trim($_POST['ibal']),FILTER_SANITIZE_STRING);
    $bal = filter_var(trim($_POST['bal']),FILTER_SANITIZE_STRING);

    $mysql = new mysqli('localhost','root','root','register-bd');
    $resultbal = $mysql->query("SELECT `id` FROM `polzovat` WHERE `id`= '$idd'");
    $resultbaln = $mysql->query("SELECT `score` FROM `polzovat` WHERE `id`= '$idd'");
    $ba = $resultbal->fetch_assoc();
    $baln = $resultbaln->fetch_assoc();
    if(count($ba) == 0)
    {
        echo "Пользователь не найден";
        $mysql->close();
    }
    else if($idd == end($ba))
    {
        $mysql->query("UPDATE `polzovat` SET `score` = ($baln[score] + $bal) WHERE `id` = ($idd)");
        $mysql->close();
        echo "Баланс успешно пополнен";
        
    }
?>
<br>
<p><a href="/admin.php">ВЕРНУТЬСЯ</a></p>


