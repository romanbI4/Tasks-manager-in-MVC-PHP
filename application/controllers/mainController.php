<?php

namespace App\controllers;

use App\core\Controller;
use App\models\main;

class mainController extends Controller
{
    const LIMIT = 3;
    const PAGE = 1;
    static public $page, $start;

    function actionIndex()
    {
        if (isset($_POST['submit'])) {
            $name = strip_tags($_POST['name']);
            $email = strip_tags($_POST['email']);
            $text_of_task = strip_tags($_POST['text_of_task']);
            $email_validate = filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!empty($name) && !empty($text_of_task) && !empty($email)) {
                if (preg_match('@[A-z]@u', $name)) {
                    if ($email_validate) {
                        main::InsertInfo($name, $email, $text_of_task);
                        header_remove();
                        header('Refresh: 1; URL=/main/index');
                        echo "<span style='color:blue;'>Данные добавлены</span>";
                    } else {
                        echo "<span style='color:red;'>Введите верный Email(формата:test@text.com)</span>";
                    }
                } else {
                    echo "<span style='color:red;'>В имени разрешается использовать только символы</span>";
                }
            } else {
                echo "<span style='color:red;'>Введите данные</span>";
            }
        }
        if (isset($_GET["page"])) {
            self::$page = $_GET["page"];
        }    
        else {
            self::$page = self::PAGE;
        }
        self::$start = self::getStart(self::$page, self::LIMIT);
        $this->view->generate('/main/index.php', [
            'page' => self::$page,
            'start' => self::$start,
        ]);
    }

    static function actionSort()
    {
        if (isset($_GET['orderField']) && isset($_GET['sort'])) {
            $orderField = $_GET['orderField'];
            $sort = $_GET['sort'];
            switch ($orderField) {
                case 'name':
                    if ($sort == 'DESC') {
                        $orderBy = "ORDER BY `name`" . $sort;
                    } elseif ($sort == 'ASC') {
                        $orderBy = "ORDER BY `name`" . $sort;
                    }
                    break;
                case 'email':
                    if ($sort == 'DESC') {
                        $orderBy = "ORDER BY `email`" . $sort;
                    } elseif ($sort == 'ASC') {
                        $orderBy = "ORDER BY `email`" . $sort;
                    }
                    break;
                case 'status':
                    if ($sort == 'DESC') {
                        $orderBy = "ORDER BY `status`" . $sort;
                    } elseif ($sort == 'ASC') {
                        $orderBy = "ORDER BY `status`" . $sort;
                    }
                    break;
                default:
                    $orderBy = "";
                    break;
            }
            return $orderBy;
        }
    }

    public static function getAllArticles($start, $limit)
    {
        $result = self::setResultToArray(main::getAllArticles(self::$start, self::LIMIT));  
        return $result;
    }

    public static function setResultToArray($result)
    {
        $arrayAllArticles = array();
        while ($row = $result->fetch()) $arrayAllArticles[] = $row;
        return $arrayAllArticles;
    }

    public static function countArticles()
    {
        $result = main::countArticles();
        return $result[0];
    }

    public static function getStart($page, $limit)
    {
        return $limit * ($page - 1);
    }

    public static function pagination($page, $limit)
    {
        $count_articles = self::countArticles();
        $count_pages = ceil($count_articles / self::LIMIT);
        if ($page > $count_pages) $page = $count_pages;
        $prev = $page - 1;
        $next = $page + 1;
        if ($prev < 1) $prev = 1;
        if ($next > $count_pages) $next = $count_pages;
        $pagination = "";
        if ($count_pages > 1) {
            if (isset($_GET['orderField']) && isset($_GET['sort'])) {
                if ($page == 1) {
                    $pagination .= "<span>Первая </span>";
                } else {
                    $pagination .= "<a href='/?page=" . $prev . '&orderField=' . $_GET['orderField'] . '&sort=' . $_GET['sort'] . "'>Предыдущая </a>";
                    if ($prev == 1) $pagination .= "<a href='/?page=" . $prev . '&orderField=' . $_GET['orderField'] . '&sort=' . $_GET['sort'] . "'>Первая </a>";
                    else $pagination .= "<a href='/?page=" . $prev . '&orderField=' . $_GET['orderField'] . '&sort=' . $_GET['sort'] . "'>Предыдущая </a>";
                }
                for ($i = 1; $i <= $count_pages; $i++) {
                    if ($i == $page) $pagination .= "<span> " . $i . " </span>";
                    elseif ($i == 1) $pagination .= "<a href='/?page=" . $i . '&orderField=' . $_GET['orderField'] . '&sort=' . $_GET['sort'] . "'> " . $i . " </a>";
                    else $pagination .= "<a href='/?page=" . $i . '&orderField=' . $_GET['orderField'] . '&sort=' . $_GET['sort'] . "'> " . $i . " </a>";
                }
                if ($page == $count_pages) {
                    $pagination .= "<span> Следующая</span>";
                    $pagination .= "<span> Последняя</span>";
                } else {
                    $pagination .= "<a href='/?page=" . $next . '&orderField=' . $_GET['orderField'] . '&sort=' . $_GET['sort'] . "'> Следующая</a>";
                    $pagination .= "<a href='/?page=" . $count_pages . '&orderField=' . $_GET['orderField'] . '&sort=' . $_GET['sort'] . "'> Последняя</a>";
                }
            } else {
                // pagination
                if ($page == 1) {
                    $pagination .= "<span>Первая </span>";
                } else {
                    $pagination .= "<a href='/'>Предыдущая </a>";
                    if ($prev == 1) $pagination .= "<a href='/'>Первая </a>";
                    else $pagination .= "<a href='/?page=" . $prev . "'>Предыдущая </a>";
                }
                for ($i = 1; $i <= $count_pages; $i++) {
                    if ($i == $page) $pagination .= "<span> " . $i . " </span>";
                    elseif ($i == 1) $pagination .= "<a href='/'> " . $i . " </a>";
                    else $pagination .= "<a href='/?page=" . $i . "'> " . $i . " </a>";
                }
                if ($page == $count_pages) {
                    $pagination .= "<span> Следующая</span>";
                    $pagination .= "<span> Последняя</span>";
                } else {
                    $pagination .= "<a href='/?page=" . $next . "'> Следующая</a>";
                    $pagination .= "<a href='/?page=" . $count_pages . "'> Последняя</a>";
                }
            }
        }
        return $pagination;
    }
   
}