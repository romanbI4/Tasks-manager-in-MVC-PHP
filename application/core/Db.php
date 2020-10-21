<?php
/**
 * Created by IntelliJ IDEA.
 * User: vdovr
 * Date: 17.03.2018
 * Time: 22:49
 */

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
        // Получаем параметры подключения из файла

        // Устанавливаем соединение
        $dsn = "mysql:host={$paramsPath['host']};dbname={$paramsPath['dbname']}";
        $db = new PDO($dsn, $paramsPath['user'], $paramsPath['password']);
        // Задаем кодировку
        $db->exec("set names utf8");
        return $db;
    }
}

?>