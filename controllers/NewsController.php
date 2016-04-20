<?php

/**
 * Description of NewsController
 *
 * @author user
 */

// Connect model
include_once(ROOT . '/models/News.php');

class NewsController {

    public function actionIndex() {
        // Query to a News model        
        $newList = array();
        $newList = News::getNews();  
        
        echo '<pre>';
        print_r($newList);
        echo '</pre>';
        
        return true;
    }

    public function actionView($id) {
        // Query to a News model
        if ($id) {
            $newsItem = News::getItemNewsById($id);
        }        
        
        return true;
    }
}
