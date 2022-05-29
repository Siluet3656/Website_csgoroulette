<?php
    $admen = filter_var(trim($_POST['aidi']),FILTER_SANITIZE_STRING);

    $mysql = new mysqli('localhost','root','root','register-bd');
    $resultadm = $mysql->query("SELECT `id` FROM `polzovat` WHERE `id`= '$admen'");
    $aed1 = $mysql->query("SELECT `prava` FROM `polzovat` WHERE `id`= '$admen'");
    $aedd1 = $aed1->fetch_assoc();
    $adm = $resultadm->fetch_assoc();
    if(count($adm)== 0)
    {
        echo "Пользователь не найден";
        $mysql->close();
    }
    else if(end($aedd1)==3)
    {
        echo "Вы не можете давать админку ГЛВНОМУ АДМИНУ ";
        $mysql->close();
    }
    else if($admen == end($adm))
    {
        $mysql->query("UPDATE `polzovat` SET `prava` = '2' WHERE `id` = ($admen)");
        $mysql->close();
        echo "Пользователь успешно стал АДМИНОМ";
    }
    
?>
<br>
<p><a href="/admin.php">ВЕРНУТЬСЯ</a></p>
