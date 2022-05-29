<?php
    $admen1 = filter_var(trim($_POST['adi']),FILTER_SANITIZE_STRING);

    $mysql = new mysqli('localhost','root','root','register-bd');
    $resultadm1 = $mysql->query("SELECT `id` FROM `polzovat` WHERE `id`= '$admen1'");
    $aed2 = $mysql->query("SELECT `prava` FROM `polzovat` WHERE `id`= '$admen1'");
    $aedd2 = $aed2->fetch_assoc();
    $adm1 = $resultadm1->fetch_assoc();
    if(count($adm1)== 0)
    {
        echo "Пользователь не найден";
        $mysql->close();
    }
    else if(end($aedd2)==3)
    {
        echo "Вы не можете забрать админку у ГЛВНОГО АДМИНА ";
        $mysql->close();
    }
    else if($admen1 == end($adm1))
    {
        $mysql->query("UPDATE `polzovat` SET `prava` = '1' WHERE `id` = ($admen1)");
        $mysql->close();
        echo "Пользователь больше не АДМИН";
    }
    
?>
<br>
<p><a href="/admin.php">ВЕРНУТЬСЯ</a></p>
