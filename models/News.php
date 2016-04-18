<?php

/**
 * Description of News
 *
 * @author user
 */
class News {

    public static function getItemNewsById($id) {
        // обращение к БД
        echo 'Показать новость по id: ' . $id;
    }

    public static function getNews() {
        // обращение к БД
        echo 'Показать все новости';
    }

}
