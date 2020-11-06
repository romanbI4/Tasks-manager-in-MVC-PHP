<?php

namespace App\models;

use App\core\Model;
use App\core\Db;
use PDO;

Class admin extends Model
{

    /**
     * @return array
     */
    public static function GetInfo()
    {

        $db = Db::getConnection();
        $sql = "SELECT * FROM `taskmanager`";
        $result = $db->query($sql);
        $allTaskData = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $allTaskData[$i]['id'] = $row['id'];
            $allTaskData[$i]['name'] = $row['name'];
            $allTaskData[$i]['email'] = $row['email'];
            $allTaskData[$i]['text_of_task'] = $row['text_of_task'];
            $allTaskData[$i]['status'] = $row['status'];
            $allTaskData[$i]['admin'] = $row['admin'];
            $i++;
        }
        return $allTaskData;

    }

    /**
     * @param $name
     * @param $email
     * @param $text_of_task
     * @return bool
     */
    public static function InsertInfo($name, $email, $text_of_task)
    {

        $db = Db::getConnection();
        $sql = 'INSERT INTO `taskmanager`(`name`, `email`, `text_of_task`, `admin`) VALUES (:name,:email,:text_of_task,:admin)';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':text_of_task', $text_of_task, PDO::PARAM_STR);
        $result->bindParam(':admin', 'Добавлено администратором', PDO::PARAM_STR);
        return $result->execute();

    }

    public static function UpdateTask($text_of_task_admin, $id_admin) {
        $db = Db::getConnection();
        $result = $db->prepare("UPDATE `taskmanager` SET `text_of_task` = :text_of_task_admin, `admin` = 'Отредактировано администратором' WHERE `id` = :id");
        $result->bindParam(':text_of_task_admin', $text_of_task_admin, PDO::PARAM_STR);
        $result->bindParam(':id', $id_admin, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function UpdateStatus($status, $id_admin) {
        $db = Db::getConnection();
        $result = $db->prepare("UPDATE `taskmanager` SET `status` = :status WHERE `id` = :id");
        $result->bindParam(':id', $id_admin, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_STR);
        return $result->execute();
    }
    
}
