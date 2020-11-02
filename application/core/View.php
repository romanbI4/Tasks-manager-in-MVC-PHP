<?php

namespace App\core;

class View
{

    static function generate($template_view, $dataInView = null)
    {
        if(!empty($dataInView) && is_array($dataInView)) {
            extract($dataInView);
        }
        include 'application/views/' . $template_view;
    }
}
