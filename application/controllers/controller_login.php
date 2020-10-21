<?php

class Controller_Login extends Controller
{
    function action_index()
    {
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $row = login::getAdmin();
            if ($login == $row['login'] && md5($password) == $row['password']) {
                session_start();
                $_SESSION['admin'] = $password;
                header('Location:/index/admin');
            } else {
                    echo "<span style='color:red;'>Неправильный логин или пароль</span>";
            }
        }
        $this->view->generate('login_view.php', 'template_view.php');
    }
}
