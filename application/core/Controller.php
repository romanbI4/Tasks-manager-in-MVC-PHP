<?php

namespace App\core;

use App\core\View;

class Controller
{

    public $model;
    public $view;

    function __construct()
    {
        $this->view = new View();
    }

    function action_index()
    {
        echo 1;
    }
}
