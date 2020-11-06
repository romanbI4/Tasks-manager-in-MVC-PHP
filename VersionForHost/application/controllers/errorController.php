<?php
namespace App\controllers;

use App\core\Controller;

class errorController extends Controller
{

    public function actionIndex()
    {
        $this->view->generate('/error/index.php', '/main/index.php');
        header_remove();
        header('Refresh: 5; URL=/');
    }

}
