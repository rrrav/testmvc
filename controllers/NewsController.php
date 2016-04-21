<?php

/**
 * Description of NewsController
 *
 * @author user
 */
/**
 * Model connect
 */
include_once(ROOT . '/models/News.php');

class NewsController
{

    /**
     * Returns an array with latest news
     * 
     * @return boolean
     */
    public function actionIndex()
    {
        // Query to a News model        
        $newList = array();
        $newList = News::getNews();

        // View connect
        require_once(ROOT . '/vews/news/index.php');

        return true;
    }

    /**
     * Returns an array with news specified id
     * 
     * @param integer $id
     * @return boolean
     */
    public function actionView($id)
    {
        // Query to a News model
        if ($id) {
            $newsItem = News::getItemNewsById($id);

            echo '<pre>';
            print_r($newsItem);
            echo '</pre>';
        }

        return true;
    }

}
