<?php

namespace App\controllers;

use App\core\Controller;
use App\models\login;

class loginController extends Controller
{
    function actionIndex()
    {
        $path = $_SERVER['SCRIPT_NAME'];
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $row = login::getAdmin();
            if ($login == $row['login'] && md5($password) == $row['password']) {
                session_start();
                $_SESSION['admin'] = $password;
                header("Location:$path/admin/index");
            } else {
                echo "<span style='color:red;'>Неправильный логин или пароль</span>";
            }
        }
        $this->view->generate('/login/index.php', '/main/index.php');
    }
}
