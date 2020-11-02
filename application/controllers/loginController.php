<?php

namespace App\controllers;

use App\core\Controller;
use App\models\login;

class loginController extends Controller
{
    function actionIndex()
    {
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $row = login::getAdmin();
            if ($login == $row['login'] && md5($password) == $row['password']) {
                session_start();
                $_SESSION['admin'] = $password;
                header('Location:/admin/index');
            } else {
                    echo "<span style='color:red;'>Неправильный логин или пароль</span>";
            }
        }
        $this->view->generate('/login/index.php', '/main/index.php');
    }
}
