<?php

/**
 * Created by PhpStorm.
 * User: ElliotAnderson
 * Date: 16.04.2018
 * Time: 6:13
 */
class Db
{
    public static function getConnection()
    {
        $paramsPath = ROOT.'/config/db_params.php';
        $params = include($paramsPath);
        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn,$params['user'],$params['password']);
        return $db;
    }

}