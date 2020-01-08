<?php

class Controller_Admin extends Controller
{

    function action_index()
    {
        session_start();

        if ($_SESSION['admin'] == 123) {
            $this->view->generate('admin_view.php', 'template_view.php');
        } else {
            session_destroy();
            header('Refresh: 1; URL=/index/login');
            //Route::ErrorPage404();
        }

    }

    function action_updateTask()
    {
        if (isset($_POST['text_of_task_admin']) && isset($_POST['id_admin'])) {
            $db = Db::getConnection();
            $id_admin = ($_POST['id_admin']);
            $text_of_task_admin = strip_tags($_POST['text_of_task_admin']);
            if (isset($_POST['submit'])) {
                $result = $db->prepare("UPDATE `taskmanager` SET `text_of_task` = :text_of_task_admin WHERE `id` = :id");
                $result->bindParam(':text_of_task_admin', $text_of_task_admin, PDO::PARAM_STR);
                $result->bindParam(':id', $id_admin, PDO::PARAM_INT);
                $result->execute();
                header_remove();
                header('Refresh: 1; URL=/index/admin');
                echo "<span style='color:blue;'>Текст задания изменен</span>";
            }
        } else echo "<span style='color:red;'>Не введены данные</span>";
    }

    function action_updateStatus()
    {
        if (isset($_POST['id_admin']) && isset($_POST['status_admin'])) {
            $db = Db::getConnection();
            $id_admin = ($_POST['id_admin']);
            $status = $_POST['status_admin'];
            if (isset($_POST['submit'])) {
                $result = $db->prepare("UPDATE `taskmanager` SET `status` = :status WHERE `id` = :id");
                $result->bindParam(':id', $id_admin, PDO::PARAM_INT);
                $result->bindParam(':status', $status, PDO::PARAM_BOOL);
                $result->execute();
                header_remove();
                header('Refresh: 1; URL=/index/admin');
                echo "<span style='color:blue;'>Статус изменен</span>";
            }
        } else echo "<span style='color:red;'>Не введены данные</span>";
    }

    function action_logout()
    {
        session_start();
        session_destroy();
        header('Location:/index');
        echo "Успешно вышли из Админки!";
    }

}
