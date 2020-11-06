<?php

namespace App\controllers;

use App\core\Controller;
use App\models\admin;

class adminController extends Controller
{

    public function actionIndex()
    {
        session_start();
        $path = $_SERVER['SCRIPT_NAME'];
        if ($_SESSION['admin'] == 123) {
            $this->view->generate('/admin/index.php', '/main/index.php');
        } else {
            session_destroy();
            header("Refresh: 1; URL=$path/login/index");
        }

    }

    function actionUpdateTask()
    {
        session_start();
        $path = $_SERVER['SCRIPT_NAME'];
        if (isset($_SESSION['admin'])) {
            if (!empty($_POST['text_of_task_admin']) && !empty($_POST['id_admin'])) {
                $id_admin = $_POST['id_admin'];
                $text_of_task_admin = strip_tags($_POST['text_of_task_admin']);
                if (isset($_POST['submit'])) {
                    admin::UpdateTask($text_of_task_admin, $id_admin);
                    header_remove();
                    header("Refresh: 1; URL=$path/admin/index");
                    echo "<span style='color:blue;'>Текст задания изменен</span>";
                }
            } else {
                echo "<span style='color:red;'>Не введены данные</span>";
                header_remove();
                header("Refresh: 2; URL=$path/admin/index");
            }
        }
        else {
            echo "<span style='color:red;'>Вы не администратор</span>";
            header_remove();
            header("Refresh: 1; URL=$path/login/index");
        }
    }

    function actionUpdateStatus()
    {
        session_start();
        $path = $_SERVER['SCRIPT_NAME'];
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
                    header("Refresh: 1; URL=$path/admin/index");
                    echo "<span style='color:blue;'>Статус изменен</span>";
                }
            } else {
                echo "<span style='color:red;'>Не введены данные</span>";
                header_remove();
                header("Refresh: 2; URL=$path/admin/index");
            }
        }
        else {
            echo "<span style='color:red;'>Вы не администратор</span>";
            header_remove();
            header("Refresh: 1; URL=$path/login/index");
        }
    }

    function actionLogout()
    {
        session_start();
        session_destroy();
        $path = $_SERVER['SCRIPT_NAME'];
        header("Location:$path");
        echo "Успешно вышли из Админки!";
    }

}
