<?php
require_once('lib.php');

if(isset($_GET['file'])){
    //Получение названия файла
    $edit_file = clearInput($_GET['file'],'s');


    if(unlink(DIR.$edit_file)){
        $success[] = 'Файл успешно удален';
    }

}

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Удаление файла</title>
    <meta name="viewport" content="width=1000">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="wrap">
    <div class="container">
        <h3>Удаление файла</h3>
        <?php
        if(!empty($errors)){
            echo "<div class='alert alert-error'>";
            foreach($errors as $error){
                echo $error . "<br/>";
            }
            echo "</div>";
        }
        ?>
        <?php
        if(!empty($success)){
            echo "<div class='alert alert-success'>";
            foreach($success as $item){
                echo $item . "<br/>";
            }
            echo "</div>";
        }
        ?>
        <a class="btn btn-back" href="index.php">Вернуться на Главную</a>
    </div>
</div>
</body>
</html>