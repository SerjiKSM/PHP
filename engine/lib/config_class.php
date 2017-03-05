<?php

    abstract class Config{
        const SITENAME = "MySite.com";
        const SECRET = "DGLJDG5";
        const ADDRESS = "http://lesson.local";
        const ADM_NAME = "Serji";
        const ADM_EMAIL = "sergiykrohmalniy@gmail.com";

        const API_KEY = "DKEL39DL";

        const DB_HOST = "localhost";
        const DB_USER = "root";
        const DB_PASSWORD = "";
        const DB_NAME = "dbphp";
        const DB_PREFIX = "xyz_";
        const DB_SYM_QUERY = "?";

        const DIR_IMG = "/images/";
        const DIR_IMG_ARTICLES = "/images/articles/";
        const DIR_IMG_AVATAR = "/images/avatar/";
        const DIR_TMPL = "/home/mysite.local/www/tmpl/";
        const DIR_EMAILS = "/home/mysite.local/www/emails/";

        const DIR_MESSAGES = "/home/mysite.local/www/messages.ini/";

        const FORMAT_DATE = "%d.%m.%Y %H:%M:%S";

        const COUNT_ARTICLES_ON_PAGE = "3";
        const COUNT_SHOW_PAGES = "10";

        const MIN_SEARCH_LEN ="3";
        const LEN_SEARCH_RES ="255";

        const DEFAULT_AVATAR = "default.png";
        const MAX_SIZE_AVATAR = "51200";

    }
?>
