<?php

/**
 * Description of News
 *
 * @author user
 */
class News
{

    /**
     * Returns single news intem with specified id
     * @param integer $id
     */
    public static function getItemNewsById($id)
    {
        // Query to a DB
        $pdo = Db::getConnect();

        $result = $pdo->query('SELECT * FROM news WHERE id=' . $id);
        $newsItem = $result->fetch();
        
        return $newsItem;
    }

    /**
     * Returns an array of news items
     */
    public static function getNews()
    {
        // Query to a DB
        $pdo = Db::getConnect();

        $result = $pdo->query('SELECT id, title, date, short_content '
                . 'FROM news '
                . 'ORDER BY date DESC '
                . 'LIMIT 10');

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
