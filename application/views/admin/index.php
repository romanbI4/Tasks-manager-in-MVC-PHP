<?php 
use App\models\admin;
?>
<head>
    <title>Панель администрирования</title>
    <?php require __DIR__ . '/../head.php'; ?>
</head>
<body>
    <h1 align="center">Панель администрирования</h1>
    <p align="right"><a href="/admin/logout" class="btn btn-success">Выход</a></p>
    <div id="update_box">
        <form method="POST" action="/admin/updateTask">
            <label for="text_of_task_admin">Введите текст задачи</label>
            <input type="text" name="text_of_task_admin"/>
            <label for="id_admin">Введите ид задачи</label>
            <input type="text" name="id_admin"/>
            <button name="submit" type="submit" class="btn btn-success">Обновить</button>
        </form>
    </div>
    <div id="update_box">
        <form method="POST" action="/admin/updateStatus">
            <label for="id_admin">Введите ид задачи</label>
            <input type="text" name="id_admin"/>
            <label for="status">Выберите статус задачи</label>
            <input type="checkbox" name="status_admin"/>
            <button name="submit" type="submit" class="btn btn-success">Обновить</button>
        </form>
    </div>
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
        $admin = new admin();
        foreach ($admin::GetInfo() as $index): ?>
            <tr>
                <td><?= $index['id'] ?></td>
                <td><?= $index['name'] ?></td>
                <td><?= $index['email'] ?></td>
                <td><?= $index['text_of_task'] ?></td>
                <?php if ($index['status'] == 'done') { ?>
                    <td><input type="checkbox" name="status_admin" checked disabled></td>
                <?php } else { ?>
                    <td><input type="checkbox" name="status_admin" disabled></td>
                <?php } ?>
                <td><?= $index['admin'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <button id="update_open">Изменить текст задачи</button>
    <button id="update_open">Изменить статус</button>
</body>
