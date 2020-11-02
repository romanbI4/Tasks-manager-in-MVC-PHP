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
        $logindata = array();
        while ($row = $result->fetch()) {
            $logindata['login'] = $row['login'];
            $logindata['password'] = $row['password'];
        }
        return $logindata;
    }
    
}