-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 18 jan 2018 om 02:37
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
(2, 12, '2018-01-17 22:33:58');

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
(4, 21, 400.00, 2, 2);

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
  `category` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  `img` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `category`, `price`, `img`, `user_id`) VALUES
(18, 'Mouse', 'This is a mouse description', 'Computer', 30.44, 'mouse.jpg', 10),
(19, 'Framework', 'Selling php frameworks', 'frameworks', 250.99, '13047837_1750854825201374_7809510911662716015_o.png', 10),
(20, 'What&#39;s up', 'Nothing much', 'Ow yeah', 300.88, '18198435_769578906532764_3208624856456069648_n.jpg', 10),
(21, 'Computer', 'It&#39;s a PC', 'pc', 350.77, 'illustration.jpg', 10);

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
(12, 'frank', 'frank@yahoo.com', '$2y$10$QCfHD0b6ApQzg0QzYGN4gemver/s18Sgp4mE3q4S7cIp8eXVjUco6', '2018-01-12 20:46:07', 'medewerker');

--
-- Indexen voor geëxporteerde tabellen
--

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
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `completed_orders`
--
ALTER TABLE `completed_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
