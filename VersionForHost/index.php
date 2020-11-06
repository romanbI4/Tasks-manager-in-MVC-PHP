<?php
ini_set('display_errors', 1);
if (file_exists(__DIR__ . "/vendor/autoload.php")) { 
    require __DIR__ . "/vendor/autoload.php";  
    App\core\Route::start(); 
}
else {
    echo 'Error autoload classes';
}

?>