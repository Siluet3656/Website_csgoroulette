<?php
    @session_start();
    if ($_SESSION['prava'] == 'admin') {
    echo "ВСЕ ПОЛЬЗОВАТЕЛИ:
          <br>";
    function printResultSet ($result_set) {
        echo "Кол-во записей ".$result_set->num_rows."<br/>";
        while (($row = $result_set->fetch_assoc()) !=false) {
        print_r($row);
        echo "<br/>";
        }
        echo "----------------------------<br/>";
    }
    $mysql = new mysqli('localhost','root','root','register-bd');
    $result_set = $mysql->query ("SELECT `id`,`login`,`score`,`prava` FROM `polzovat`");
    printResultSet($result_set);
    $mysql->close ();
    echo "<div class=\"colonki\">
    <div class=\"stroki\">
        <form action=\"valform/delete.php\" method=\"post\">
        <h2>Удалить пользователя:</h2>
        <input type=\"text\" name=\"id\" placeholder=\"Введите id\"  /> <input type=\"submit\" value=\"Удалить\">
        </form>
    </div>
    <div class=\"stroki\">
        <form action=\"valform/give.php\" method=\"post\">
        <h2>Дать админку:</h2>
        <input type=\"text\" name=\"aidi\" placeholder=\"Введите id\"  /> <input type=\"submit\" value=\"Выдать Админку\">
    </form>
    </div>
    <div class=\"stroki\">
        <form action=\"valform/ungive.php\" method=\"post\">
        <h2>Забрать админку:</h2>
        <input type=\"text\" name=\"adi\" placeholder=\"Введите id\"  /> <input type=\"submit\" value=\"Забрать Админку\">
    </form>
    <div class=\"stroki\">
        <form action=\"valform/bal.php\" method=\"post\">
        <h2>Выдать баланс:</h2>
        <input type=\"text\" name=\"ibal\" placeholder=\"Введите id\"  />
        <input type=\"text\" name=\"bal\" placeholder=\"Введите сумму\"  /> <input type=\"submit\" value=\"Выдать баланс\">
        </form>
    </div>
        <p><a href=\"/index.php\">ВЕРНУТЬСЯ</a></p>
    </div>
 </div>";
} else {
    echo "Чё ты здесь забыл?";
}

?>