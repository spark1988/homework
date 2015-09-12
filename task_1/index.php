<?php
require_once('lib.php');
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1000">
    <title>Главная</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="wrap">
    <div class="container">
            <h1>Добрый День!</h1>
            <h3>Здесь ты можешь Читать и Добавлять Аннотации к интересным Книгам</h3>
            <div>
                <a class="btn btn-success" href="add_file.php">Add New File</a>
            </div>
            <table class="table">
                <tbody>
                    <?php   foreach ($files as $file): ?>
                        <tr>
                            <td><a href="view.php?file=<?=$file ?>"><?=$file ?></a></td>
                            <td><a href="edit.php?file=<?=$file ?>">Edit</a></td>
                            <td><a href="delete.php?file=<?=$file ?>">Delete</a></td>
                        </tr>
                     <?php    endforeach; ?>

                </tbody>
            </table>
    </div>
</div>
</body>
</html>
