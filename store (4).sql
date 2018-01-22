-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 22 jan 2018 om 07:45
-- Serverversie: 10.1.28-MariaDB
-- PHP-versie: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'PC'),
(2, 'PC items'),
(3, 'Mobile'),
(4, 'Hardware'),
(5, 'Software'),
(6, 'Gadgets');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `completed_orders`
--

CREATE TABLE `completed_orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ordered_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `completed_orders`
--

INSERT INTO `completed_orders` (`id`, `user_id`, `ordered_at`) VALUES
(1, 8, '2018-01-17 15:18:11'),
(2, 12, '2018-01-17 22:33:58'),
(3, 12, '2018-01-21 20:38:58'),
(4, 12, '2018-01-21 20:38:58'),
(5, 12, '2018-01-21 21:59:24'),
(6, 12, '2018-01-21 22:31:28'),
(7, 12, '2018-01-21 22:35:04'),
(8, 12, '2018-01-21 22:37:03'),
(9, 12, '2018-01-21 22:40:52'),
(10, 12, '2018-01-21 22:44:35'),
(11, 12, '2018-01-21 22:48:35'),
(12, 12, '2018-01-21 22:54:07'),
(13, 12, '2018-01-21 22:58:08'),
(14, 12, '2018-01-21 23:00:13'),
(15, 12, '2018-01-21 23:01:17'),
(16, 12, '2018-01-21 23:01:26'),
(17, 12, '2018-01-21 23:01:52'),
(18, 12, '2018-01-21 23:02:12'),
(19, 12, '2018-01-21 23:05:26'),
(20, 12, '2018-01-21 23:07:16'),
(21, 12, '2018-01-21 23:08:15'),
(22, 12, '2018-01-21 23:09:29'),
(23, 12, '2018-01-21 23:09:37'),
(24, 12, '2018-01-21 23:17:40'),
(25, 12, '2018-01-21 23:18:12'),
(26, 12, '2018-01-21 23:19:10'),
(27, 12, '2018-01-21 23:19:39'),
(28, 12, '2018-01-21 23:20:50'),
(29, 12, '2018-01-21 23:21:14'),
(30, 12, '2018-01-21 23:24:16'),
(31, 12, '2018-01-21 23:24:48'),
(32, 12, '2018-01-21 23:24:59'),
(33, 12, '2018-01-21 23:29:29'),
(34, 12, '2018-01-21 23:32:06'),
(35, 12, '2018-01-21 23:32:17'),
(36, 12, '2018-01-21 23:35:00'),
(37, 12, '2018-01-21 23:36:11'),
(38, 12, '2018-01-21 23:38:17'),
(39, 12, '2018-01-21 23:45:14'),
(40, 13, '2018-01-21 23:49:18'),
(41, 13, '2018-01-21 23:53:09'),
(42, 13, '2018-01-21 23:55:35'),
(43, 13, '2018-01-21 23:56:25'),
(44, 14, '2018-01-21 23:58:11'),
(45, 14, '2018-01-22 00:02:07'),
(46, 14, '2018-01-22 03:30:05'),
(47, 14, '2018-01-22 03:30:51'),
(48, 14, '2018-01-22 05:33:36');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` double(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `completed_orders_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `order_details`
--

INSERT INTO `order_details` (`id`, `product_id`, `product_price`, `quantity`, `completed_orders_id`) VALUES
(1, 18, 200.00, 4, 1),
(2, 19, 44.69, 3, 1),
(3, 20, 35.00, 6, 2),
(4, 21, 400.00, 2, 2),
(5, 31, 155.00, 7, 3),
(6, 18, 500.00, 5, 4),
(7, 32, 100.88, 5, 42),
(8, 31, 44.99, 1, 42),
(9, 30, 270.00, 5, 43),
(10, 31, 44.99, 4, 44),
(11, 30, 270.00, 3, 44),
(12, 24, 1049.99, 2, 44),
(13, 30, 270.00, 5, 45),
(14, 18, 30.44, 1, 45),
(15, 24, 1049.99, 1, 45),
(16, 20, 200.00, 1, 45),
(17, 21, 350.77, 1, 46),
(18, 21, 350.77, 1, 47),
(19, 32, 100.88, 5, 47),
(20, 32, 100.88, 1, 48);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `created_at`) VALUES
(3, 8, 'Post one', 'This is post one', '2018-01-11 21:55:16'),
(4, 8, 'Another one', 'sgfsrgrfg', '2018-01-11 21:57:03'),
(8, 8, 'Hello', 'Wazaaap', '2018-01-11 23:58:23'),
(10, 11, 'New Title', 'Something nice', '2018-01-12 20:32:59'),
(11, 9, 'Hey', 'Igviebiee', '2018-01-12 20:35:46');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `img` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `category`, `price`, `img`, `user_id`) VALUES
(18, 'Mouse', 'This is a mouse description', 2, 30.44, 'mouse.jpg', 10),
(19, 'Framework', 'Selling php frameworks', 5, 250.99, '13047837_1750854825201374_7809510911662716015_o.png', 10),
(20, 'What&#39;s up', 'Nothing much', 6, 200.00, '18198435_769578906532764_3208624856456069648_n.jpg', 10),
(21, 'Computer', 'It&#39;s a PC', 1, 350.77, 'illustration.jpg', 10),
(23, 'Galaxy s8', 'Galaxy s8', 4, 888.77, 'download.jpg', 12),
(24, 'Iphone X', 'This is the iphone X aka 10 not 9', 3, 1049.99, 'shopping.jpg', 12),
(30, 'Computer screen', 'A computer screen', 5, 270.00, 'hardware.jpg', 10),
(31, 'Pc Item', 'This a another test Item', 6, 44.99, 'DisplayHGS.png', 10),
(32, 'Test Item', 'THis is another one', 4, 100.88, 'favi3.png', 10);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `role`) VALUES
(8, 'Robin', 'robingiel@gmail.com', '$2y$10$vWv/1I8oarGa9NJ/cUvW8etli2DIRQ35wr3Ttl6kcidaYJb8S.Cse', '2018-01-11 17:32:06', 'klant'),
(9, 'John', 'johndoe@gmail.com', '$2y$10$xHsRf6W2VMPSYLAlne9wG.gMKGJyg2Xo7JS8CPBvCtYoOpTsoNhdG', '2018-01-11 20:49:14', 'klant'),
(10, 'Bill', 'bill@gmail.com', '$2y$10$vnRziR9kOk394hg4IXKfGuBDWByTnIBxmC0NOSrV8sC4jflYjK4Gm', '2018-01-11 21:57:36', 'medewerker'),
(12, 'frank', 'frank@yahoo.com', '$2y$10$QCfHD0b6ApQzg0QzYGN4gemver/s18Sgp4mE3q4S7cIp8eXVjUco6', '2018-01-12 20:46:07', 'klant'),
(13, 'Best Buyer', 'klant@gmail.com', '$2y$10$fIFtseyksqh9PmdQZOnxWeVf4mz1BPrMDdsanWZwIkrPB9cG9ergS', '2018-01-18 03:06:03', 'klant'),
(14, 'NewBuyer', 'buyer@gmail.com', '$2y$10$T/smWrbKucZJdKRc88FSE.xNUF3TVU4BZZv23imqz4r3xRfupBK5u', '2018-01-22 00:57:07', 'klant');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `completed_orders`
--
ALTER TABLE `completed_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexen voor tabel `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `completed_orders_id` (`completed_orders_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexen voor tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `completed_orders`
--
ALTER TABLE `completed_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT voor een tabel `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT voor een tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `completed_orders`
--
ALTER TABLE `completed_orders`
  ADD CONSTRAINT `completed_orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Beperkingen voor tabel `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`completed_orders_id`) REFERENCES `completed_orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
