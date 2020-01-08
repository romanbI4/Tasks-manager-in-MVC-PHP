<?php

Class model_admin extends Model
{

    /**
     * @return array
     */
    public static function GetInfo()
    {

        $db = Db::getConnection();
        $sql = "SELECT * FROM `taskmanager`";
        $result = $db->query($sql);
        $index = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $index[$i]['id'] = $row['id'];
            $index[$i]['name'] = $row['name'];
            $index[$i]['email'] = $row['email'];
            $index[$i]['text_of_task'] = $row['text_of_task'];
            $index[$i]['status'] = $row['status'];
            $index[$i]['admin'] = 'Отредактировано администратором';
            $i++;
        }
        return $index;

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
        $sql = 'INSERT INTO `taskmanager`(`name`, `email`,`text_of_task`) VALUES (:name,:email,:text_of_task)';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':text_of_task', $text_of_task, PDO::PARAM_STR);
        echo "<span style='color:blue;'>Данные добавлены</span>";
        return $result->execute();

    }
}
