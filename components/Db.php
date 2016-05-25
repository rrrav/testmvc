<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Db connection class
 *
 * @author user
 */
class Db
{

    /**
     * Database connection
     * 
     * @return \PDO
     */
    public static function getConnect()
    {

        $paramsPath = ROOT . '/config/db_param.php';
        $params = include($paramsPath);

        $dsn = "mysql:host={$params['host']};"
                . "dbname={$params['dbname']};"
                . "charset={$params['charset']}";

        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );

        $pdo = new PDO($dsn, $params['user'], $params['pass'], $opt);

        return $pdo;
    }

}
