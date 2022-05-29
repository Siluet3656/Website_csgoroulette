<?php
    $id = filter_var(trim($_POST['id']),FILTER_SANITIZE_STRING);

    $mysql = new mysqli('localhost','root','root','register-bd');
    $resultdel = $mysql->query("SELECT `id` FROM `polzovat` WHERE `id`= '$id'");
    $aed = $mysql->query("SELECT `prava` FROM `polzovat` WHERE `id`= '$id'");
    $aedd = $aed->fetch_assoc();
    $del = $resultdel->fetch_assoc();
    if(count($del)== 0)
    {
        echo "Пользователь не найден";
        $mysql->close();
    }
    else if(end($aedd)==3)
    {
        echo "Вы не можете удалить ГЛВНОГО АДМИНА ";
        $mysql->close();
    }
    else if($id == end($del))
    {
        //$mysql->query("DELETE FROM `polzovat` WHERE `id`='$id'");
        $mysql->query("UPDATE `polzovat` SET `login` = 'DELETED' WHERE `id` = ($id)");
        $mysql->query("UPDATE `polzovat` SET `pass` = 'DELETED' WHERE `id` = ($id)");
        $mysql->query("UPDATE `polzovat` SET `score` = '0' WHERE `id` = ($id)");
        $mysql->query("UPDATE `polzovat` SET `prava` = '0' WHERE `id` = ($id)");
        $mysql->close();
        echo "Пользователь успешно удален";
        
    }
?>
<br>
<p><a href="/admin.php">ВЕРНУТЬСЯ</a></p>

