<?
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_COOKIE['auth']) || $_COOKIE['auth'] != 'ok') {
    header('location: login.php');
}


?>

<html>

<head>
    <meta charset="utf-8">
    <title>table</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/custom.js"></script>

</head>
<body>
<a style="float:right;margin-right: 4%;margin-top: 1%;" class="btn btn-outline-warning" href="logout.php">Logout</a>
<pre>
    <? //проверка входящих данных
    if (isset($_POST['task'])) {
        $task = $_POST['task'];
    }
    if (isset($_POST['deadline'])) {
        $deadline = $_POST['deadline'];
    }
    if (isset($_GET['numberOfRecord'])) {
        $numberOfRecord = $_GET['numberOfRecord'];
    }


    ?>
</pre>

<?
//Сохранение в файл
if (!empty($task) && !empty($deadline)) {


    $fw = fopen("table.txt", 'a');
    $str = $task . '&' . $deadline . '&' . PHP_EOL;
    fwrite($fw, $str);
    fclose($fw);

}


/*//Через НОМЕР СТРОКИ
$file_out = file("table.txt"); // Считываем весь файл в массив //var_dump($file_out);
if (isset($numberOfRecord) && $numberOfRecord > 0) {
    $numberOfRecord--;
    unset($file_out[$numberOfRecord]);    //удаляем строчку
    $numberOfRecord = '';
}
file_put_contents("table.txt", implode("", $file_out));*/

//echo '---------------------------------------------------------------------------';
//var_dump($file_out);
//записываем нужную строку  в файл
//file_put_contents("rob.txt", $file_out[$row_number], FILE_APPEND);


//записали остачу в файл
//file_put_contents("co.txt", implode("", $file));
?>
</div>
<div class="tableDiv">
    <table class="table table-bordered">
        <thead class="table-primary">
        <tr>
            <td>Task</td>
            <td>Deadline</td>
            <td>Modify</td>
            <td>Delete</td>
        </tr>
        </thead>
        <?php

        $fp = fopen('table.txt', 'r');//Чтение в таблицу
        if ($fp) {
            // print_r($fp);
            $i = 0;
            while ($line = fgets($fp)) {

                if (!$line)
                    continue;

                $line = explode('&', $line);
                //(time()+11400

                if (count($line) < 2)
                    continue;
                $i++;
                $clThemeCss = '';
                if ( ($line[1]-time())< (60*60*24) ) {
                    echo '<pre>';
                    print_r($line[1] - time());
                    print_r(60*60*24);
                    echo '</pre>';
                    $clThemeCss = ' custColor table-danger';
                    }
                ?>

                <tr>
                    <td class="<?=$clThemeCss ?>"><?= $line[0] ?></td>
                    <td class="<?=$clThemeCss ?>"> <?= date('j',$line[1] - time()) . ' days' ?></td>
                    <td class="<?=$clThemeCss ?>"><a class="btn btn-primary" href="modify.php?id=<?= $i ?>">Modify</a></td>
                    <td class="<?=$clThemeCss ?>"><a class="btn btn-danger" href="delete.php?numberOfRecord=<?= $i ?>">Delete</a></td>
                    <!--                    <td><a class="btn btn-danger" href="#" id="delBtn" >X</a></td>-->
                </tr>

                <?
            }
        }
        fclose($fp); ?>

        <?php
        //if (!isset($_GET['numberOfRecord'])) {
        //echo 'str not found';
        //            $numberOfRecord = $i;
        //        }


        //echo $numberOfRecord . PHP_EOL;
        //Удаление ЧЕРЕЗ КНОПКУ В ТАБЛИЦЕ
        /*$file_out = file("table.txt"); // Считываем весь файл в массив //var_dump($file_out);
        if (isset($numberOfRecord) && $numberOfRecord > 0) {
            //$recordCount--;


            unset($file_out[$numberOfRecord]);    //удаляем строчку
            $numberOfRecord = '';
        }
        file_put_contents("table.txt", implode("", $file_out));
*/
        ?>

    </table>

</div>

<div class="formDivAdd">
    <form action="add.php" method="post">
        <p>Добавление данных в таблицу</p>
        <input autocomplete="off" placeholder="Task" name="task">
        <input autocomplete="off" type="number" placeholder="Deadline[days]" name="deadline">
        <button class="btn btn-outline-dark" type="submit">Send</button>
    </form>
</div>
<div class="formDivAdd">
    <form action="delete.php" method="get">
        <p>Удаление данных из таблицы по номеру строки</p>
        <input autocomplete="off" placeholder="Номер строки" name="numberOfRecord">
        <button class="btn btn-danger" type="submit">Delete</button>
    </form>
</div>
</body>
</html>