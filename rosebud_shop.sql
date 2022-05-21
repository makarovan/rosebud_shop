-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 03 2022 г., 17:15
-- Версия сервера: 10.4.17-MariaDB
-- Версия PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `rosebud_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `conversations`
--

CREATE TABLE `conversations` (
  `idConversation` int(11) NOT NULL,
  `user1Id` int(11) NOT NULL,
  `user2Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `conversations`
--

INSERT INTO `conversations` (`idConversation`, `user1Id`, `user2Id`) VALUES
(1, 3, 4),
(2, 4, 2),
(3, 16, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `idMessage` int(200) NOT NULL,
  `fromUserId` int(200) NOT NULL,
  `toUserId` int(200) NOT NULL,
  `messageText` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`idMessage`, `fromUserId`, `toUserId`, `messageText`, `date`) VALUES
(1, 4, 3, 'Привет!', '2021-10-28 13:37:51'),
(2, 4, 2, 'hi', '2021-10-28 14:01:30'),
(3, 16, 2, 'fhskhf', '2021-10-28 14:06:26'),
(4, 4, 2, 'adddd', '2021-10-28 14:06:52');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `idOrder` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `sellerId` int(11) NOT NULL,
  `buyerId` int(11) NOT NULL,
  `booked` tinyint(1) NOT NULL DEFAULT 0,
  `payed` tinyint(1) NOT NULL DEFAULT 0,
  `gotPayment` tinyint(1) NOT NULL DEFAULT 0,
  `delivered` tinyint(1) NOT NULL DEFAULT 0,
  `got` tinyint(1) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`idOrder`, `productId`, `sellerId`, `buyerId`, `booked`, `payed`, `gotPayment`, `delivered`, `got`, `date`) VALUES
(2, 3, 4, 1, 1, 0, 0, 0, 0, '2021-09-02 21:00:00'),
(3, 5, 2, 16, 0, 0, 0, 0, 0, '2022-05-02 16:08:36'),
(13, 26, 4, 2, 0, 0, 0, 0, 1, '2022-05-02 15:47:45'),
(15, 12, 4, 2, 1, 0, 0, 0, 0, '2022-04-29 18:22:52'),
(16, 17, 4, 17, 1, 1, 1, 1, 1, '2022-04-26 21:00:00'),
(17, 21, 2, 17, 1, 0, 0, 0, 0, '2022-04-20 21:00:00'),
(18, 47, 17, 4, 1, 0, 0, 0, 0, '2022-04-29 18:21:14'),
(19, 64, 17, 17, 1, 0, 0, 0, 0, '2022-04-28 21:00:00'),
(20, 2, 4, 17, 1, 0, 0, 0, 0, '2022-04-28 21:00:00'),
(21, 25, 2, 17, 1, 0, 0, 0, 0, '2022-04-28 21:00:00'),
(28, 15, 2, 17, 1, 0, 0, 0, 0, '2022-04-29 17:30:15'),
(29, 22, 2, 17, 1, 0, 0, 0, 0, '2022-04-28 21:00:00'),
(30, 22, 2, 16, 1, 0, 0, 0, 0, '2022-05-02 14:41:08');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `idProduct` int(10) NOT NULL,
  `name` varchar(30) COLLATE utf32_unicode_ci NOT NULL,
  `categoryId` int(11) NOT NULL,
  `description` text COLLATE utf32_unicode_ci NOT NULL,
  `img` text COLLATE utf32_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sellerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`idProduct`, `name`, `categoryId`, `description`, `img`, `price`, `sellerId`) VALUES
(1, 'шапка', 4, 'шапка из красной шерсти', 'shapka.img', '10.00', 2),
(2, 'ван гог', 1, 'репродукция вангога', 'vangogh.img', '100.00', 4),
(3, 'mona lisa', 1, 'оригинал моны лизы', 'monalisa.img', '200.00', 4),
(4, 'сережки', 3, 'серьги из серебра', 'serezki.img', '25.00', 2),
(5, 'кольцо', 3, 'золотое кольцо с рубином', 'kolco.img', '15.99', 2),
(6, 'свечи 3 штуки', 2, 'свечи с запахом лаванды', 'svechi.img', '30.00', 2),
(8, 'Картина \"Девушка волна\"', 1, 'Картина маслом', 'kartina1.jpg', '350.00', 4),
(9, 'Картина \"Живопись по номерам\"', 1, 'Картина маслом', 'kartina2.jpg', '200.00', 4),
(10, 'Картина \"Большая волна\"', 1, 'Репродукция картины на холсте', 'kartina3.jpeg', '500.00', 2),
(12, 'Картина \"Фудзи\"', 1, 'Картина из стекла', 'kartina4.jpeg', '700.00', 4),
(13, 'Кофемашина', 2, 'Delonghi ESAM 4000', 'home1.jpg', '159.99', 4),
(15, 'Утюг', 2, 'Braun TS745A', 'home2.jpg', '50.00', 2),
(17, 'Гладильная доска', 2, 'BRAUN IB3001 BK', 'home3.jpg', '35.00', 4),
(18, 'Губка', 2, 'Для мытья посуды', 'home4.jpg', '5.00', 2),
(21, 'NEWTOP 2 IN 1', 3, 'Держатель для телефона', 'accessories1.png', '10.00', 2),
(22, 'Bluetooth-гарнитура', 3, 'AB08 BLUETOOTH BLACK + RED HEAD KIT', 'accessories2.png', '19.99', 2),
(23, 'HDMI 4K Кабель', 3, 'NEWTOP HM02 HDMI-кабель M / M 4K 1,5 м — 150 см золотой', 'accessories3.png', '9.99', 2),
(25, 'Пальто', 4, 'JACK & JONES', 'odejda1.jpg', '200.00', 2),
(26, 'Куртка', 4, 'Утеплённая куртка для мальчика', 'odejda2.jpg', '45.50', 4),
(27, 'Женский плащ221', 4, 'Одноцветное изделие, длинный рукав, V-образный ворот', 'odejda3.jpg', '299.00', 2),
(45, 'фвфв', 1, 'фвв', 'Без имени-1.png', '6500.00', 17),
(46, 'фвфвв', 1, 'фвфвйцу', 'Xbhm7FWfI7U.png', '1313.00', 17),
(47, '21313', 1, 'йууйу', 'Xbhm7FWfI7U.jpg', '3244.00', 17),
(48, '23232', 1, '12313', '480796_uWeEigaK.png', '1.00', 17),
(64, 'стик', 1, 'стикер', '1651246468.jpg', '12.00', 17);

