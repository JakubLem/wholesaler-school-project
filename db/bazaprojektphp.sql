-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Kwi 2021, 20:58
-- Wersja serwera: 10.1.37-MariaDB
-- Wersja PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `bazaprojektphp`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `address_city` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `address_address` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `address_postal_code` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `address_country` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `address`
--

INSERT INTO `address` (`address_id`, `address_city`, `address_address`, `address_postal_code`, `address_country`) VALUES
(65, 'Poznań', 'Długa 18/16', '11-222', 'Poznań');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `admin_surname` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `admin_email` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_surname`, `admin_email`, `admin_password`) VALUES
(1, 'Jakub', 'Lemiesiewicz', 'jakub.lemiesiewicz@wsp.pl', '$2y$10$4xULKcSIYTS/LW4J5G1Tq.XVqH0xKqkXKcOQAwMBzAv5h73traKl.'),
(2, 'drugi', 'testowy', 'test@wsp.pl', '$2y$10$517fQEO8yVfz5YTwzl714.SG0jd8cyQBfs16C6mRop5xzetO4.wXi');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cart`
--

CREATE TABLE `cart` (
  `master_cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `manufacturers`
--

CREATE TABLE `manufacturers` (
  `manufacturer_id` int(11) NOT NULL,
  `manufacturer_name` varchar(150) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `manufacturers`
--

INSERT INTO `manufacturers` (`manufacturer_id`, `manufacturer_name`) VALUES
(1, 'testowa'),
(2, 'Samsung'),
(3, 'Nokia'),
(4, 'Wiatrakownia'),
(5, 'Klawiaturowo'),
(6, 'Roślinowo'),
(7, 'Solidne Drewno');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orderedproducts`
--

CREATE TABLE `orderedproducts` (
  `ordered_product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(150) COLLATE utf8_polish_ci NOT NULL,
  `product_price` float NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `ordered_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `orderedproducts`
--

INSERT INTO `orderedproducts` (`ordered_product_id`, `order_id`, `product_id`, `product_name`, `product_price`, `manufacturer_id`, `ordered_quantity`) VALUES
(40, 30, 1, 'Telefon', 55.99, 1, 1),
(41, 30, 2, 'Bateria testowa', 49.99, 2, 1),
(42, 30, 3, 'Obudowa', 149.99, 1, 1),
(43, 31, 1, 'Telefon', 55.99, 1, 5),
(44, 31, 2, 'Bateria testowa', 49.99, 2, 1),
(45, 31, 3, 'Obudowa', 149.99, 1, 3),
(46, 32, 1, 'Telefon', 55.99, 1, 4),
(47, 32, 3, 'Obudowa', 149.99, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_sum_cost` float NOT NULL,
  `order_transport_cost` float NOT NULL,
  `order_status` varchar(150) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_sum_cost`, `order_transport_cost`, `order_status`) VALUES
(30, 64, 255.97, 0, 'Gotowe'),
(31, 64, 779.91, 0, 'W trakcie przygotowania'),
(32, 64, 373.95, 0, 'W trakcie przygotowania');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_display_price` float NOT NULL,
  `product_netto_price` float NOT NULL,
  `product_manufacturer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_quantity`, `product_display_price`, `product_netto_price`, `product_manufacturer_id`) VALUES
(1, 'Telefon', 100, 55.99, 55.99, 1),
(2, 'Bateria testowa', 100, 49.99, 49.99, 2),
(3, 'Obudowa', 100, 149.99, 149.99, 1),
(4, 'Wkrętarka', 100, 12, 12, 7),
(5, 'Zestaw śrubokrętów', 100, 50, 50, 4),
(6, 'Dziadek do orzechów', 100, 99, 99, 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `staticdata`
--

CREATE TABLE `staticdata` (
  `static_data_id` int(11) NOT NULL,
  `static_data_key` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `static_data_value` varchar(150) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `staticdata`
--

INSERT INTO `staticdata` (`static_data_id`, `static_data_key`, `static_data_value`) VALUES
(1, 'phone_number', '789 123 456'),
(3, 'email', 'someemail@wsp.pl');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `user_surname` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `user_email` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `user_firm_id` int(11) NOT NULL,
  `user_address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_surname`, `user_email`, `user_password`, `user_firm_id`, `user_address_id`) VALUES
(64, 'Jakub', 'Lemiesiewicz', 'jakub@wp.pl', '$2y$10$URpRVnPs2mBLrR3IjJekeeNbh9FZ0qRV6GAn3c21saokgL.cHCOy6', 172851199, 65);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indeksy dla tabeli `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeksy dla tabeli `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`master_cart_id`);

--
-- Indeksy dla tabeli `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indeksy dla tabeli `orderedproducts`
--
ALTER TABLE `orderedproducts`
  ADD PRIMARY KEY (`ordered_product_id`);

--
-- Indeksy dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indeksy dla tabeli `staticdata`
--
ALTER TABLE `staticdata`
  ADD PRIMARY KEY (`static_data_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT dla tabeli `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `cart`
--
ALTER TABLE `cart`
  MODIFY `master_cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `orderedproducts`
--
ALTER TABLE `orderedproducts`
  MODIFY `ordered_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT dla tabeli `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `staticdata`
--
ALTER TABLE `staticdata`
  MODIFY `static_data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
