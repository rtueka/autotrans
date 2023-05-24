-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 17 2023 г., 13:54
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cours`
--

-- --------------------------------------------------------

--
-- Структура таблицы `buses`
--

CREATE TABLE `buses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `buses`
--

INSERT INTO `buses` (`id`, `name`, `number`, `created_at`, `updated_at`) VALUES
(1, 'Mercedes 22360C', 'р899во11', NULL, NULL),
(2, 'ГАЗель NEXT', 'т362ом11', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `license_date` date NOT NULL,
  `license_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `surname`, `patronymic`, `birthday`, `license_date`, `license_number`, `created_at`, `updated_at`) VALUES
(1, 'Иван', 'Абобусов', 'Иванович', '1981-04-23', '2022-03-02', '6758 836193', '2023-01-26 11:36:07', '2023-01-26 11:36:07');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'user', 'Пользователь', '2023-02-02 07:34:18', '2023-02-02 07:34:18'),
(2, 'admin', 'Администратор', '2023-02-02 07:34:18', '2023-02-02 07:34:18'),
(3, 'globaladmin', 'Главный Админ', '2023-02-02 07:35:13', '2023-02-02 07:35:13');

-- --------------------------------------------------------

--
-- Структура таблицы `routes`
--

CREATE TABLE `routes` (
  `id` int(11) NOT NULL,
  `fromm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `routes`
--

INSERT INTO `routes` (`id`, `fromm`, `tto`, `created_at`, `updated_at`) VALUES
(1, 'Сыктывкар', 'Ухта', NULL, NULL),
(2, 'Москва', 'Санкт-Петербург', NULL, NULL),
(3, 'Санкт-Петербург', 'Москва', NULL, NULL),
(4, 'Москва', 'Екатеринбург', NULL, NULL),
(5, 'Москва', 'Казань', NULL, NULL),
(6, 'Казань', 'Москва', NULL, NULL),
(7, 'Екатеринбург', 'Москва', NULL, NULL),
(8, 'Ухта', 'Сыктывкар', NULL, NULL),
(9, 'Сыктывкар', 'Усть-Кулом', NULL, NULL),
(10, 'Усть-Кулом', 'Сыктывкар', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `stations`
--

CREATE TABLE `stations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `param` int(11) NOT NULL,
  `route_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `stations`
--

INSERT INTO `stations` (`id`, `name`, `param`, `route_id`) VALUES
(1, 'Корткерос', 1, 9),
(2, 'Аджером', 2, 9),
(3, 'Сторожевск', 3, 9),
(4, 'Вомын', 4, 9),
(5, 'Подтыбок', 5, 9),
(6, 'Озъяг', 6, 9),
(7, 'Ульяново', 7, 9),
(8, 'Кебанъель', 8, 9),
(9, 'Сторожевск', 1, 1),
(10, 'Усть-Кулом', 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `date` time DEFAULT '00:00:00',
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tests`
--

INSERT INTO `tests` (`id`, `date`, `datetime`) VALUES
(1, '01:00:00', '2023-03-02 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tariff` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trip_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `way_id` int(11) NOT NULL,
  `create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tickets`
--

INSERT INTO `tickets` (`id`, `name`, `surname`, `patronymic`, `sex`, `document_type`, `document_number`, `place`, `tariff`, `trip_id`, `user_id`, `way_id`, `create_time`, `created_at`, `updated_at`) VALUES
(52, 'Иван', 'Осипов', 'Юрьевич', 'Мужской', 'Паспорт РФ', '9376582382', '18', 'Полный', 32, 7, 6, '2023-03-02 14:24:38', '2023-03-02', '2023-03-02'),
(53, 'Михаил', 'Петров', 'Сергеевич', 'Мужской', 'Паспорт РФ', '8756493756', '10', 'Полный', 32, 7, 6, '2023-03-02 14:25:48', '2023-03-02', '2023-03-02'),
(54, 'Богдан', 'Одинцов', 'Александрович', 'Мужской', 'Паспорт РФ', '7563867583', '1', 'Полный', 32, 7, 10, '2023-03-02 14:26:19', '2023-03-02', '2023-03-02');

-- --------------------------------------------------------

--
-- Структура таблицы `trips`
--

CREATE TABLE `trips` (
  `id` int(11) NOT NULL,
  `date_from` datetime NOT NULL,
  `date_to` datetime NOT NULL,
  `bus_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `driver_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `trips`
--

INSERT INTO `trips` (`id`, `date_from`, `date_to`, `bus_id`, `route_id`, `driver_id`, `created_at`, `updated_at`) VALUES
(28, '2023-02-12 10:10:00', '2023-02-12 12:45:00', 2, 9, 1, '2023-02-10', '2023-02-10'),
(32, '2023-02-15 12:10:00', '2023-02-18 18:45:00', 2, 1, 1, '2023-02-14', '2023-02-14'),
(33, '2023-02-25 00:00:00', '2023-02-25 02:00:00', 1, 9, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) UNSIGNED NOT NULL DEFAULT 1,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `role_id`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 2, '-', 'nleontev790@gmail.com', NULL, '$2y$10$r3RJAHsSbAp8MWGc/cEB6uwyuhcQm3UBA2pnmi4YXlBo4dRewYDN.', NULL, '2023-02-02 04:38:44', '2023-02-02 04:38:44'),
(10, 1, '88005553535', 'user@mail.ru', NULL, '$2y$10$w0HCUhbF7.2U426nN2jhI.2pFTcNZSEDSevAKFgE/Fi0CWRvEIrVW', NULL, '2023-02-06 04:42:47', '2023-02-06 04:42:47');

-- --------------------------------------------------------

--
-- Структура таблицы `ways`
--

CREATE TABLE `ways` (
  `id` int(11) NOT NULL,
  `fromm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_from` time DEFAULT '00:00:00',
  `time_to` time DEFAULT NULL,
  `route_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `ways`
--

INSERT INTO `ways` (`id`, `fromm`, `tto`, `time_from`, `time_to`, `route_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Сыктывкар', 'Корткерос', '00:00:00', '00:40:00', 9, 100, '2023-02-12 21:00:00', '2023-02-12 21:00:00'),
(2, 'Сыктывкар', 'Сторожевск', '00:00:00', '01:45:00', 9, 200, '2023-02-12 21:00:00', '2023-02-12 21:00:00'),
(4, 'Сыктывкар', 'Ухта', '00:00:00', '06:35:00', 1, 1000, '2023-02-14 09:13:03', '2023-02-14 09:13:03'),
(5, 'Сыктывкар', 'Сторожевск', '00:00:00', '01:35:00', 1, 200, '2023-02-14 09:13:03', '2023-02-14 09:13:03'),
(6, 'Сыктывкар', 'Усть-Кулом', '00:00:00', '03:00:00', 1, 400, '2023-02-14 09:36:40', '2023-02-14 09:36:40'),
(7, 'Сыктывкар', 'Усть-Кулом', '00:00:00', '03:30:00', 9, 400, '2023-02-25 11:52:40', '2023-02-25 11:52:40'),
(8, 'Сторожевск', 'Усть-Кулом', '01:35:00', '03:00:00', 1, 200, '2023-03-02 10:48:50', '2023-03-02 10:48:50'),
(9, 'Сторожевск', 'Ухта', '01:35:00', '06:35:00', 1, 800, '2023-03-02 10:48:50', '2023-03-02 10:48:50'),
(10, 'Усть-Кулом', 'Ухта', '03:00:00', '06:35:00', 1, 600, '2023-03-02 10:49:53', '2023-03-02 10:49:53'),
(11, 'Сыктывкар', 'Аджером', '00:00:00', '01:00:00', 9, 150, '2023-03-02 12:06:59', '2023-03-02 12:06:59'),
(12, 'Сторожевск', 'Усть-Кулом', '01:45:00', '03:30:00', 9, 200, '2023-03-02 12:06:59', '2023-03-02 12:06:59');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `route_id` (`route_id`);

--
-- Индексы таблицы `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_trip` (`trip_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `way_id` (`way_id`);

--
-- Индексы таблицы `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bus` (`bus_id`),
  ADD KEY `id_route` (`route_id`),
  ADD KEY `driver_id` (`driver_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- Индексы таблицы `ways`
--
ALTER TABLE `ways`
  ADD PRIMARY KEY (`id`),
  ADD KEY `route_id` (`route_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `buses`
--
ALTER TABLE `buses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `stations`
--
ALTER TABLE `stations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT для таблицы `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `ways`
--
ALTER TABLE `ways`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `stations`
--
ALTER TABLE `stations`
  ADD CONSTRAINT `stations_ibfk_1` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`);

--
-- Ограничения внешнего ключа таблицы `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`way_id`) REFERENCES `ways` (`id`);

--
-- Ограничения внешнего ключа таблицы `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_ibfk_1` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`),
  ADD CONSTRAINT `trips_ibfk_2` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`),
  ADD CONSTRAINT `trips_ibfk_3` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Ограничения внешнего ключа таблицы `ways`
--
ALTER TABLE `ways`
  ADD CONSTRAINT `ways_ibfk_1` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
