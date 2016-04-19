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
        echo 'Show news by id: ' . $id;
    }

    /**
     * Returns an array of news items
     */
    public static function getNews() {
        // Query to a DB
        echo 'Show several news';
    }

}
