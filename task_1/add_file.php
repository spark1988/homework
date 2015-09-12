<?php
require_once('lib.php');

$form = true;

if($_POST){
    $file_name = clearInput($_POST['file_name'],'s');
    $file_text = clearInput($_POST['file_text'],'s');

    if($file_name && $file_text){
        if(!add_file($file_name,$file_text)){
            $errors[] = 'Нет прав для записи';
        }else{
            $success[] = 'Файл успешно добавлен';
            $form = false;
        }
    }else{
        $errors[] = 'Заполните все поля!';
    }

}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавление файла</title>
    <meta name="viewport" content="width=1000">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="wrap">
    <div class="container">
        <h3>Добавление файла</h3>

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
        <?php if($form): ?>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="form-group">
                    <label>Имя файла</label>
                    <input type="text" name="file_name" value="">
                </div>
                <div class="form-group">
                    <label for="">Текст файла</label>
                <textarea name="file_text" >

                </textarea>
                </div>
                <div class="form-group">
                    <input class="btn btn-success" type="submit" value="Добавить">
                </div>
            </form>
        <?php endif; ?>
        <a class="btn btn-back" href="index.php">Вернуться на Главную</a>
    </div>
</div>
</body>
</html>
