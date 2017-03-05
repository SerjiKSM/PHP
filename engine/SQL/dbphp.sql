-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 14 2016 г., 10:51
-- Версия сервера: 5.5.50
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dbphp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `xyz_articles`
--

CREATE TABLE IF NOT EXISTS `xyz_articles` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `img` varchar(255) NOT NULL,
  `intro` text NOT NULL,
  `full` text NOT NULL,
  `section_id` int(11) unsigned DEFAULT NULL,
  `cat_id` int(11) unsigned DEFAULT NULL,
  `date` int(10) unsigned NOT NULL,
  `meta_desc` varchar(255) NOT NULL,
  `meta_key` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `xyz_articles`
--

INSERT INTO `xyz_articles` (`id`, `title`, `img`, `intro`, `full`, `section_id`, `cat_id`, `date`, `meta_desc`, `meta_key`) VALUES
(1, 'HTML', '', '', '', NULL, NULL, 0, '', ''),
(2, 'CSS', 'articles', '', '', NULL, NULL, 0, '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `xyz_categories`
--

CREATE TABLE IF NOT EXISTS `xyz_categories` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `img` varchar(255) NOT NULL,
  `section_id` int(11) unsigned NOT NULL,
  `description` text NOT NULL,
  `meta_desc` varchar(255) NOT NULL,
  `meta_key` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `xyz_comments`
--

CREATE TABLE IF NOT EXISTS `xyz_comments` (
  `id` int(11) unsigned NOT NULL,
  `article_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `parent_id` int(11) unsigned DEFAULT NULL,
  `text` text NOT NULL,
  `date` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `xyz_courses`
--

CREATE TABLE IF NOT EXISTS `xyz_courses` (
  `id` int(10) unsigned NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `header` varchar(255) NOT NULL,
  `sub_header` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `link` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `did` int(10) unsigned DEFAULT NULL,
  `latest` tinyint(1) unsigned NOT NULL,
  `section_ids` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `xyz_menu`
--

CREATE TABLE IF NOT EXISTS `xyz_menu` (
  `id` int(11) unsigned NOT NULL,
  `type` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `external` tinyint(1) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `xyz_menu`
--

INSERT INTO `xyz_menu` (`id`, `type`, `title`, `link`, `parent_id`, `external`) VALUES
(1, 1, 'Главная', '/', NULL, 0),
(2, 1, 'HTML', 'html.html', NULL, 0),
(3, 1, 'HTML Основы', '/html-osnovy.html', 2, 0),
(4, 1, 'HTML Основы', '/html-osnovy.html', 2, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `xyz_polls`
--

CREATE TABLE IF NOT EXISTS `xyz_polls` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `state` tinyint(1) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `xyz_poll_data`
--

CREATE TABLE IF NOT EXISTS `xyz_poll_data` (
  `id` int(11) unsigned NOT NULL,
  `poll_id` int(11) unsigned NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `xyz_poll_voters`
--

CREATE TABLE IF NOT EXISTS `xyz_poll_voters` (
  `id` int(11) unsigned NOT NULL,
  `poll_data_id` int(11) unsigned NOT NULL,
  `ip` bigint(20) NOT NULL,
  `date` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `xyz_quotes`
--

CREATE TABLE IF NOT EXISTS `xyz_quotes` (
  `id` int(11) unsigned NOT NULL,
  `author` varchar(100) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `xyz_sections`
--

CREATE TABLE IF NOT EXISTS `xyz_sections` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `img` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `meta_desc` varchar(255) NOT NULL,
  `meta_key` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `xyz_users`
--

CREATE TABLE IF NOT EXISTS `xyz_users` (
  `id` int(11) unsigned NOT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(100) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `date_reg` int(10) unsigned NOT NULL,
  `activation` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `xyz_articles`
--
ALTER TABLE `xyz_articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `xyz_categories`
--
ALTER TABLE `xyz_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `xyz_comments`
--
ALTER TABLE `xyz_comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `xyz_courses`
--
ALTER TABLE `xyz_courses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `xyz_menu`
--
ALTER TABLE `xyz_menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `xyz_polls`
--
ALTER TABLE `xyz_polls`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `xyz_poll_data`
--
ALTER TABLE `xyz_poll_data`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `xyz_poll_voters`
--
ALTER TABLE `xyz_poll_voters`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `xyz_quotes`
--
ALTER TABLE `xyz_quotes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `xyz_sections`
--
ALTER TABLE `xyz_sections`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `xyz_users`
--
ALTER TABLE `xyz_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `xyz_articles`
--
ALTER TABLE `xyz_articles`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `xyz_categories`
--
ALTER TABLE `xyz_categories`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `xyz_comments`
--
ALTER TABLE `xyz_comments`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `xyz_courses`
--
ALTER TABLE `xyz_courses`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `xyz_menu`
--
ALTER TABLE `xyz_menu`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `xyz_polls`
--
ALTER TABLE `xyz_polls`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `xyz_poll_data`
--
ALTER TABLE `xyz_poll_data`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `xyz_poll_voters`
--
ALTER TABLE `xyz_poll_voters`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `xyz_quotes`
--
ALTER TABLE `xyz_quotes`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `xyz_sections`
--
ALTER TABLE `xyz_sections`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `xyz_users`
--
ALTER TABLE `xyz_users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
