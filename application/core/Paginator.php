<?php

Class Paginator
{

    public static function connectDB()
    {
        $connect = Db::getConnection();
        return $connect;
    }

    public static function getAllArticles($start, $limit)
    {
        $connect = self::connectDB();
        $result = $connect->prepare("SELECT * FROM `taskmanager`" . Controller_Main::action_Sort() . " LIMIT " . $start . ", " . $limit);
        $result->execute();
        return self::setResultToArray($result);
    }

    public static function setResultToArray($result)
    {
        $array = array();
        while ($row = $result->fetch()) $array[] = $row;
        return $array;
    }

    public static function countArticles()
    {
        $connect = self::connectDB();
        $result = $connect->query("SELECT COUNT(`id`) FROM `taskmanager`" . Controller_Main::action_Sort());
        $result = $result->fetch();
        return $result[0];
    }

    public static function getStart($page, $limit)
    {
        return $limit * ($page - 1);
    }

    public static function pagination($page, $limit)
    {
        // общее кол-во строк в БД
        $count_articles = self::countArticles();
        // общее количество стр.
        $count_pages = ceil($count_articles / $limit);
        if ($page > $count_pages) $page = $count_pages;
        $prev = $page - 1;
        $next = $page + 1;
        if ($prev < 1) $prev = 1;
        if ($next > $count_pages) $next = $count_pages;
        $pagination = "";
        if ($count_pages > 1) {
            // pagination
            if ($page == 1) {
                $pagination .= "<span>Первая </span>";
            } else {
                $pagination .= "<a href='/index'>Предыдущая </a>";
                if ($prev == 1) $pagination .= "<a href='/index'>Первая </a>";
                else $pagination .= "<a href='/index?page=" . $prev . "'>Предыдущая </a>";
            }
            for ($i = 1; $i <= $count_pages; $i++) {
                if ($i == $page) $pagination .= "<span> " . $i . " </span>";
                elseif ($i == 1) $pagination .= "<a href='/index'> " . $i . " </a>";
                else $pagination .= "<a href='/index?page=" . $i . "'> " . $i . " </a>";
            }
            if ($page == $count_pages) {
                $pagination .= "<span> Следующая</span>";
                $pagination .= "<span> Последняя</span>";
            } else {
                $pagination .= "<a href='/index?page=" . $next . "'> Следующая</a>";
                $pagination .= "<a href='/index?page=" . $count_pages . "'> Последняя</a>";
            }
        }
        return $pagination;
    }
}