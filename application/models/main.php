<?php

Class main extends Model
{

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
        return $result->execute();

    }

    public static function getAllArticles($start, $limit)
    {
        $db = Db::getConnection();
        $result = $db->prepare("SELECT `id`, `name`, `email`, `text_of_task`, `status` FROM `taskmanager`" . Controller_Main::action_Sort() . " LIMIT " . $start . ", " . $limit);
        $result->execute();
        return $result;
    }

    public static function countArticles()
    {
        $db = Db::getConnection();
        $result = $db->query("SELECT COUNT(`id`) FROM `taskmanager`" . Controller_Main::action_Sort());
        return $result->fetch();
    }
}
