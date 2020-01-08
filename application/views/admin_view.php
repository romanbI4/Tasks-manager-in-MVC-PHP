<h1 align="center">Панель администрирования</h1>
<p align="right"><a href="/index/admin/logout" class="btn btn-success">Выход</a></p>
<div id="update_box">
    <form method="POST" action="/index/admin/updateTask">
        <label for="text_of_task_admin">Введите текст задачи</label>
        <input type="text" name="text_of_task_admin"/>
        <label for="id_admin">Введите ид задачи</label>
        <input type="text" name="id_admin"/>
        <button name="submit" type="submit" class="btn btn-success">Обновить</button>
    </form>
</div>
<div id="update_box">
    <form method="POST" action="/index/admin/updateStatus">
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
    foreach (model_admin::GetInfo() as $index): ?>
        <tr>
            <td><?= $index['id'] ?></td>
            <td><?= $index['name'] ?></td>
            <td><?= $index['email'] ?></td>
            <td><?= $index['text_of_task'] ?></td>
            <? if ($index['status'] == 'done') { ?>
                <td><input type="checkbox" name="status_admin" checked></td>
            <? } else { ?>
                <td><input type="checkbox" name="status_admin"></td>
            <? } ?>
            <td><?= $index['admin'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<button id="update_open">Изменить текст задачи</button>
<button id="update_open">Изменить статус</button>
