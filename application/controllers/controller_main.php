<?php

class Controller_Main extends Controller
{

    function action_index()
    {
        if (isset($_POST['submit'])) {
            $name = strip_tags($_POST['name']);
            $email = strip_tags($_POST['email']);
            $text_of_task = strip_tags($_POST['text_of_task']);
            $email_validate = filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!empty($name) && !empty($text_of_task) && !empty($email)) {
                if (preg_match('@[A-z]@u', $name)) {
                    if ($email_validate) {
                        model_main::InsertInfo($name, $email, $text_of_task);
                    } else {
                        echo "<span style='color:red;'>Введите верный Email(формата:test@text.com)</span>";
                    }
                } else {
                    echo "<span style='color:red;'>В имени разрешается использовать только символы</span>";
                }
            } else {
                echo "<span style='color:red;'>Введите данные</span>";
            }
        }
        $this->view->generate('template_view.php');
    }

    static function action_sort()
    {
        $orderField = $_POST['orderField'];
        $sort = $_POST['sort'];
        switch ($orderField) {
            case 'name' :
                if ($sort == 'DESC') {
                    $orderBy = "ORDER BY `name`" . $sort;
                } else ($sort == 'ASC'){
                $orderBy = "ORDER BY `name`" . $sort
                };
                break;
            case 'email':
                if ($sort == 'DESC') {
                    $orderBy = "ORDER BY `email`" . $sort;
                } else ($sort == 'ASC'){
                $orderBy = "ORDER BY `email`" . $sort
                };
                break;
            case 'status':
                if ($sort == 'DESC') {
                    $orderBy = "ORDER BY `status`" . $sort;
                } else ($sort == 'ASC'){
                $orderBy = "ORDER BY `status`" . $sort
                };
                break;
            default:
                $orderBy = "";
                break;
        }
        return $orderBy;
    }
}