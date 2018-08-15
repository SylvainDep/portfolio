<?php
/**
 * Created by PhpStorm.
 * User: sylvaindepardieu
 * Date: 26/07/2018
 * Time: 15:51
 */

namespace Portfolio\Model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=portfolio;charset=utf8', 'dbuser', '');
        return $db;
    }
}