-- --------------------------------------------------------

--
-- Структура таблицы `product_categories`
--

CREATE TABLE `product_categories` (
  `idCategory` int(11) NOT NULL,
  `categoryName` varchar(30) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Дамп данных таблицы `product_categories`
--

INSERT INTO `product_categories` (`idCategory`, `categoryName`) VALUES
(1, 'картины'),
(2, 'товары для дома'),
(3, 'аксессуары'),
(4, 'одежда');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `idRole` int(10) NOT NULL,
  `roleName` text COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`idRole`, `roleName`) VALUES
(1, 'админ'),
(2, 'покупатель'),
(3, 'покупатель и продавец');

-- --------------------------------------------------------

--
-- Структура таблицы `userrole`
--

CREATE TABLE `userrole` (
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `idRole` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `userrole`
--

INSERT INTO `userrole` (`name`, `idRole`) VALUES
('admin', 1),
('buyer', 2),
('buyer+seller', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `role` int(1) NOT NULL,
  `email` text COLLATE utf32_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `adress` text COLLATE utf32_unicode_ci NOT NULL,
  `tel` int(20) NOT NULL,
  `fullName` text COLLATE utf32_unicode_ci NOT NULL,
  `username` varchar(15) COLLATE utf32_unicode_ci NOT NULL,
  `userDescription` text COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`idUser`, `role`, `email`, `password`, `adress`, `tel`, `fullName`, `username`, `userDescription`) VALUES
(1, 3, 'admin@rosebud.ee', '$2y$12$mjv/GPng4oQFohhkPl8RPucmgRDFVs/UCVP02US.r92ra09kK4d7u', '', 0, '', 'admin', ''),
(2, 3, 'user@user.com', '$2y$12$mjv/GPng4oQFohhkPl8RPucmgRDFVs/UCVP02US.r92ra09kK4d7u', 'tallinn, narva mnt 23-11', 235656545, 'alla nikonova', 'user', 'продаю милые штучки'),
(3, 3, 'nadja97@nadja97.com', '$2y$12$mjv/GPng4oQFohhkPl8RPucmgRDFVs/UCVP02US.r92ra09kK4d7u', 'narva, tallinna mnt 23-22', 232323, 'nadja', 'nadja97', ''),
(4, 3, 'marina@marina.ee', '$2y$12$mjv/GPng4oQFohhkPl8RPucmgRDFVs/UCVP02US.r92ra09kK4d7u', 'johvi, kutse 13', 3030, 'kutse marina', 'marina', 'продаю щтуки'),
(16, 3, 'password@password.password', '$2y$12$mjv/GPng4oQFohhkPl8RPucmgRDFVs/UCVP02US.r92ra09kK4d7u', '', 0, '', 'password', ''),
(17, 3, 'estelle@est.com', '$2y$12$mjv/GPng4oQFohhkPl8RPucmgRDFVs/UCVP02US.r92ra09kK4d7u', 'e', 0, 'e', 'estelle', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`idConversation`),
  ADD KEY `user1Id` (`user1Id`),
  ADD KEY `user2Id` (`user2Id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`idMessage`),
  ADD KEY `fromUserId` (`fromUserId`),
  ADD KEY `toUserId` (`toUserId`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idOrder`),
  ADD KEY `BuyerId` (`buyerId`),
  ADD KEY `productId` (`productId`),
  ADD KEY `sellerId` (`sellerId`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`idProduct`),
  ADD KEY `categoryId` (`categoryId`),
  ADD KEY `sellerId` (`sellerId`);

--
-- Индексы таблицы `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`idCategory`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRole`);

--
-- Индексы таблицы `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`idRole`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`) USING HASH,
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `conversations`
--
ALTER TABLE `conversations`
  MODIFY `idConversation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `idMessage` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `idOrder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `idProduct` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT для таблицы `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `idRole` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `userrole`
--
ALTER TABLE `userrole`
  MODIFY `idRole` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `conversations`
--
ALTER TABLE `conversations`
  ADD CONSTRAINT `conversations_ibfk_1` FOREIGN KEY (`user1Id`) REFERENCES `users` (`idUser`),
  ADD CONSTRAINT `conversations_ibfk_2` FOREIGN KEY (`user2Id`) REFERENCES `users` (`idUser`);

--
-- Ограничения внешнего ключа таблицы `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`fromUserId`) REFERENCES `users` (`idUser`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`toUserId`) REFERENCES `users` (`idUser`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`buyerId`) REFERENCES `users` (`idUser`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `products` (`idProduct`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`sellerId`) REFERENCES `users` (`idUser`);

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `product_categories` (`idCategory`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`sellerId`) REFERENCES `users` (`idUser`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `userrole` (`idRole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
