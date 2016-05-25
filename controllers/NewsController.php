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

        // echo '<pre>';
        // print_r($newList);
        // echo '</pre>';
        // exit('Done');

        // View connect
        require_once(ROOT . '/views/news/index.php');

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
        $newsItem = array();
        if ($id) {
            $newsItem = News::getItemNewsById($id);
        }

        // View connect
        require_once(ROOT . '/views/news/view.php');

        return true;
    }

}
