<?php

/**
 * Description of News
 *
 * @author user
 */
class News {

    /**
     * Returns single news intem with specified id
     * @param integer $id
     */
    public static function getItemNewsById($id) {
        // Query to a DB
        return true;
        }

    /**
     * Returns an array of news items
     */
    public static function getNews() {
        // Query to a DB
        $host = 'localhost';
        $dbname = 'test';
        $charset = 'UTF8';
        $user = 'test';
        $pass = 'test';
        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
        
        $pdo = new PDO($dsn, $user, $pass, $opt);
        
        $newList = array();
        
        $result = $pdo->query('SELECT id, title, date, short_content ' . 'FROM news ' . 'ORDER BY date DESC ' . 'LIMIT 10');
        
        $i = 0;        
        while ($row = $result->fetch()) {
            $newList[$i]['id'] = $row['id'];
            $newList[$i]['title'] = $row['title'];
            $newList[$i]['date'] = $row['date'];
            $newList[$i]['short_content'] = $row['short_content'];
            $i++;
        }
        
        return $newList;
    }

}
