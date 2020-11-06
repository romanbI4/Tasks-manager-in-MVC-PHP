<?php 
use App\controllers\mainController;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Задачник</title>
    <?php require __DIR__ . '/../head.php'; ?>
</head>
<body>
<h1 style="text-align: center">Задачник</h1>
<p align="right"><a href="<?=$_SERVER['SCRIPT_NAME']?>/login/index" class="btn btn-success">Авторизация</a></p>
<p align="center">
    <?php 
        $paginator = new mainController();
        echo $paginator->pagination($paginator::$page, $paginator::LIMIT);
    ?>
</p>
<form method="GET">
    <div class="form-group">
        <label for="selectOrder">Сортировка по полю:
            <select name="orderField">
                <option>Выберите поле сортировки</option>
                <option name="name" value="name">Имя</option>
                <option name="email" value="email">Email</option>
                <option name="status" value="status">Статус</option>
            </select>
        </label>
        <label for="selectSort">по :
            <select name="sort">
                <option>Выберите вид сортировки</option>
                <option name="DESC" value="DESC">Убыванию</option>
                <option name="ASC" value="ASC">Возрастанию</option>
            </select>
        </label>
    </div>
    <button name="button" type="submit" class="btn btn-success">Сортировать</button>
</form>
<table class="table" id="table">
    <thead>
    <tr>
        <td>Номер задачи</td>
        <td>Имя пользователя</td>
        <td>Email</td>
        <td>Текст задачи</td>
        <td>Статус</td>
    </tr>
    </thead>
    <tbody>
        <?php
        foreach ($paginator::getAllArticles($paginator::$start, $paginator::LIMIT) as $articles): ?>
            <tr>
                <td><?= $articles['id'] ?></td>
                <td><?= $articles['name'] ?></td>
                <td><?= $articles['email'] ?></td>
                <td><?= $articles['text_of_task'] ?></td>
                <td><?= $articles['status'] ?></td>
            </tr>
        <?php endforeach;
        ?>
    </tbody>
</table>
<div id="preview"></div>
<a id="open" href="#" class="btn btn-success">Добавить новую задачу</a>
<a id="close" href="#" class="btn btn-success">Закрыть</a>
<div id="box" style="display: none;">
    <form enctype="multipart/form-data" method="POST" role="form" action="" id="form">
        <div class="form-group">
            <label for="name">Введите имя пользователя</label>
            <input type="text" class="form-control" name="name" id="name"/>
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email"/>
            <label for="text_of_task">Введите текст задачи:</label>
            <input type="text" class="form-control" name="text_of_task" id="text_of_task"/>
        </div>
        <button name="submit" type="submit" class="btn btn-success">Добавить</button>
    </form>
</div>
</body>
</html>