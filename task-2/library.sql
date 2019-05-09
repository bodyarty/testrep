-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 09 2019 г., 06:32
-- Версия сервера: 5.6.41
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `library`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE `authors` (
  `authorID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Заявки учасников конкурса';

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`authorID`, `name`) VALUES
(1, 'Иван Васин'),
(2, 'Петр Козлов'),
(3, 'Александр Серый'),
(4, 'Олег Верещагин'),
(5, 'Антон Карабанов'),
(6, 'Андрей Повелецкий');

-- --------------------------------------------------------

--
-- Структура таблицы `authors_books`
--

CREATE TABLE `authors_books` (
  `author_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица связи заявок участников и номинаций конкурса';

--
-- Дамп данных таблицы `authors_books`
--

INSERT INTO `authors_books` (`author_id`, `book_id`) VALUES
(1, 3),
(2, 5),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(4, 3),
(4, 4),
(5, 1),
(5, 2),
(5, 4),
(6, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `bookID` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Номинации конкурса';

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`bookID`, `title`) VALUES
(1, 'Голый король'),
(2, 'Курочка Ряба'),
(3, 'Один день'),
(4, '12 стульев'),
(5, 'Там шли два брата'),
(6, 'Как закалялась сталь'),
(7, 'Автостопом по галактике');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`authorID`);

--
-- Индексы таблицы `authors_books`
--
ALTER TABLE `authors_books`
  ADD PRIMARY KEY (`author_id`,`book_id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authors`
--
ALTER TABLE `authors`
  MODIFY `authorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `authors_books`
--
ALTER TABLE `authors_books`
  ADD CONSTRAINT `FK_author` FOREIGN KEY (`author_id`) REFERENCES `authors` (`authorID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_books` FOREIGN KEY (`book_id`) REFERENCES `books` (`bookID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
