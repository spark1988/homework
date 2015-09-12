<?php
require_once('lib.php');

$form = false;

if(isset($_GET['file'])){
    //Получение названия файла
    $edit_file = clearInput($_GET['file'],'s');

    // Проверка на наличие файла в папке
    if(check_file($edit_file,$files)){
        $form = true;
    }else{
        $errors[] = "Такого файла не существует!";
    }
}

if($_POST){
    $file_name_new = clearInput($_POST['file_name'],'s');
    $file_text = clearInput($_POST['file_text'],'s');
    $old_name = clearInput($_POST['old_name'],'s');

    if($file_name_new && $file_text && $old_name){
        if(!file_write($old_name,$file_text)){
            $errors[] = 'Нет прав для записи';
        }else{
            $success[] = 'Текст успешно изменен';
        }
        if($old_name != $file_name_new){
            if(rename(DIR.$old_name,DIR.$file_name_new)){
                $success[] = 'Файл успешно перееименован';
            }
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
    <title>Редактирование файла</title>
    <meta name="viewport" content="width=1000">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="wrap">
    <div class="container">
        <h3>Редактирование файла</h3>

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
                <input type="hidden" name="old_name" value="<?=$edit_file?>">
            <div class="form-group">
                <labal>Имя файла</labal>
                <input type="text" name="file_name" value="<?=$edit_file  ?>">
            </div>
            <div class="form-group">
                <label for="">Текст файла</label>
                <textarea name="file_text"><?=file_read($edit_file);?></textarea>
            </div>
            <div class="form-group">
                <input class="btn btn-success" type="submit" value="Редактировать">
            </div>
        </form>
        <?php endif; ?>
        <a class="btn btn-back" href="index.php">Вернуться на Главную</a>
    </div>
</div>
</body>
</html>