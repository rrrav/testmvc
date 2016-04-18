<?php

/**
 * Description of NewsController
 *
 * @author user
 */

include_once(ROOT . '/models/News.php');

class NewsController {

    public function actionIndex() {
        // вызов модели News
        News::getNews();
        return true;
    }

    public function actionView($id) {
        // вызов модели News
        News::getItemNewsById($id);
        return true;
    }
}
