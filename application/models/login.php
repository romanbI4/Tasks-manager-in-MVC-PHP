<?php

namespace App\models;

use App\core\Model;
use App\core\Db;
use App\controllers\loginController;

class login extends Model
{
    public static function getAdmin()
    {
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM `adminka`");
        $index = array();
        while ($row = $result->fetch()) {
            $index['login'] = $row['login'];
            $index['password'] = $row['password'];
        }
        return $index;
    }
    
}