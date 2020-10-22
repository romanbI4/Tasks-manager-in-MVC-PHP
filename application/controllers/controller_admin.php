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
        }

    }

    function action_updateTask()
    {
        session_start();
        if (isset($_SESSION['admin'])) {
            if (!empty($_POST['text_of_task_admin']) && !empty($_POST['id_admin'])) {
                $id_admin = $_POST['id_admin'];
                $text_of_task_admin = strip_tags($_POST['text_of_task_admin']);
                if (isset($_POST['submit'])) {
                    admin::UpdateTask($text_of_task_admin, $id_admin);
                    header_remove();
                    header('Refresh: 1; URL=/index/admin');
                    echo "<span style='color:blue;'>Текст задания изменен</span>";
                }
            } else {
                echo "<span style='color:red;'>Не введены данные</span>";
                header_remove();
                header('Refresh: 2; URL=/index/admin');
            }
        }
        else {
            echo "<span style='color:red;'>Вы не администратор</span>";
            header_remove();
            header('Refresh: 1; URL=/index/login');
        }
    }

    function action_updateStatus()
    {
        session_start();
        if (isset($_SESSION['admin'])) {
            if(empty($_POST['status_admin'])) {
                $_POST['status_admin'] = 'not done';   
            }
            elseif($_POST['status_admin'] = 'on') {
                $_POST['status_admin'] = 'done';
            }
            if (!empty($_POST['id_admin']) && !empty($_POST['status_admin'])) {
                $id_admin = ($_POST['id_admin']);
                $status = $_POST['status_admin'];
                if (isset($_POST['submit'])) {
                    admin::UpdateStatus($status, $id_admin);
                    header_remove();
                    header('Refresh: 1; URL=/index/admin');
                    echo "<span style='color:blue;'>Статус изменен</span>";
                }
            } else {
                echo "<span style='color:red;'>Не введены данные</span>";
                header_remove();
                header('Refresh: 2; URL=/index/admin');
            }
        }
        else {
            echo "<span style='color:red;'>Вы не администратор</span>";
            header_remove();
            header('Refresh: 1; URL=/index/login');
        }
    }

    function action_logout()
    {
        session_start();
        session_destroy();
        header('Location:/index');
        echo "Успешно вышли из Админки!";
    }

}
