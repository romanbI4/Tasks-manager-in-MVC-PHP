<?php

namespace App\core;
use PDO;

class Db
{
    /**
     * @return PDO
     */
    public static function getConnection()
    {

        $paramsPath = array(
            'host' => 'localhost',
            'dbname' => 'taskmanager',
            'user' => 'newuser',
            'password' => 'password',
        );

        $dsn = "mysql:host={$paramsPath['host']};dbname={$paramsPath['dbname']}";
        $db = new PDO($dsn, $paramsPath['user'], $paramsPath['password']);
        $db->exec("set names utf8");
        return $db;
    }
}

?>