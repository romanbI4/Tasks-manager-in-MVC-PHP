<?php

function __autoload($classname) {
    $filename = __DIR__ . '/core/' . $classname .".php";
    require_once($filename);
}   
Route::start();

?>
