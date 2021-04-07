-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 07 Kwi 2021, 11:27
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
(1, 'test', 'test', 'test', 'test'),
(2, 'test', 'test', 'test', 'test'),
(3, 'test', 'test', 'test', 'test'),
(4, 'test', 'test', 'test', 'test'),
(5, 'test', 'test', 'test', 'test'),
(6, 'test', 'test', 'test', 'test'),
(7, 'test', 'test', 'test', 'test'),
(8, 'test', 'test', 'test', 'test'),
(9, 'test', 'test', 'test', 'test'),
(10, 'test', 'test', 'test', 'test'),
(11, 'test', 'test', 'test', 'test'),
(12, 'test', 'test', 'test', 'test'),
(13, 'test', 'test', 'test', 'test'),
(14, 't', 't', 't', 't'),
(15, 'aaa', 'sss', 'tsss', 'aaa'),
(16, 'aaa', 'sssxx', 'tsss', 'aaa'),
(17, 'aaa', 'sssxx', 'tsss', 'aaa'),
(18, 'aaa', 'sssxx', 'tsss', 'aaa'),
(19, 'aaa', 'sssxx', 'tsss', 'aaa'),
(20, 'aaa', 'sssxx', 'tsss', 'aaa'),
(21, 'asd', 'asd', 'asd', 'asd'),
(22, 'ffff', 'fff', 'fff', 'ffff'),
(23, '', '', '', ''),
(24, '', '', '', ''),
(25, '', '', '', ''),
(26, '', '', '', ''),
(27, '', '', '', ''),
(28, 'gggg', 'gggg', 'gggg', 'gggg'),
(29, 'xdx', 'xd', 'xd', 'xdx'),
(30, 'xdx', 'xd', 'xdxdxd', 'xdx'),
(31, 'xd', 'xd', 'xd', 'xd'),
(32, 'xd', 'xd', 'xdx', 'xd'),
(33, 'xd', 'xd', 'xd', 'xd'),
(34, 'xd', 'xd', 'xd', 'xd'),
(35, 'xd', 'xd', 'xd', 'xd'),
(36, 'xd', 'xd', 'xd', 'xd'),
(37, 'xd', 'xd', 'xd', 'xd'),
(38, 'x', 'x', 'x', 'x'),
(39, 'x', 'x', 'x', 'x'),
(40, 'xdd2', 'xdd2', 'xdd2', 'xdd2'),
(41, 'xd', 'xd', 'xd', 'xd'),
(42, 'tt', 'testowa', 'tt', 'tt'),
(43, '1', '1', '1', '1'),
(44, 'kkl', 'kkl', 'kll', 'kkl'),
(45, 'asd', 'asd', 'asd', 'asd'),
(46, '', '', '', ''),
(47, '', '', '', ''),
(48, '123', '123', '123', '123'),
(49, '123', '123', '123', '123'),
(50, '123', 'xd', '123', '123'),
(51, '123', '123', '123', '123'),
(52, 'Złotniki', 'asd', '62-002', 'Złotniki'),
(53, 'xdddd', 'xd', 'xd', 'xdddd'),
(54, 'Złotnikixddxd', 'zd', '62-002', 'Złotnikixddxd'),
(55, 'xdd', 'xdd', 'xdd', 'xdd'),
(56, 'xd', 'xd', 'xd', 'xd'),
(57, 'xd', 'xd', 'xd', 'xd'),
(58, 'Złotniki', 'xd', '62-002', 'Złotniki'),
(59, 'gowno', 'gowno', 'gowno', 'gowno'),
(60, 'Duży Las', 'Długa 18/15', '11-111', 'Polska'),
(61, 'xd', 'xd', 'xd', 'xd'),
(62, 'ttt', 'ttt', 'ttt', 'ttt'),
(63, 'xd', 'xd', 'xd', 'xd');

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

--
-- Zrzut danych tabeli `cart`
--

INSERT INTO `cart` (`master_cart_id`, `user_id`, `product_id`, `quantity`) VALUES
(1, 58, 3, 4),
(39, 59, 1, 9);

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
(3, 'Nokia');

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
(3, 'Obudowa', 100, 149.99, 149.99, 1);

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
(1, 'jakub', 'lemiesiewicz', 'test@test.pl', 'qwerty', 1, 1),
(2, 'test', 'test', 'testetea', 'test', 123, 1),
(3, 'test', 'test', 'testetea', '$2y$10$/aICYgKSFJYADp3g3pdkJuGmdELJ.smnaSKrEWtuOQwfzbFOixedq', 123, 1),
(4, 'test', 'test', 'testetea', '$2y$10$uZPGX9TMtK5h82z4JhkcJeyM1x7sH5DNxhmRQBFMkMg9XsRfN0mEe', 123, 1),
(5, 'test', 'test', 'test', '$2y$10$mPvz06EP34aiLPeLIE8zPOrZd31IcMEd/ba2F/O2UiLBGiqx7cWvq', 0, 1),
(6, 'test', 'test', 'test', '$2y$10$XHUJFbFmiP5to/L3v3VEXerSKGcAcm57Y0Svwo5ACrF27KT44YcTe', 0, 1),
(7, 'test', 'test', 'test', '$2y$10$cS7SYsP65rwSu98W1Y6dXumSnBMcr.3G9qm3oHilBqDXe0FtlA6xq', 0, 1),
(8, 'test', 'test', 'test', '$2y$10$y.ZX2/lCF5HwUFMY5i.UEuskk6z5mBMrQ/JaIo9BC57b0zEuXSmBm', 0, 1),
(9, 'test', 'test', 'test', '$2y$10$6w0Tb0ZIIuImaUVPLqUIQeNytYr85aPJKlFRyopqwFBMAl3TDJJhO', 0, 1),
(10, 'test', 'test', 'test', '$2y$10$gDIvvytmyvzqON7Cxo/8TuJadQ5tjH8oatleiz8to7KX9ggioNDoi', 0, 1),
(11, 'test', 'test', 'test', '$2y$10$KTBilCpro8xWLnnADhDxeuF207Dzslx6HQfNXgPGsQ48NYqN5mwU6', 0, 1),
(12, 'test', 'test', 'test', '$2y$10$f5NRk5kZl02bUExhG7qgGu/Q44bK/uMF1duO52gId6/PfOw5P6UTu', 0, 1),
(13, 't', 't', 't', '$2y$10$ww/Uf2Na8H3Z3zsyk6o8dORhdPWoHROuxucYwiabXj7KyraLCAfDS', 0, 1),
(14, 'jakubtest', 'testtest', 'email', '$2y$10$2gDFk4OT1t9aLbl9vbTbg.EZbsxi8t895GWhEq6BTKhXwYn9WEbjO', 0, 15),
(15, 'xxxxx', 'xxxx', 'email', '$2y$10$xmjTtZAKm9N3qFvEny9Cm.9xjtg9YPSPWMonzkgkq8E.smO6MoAIa', 0, 16),
(16, 'xxxxx', 'xxxx', 'email', '$2y$10$CG.uZouLqTbAuDZZD73J4O4rXRycrpAPBYhBRj7OWlBcuSUMLl1O.', 0, 17),
(17, 'xxxxx', 'xxxx', 'email', '$2y$10$B45FkUNMEMSmG2ZAp40XbeDJup0SR9O44TdSDkhOP4WQtLe8w3Kua', 0, 18),
(18, 'xxxxx', 'xxxx', 'email', '$2y$10$nr5ARXerr2mksXeV28uYKuQ3EbS1uy56SK3IbS4TLrUqGECup9Msi', 0, 19),
(19, 'xxxxx', 'xxxx', 'email', '$2y$10$nDulJeG5DqV4ESItuBCfse60jd23El./WLD.LmFvsFT8Mew4CWt7e', 0, 20),
(20, 'asd', 'asd', 'asd', '$2y$10$NAO5Ln.EeoBVL1frwGemce2ttBZjWmsxvxJjjHXtP8e90MQg.k6Fy', 0, 21),
(21, 'asd', 'asd', 'fff', '$2y$10$8R8i6nT0Si3Uirn/yVFWZuOHvHi5cIhFjGgu2gHWEzRuKK3YWsHAC', 0, 22),
(22, '', '', '', '$2y$10$7yAF4Rujfwn8TrMCbgYCWetLg5IKKNsJhsfn6sKfRJV/Demudc0Qq', 0, 23),
(23, '', '', '', '$2y$10$tL49U.5eh18eG9tvJnhLheC7TEkRWRk7ZB6vL1dLNCqQaKr1m1ESW', 0, 24),
(24, '', '', '', '$2y$10$np9Hu/zVbJVxbqBP/CPwG.098dJvva.ePQERG7gejTBceWbxNJhnC', 0, 25),
(25, '', '', '', '$2y$10$q/fbkxNGMCTPQu34zm9h4OlQ.NM473i76wu/MHipjDtJGbT6QiFnS', 0, 26),
(26, '', '', '', '$2y$10$5NI3Mf90f2V/KSD/nkPj6e6KCefHbuyqxHJ47kxLRLQeuMhJuVnOu', 0, 27),
(27, 'gggg', 'gggg', 'gggg', '$2y$10$kLBpjqSm23fuKFTcdJ8vW.NWMZOoaYx7kz1XwJpmh2NyWmpH472HK', 0, 28),
(28, 'xd', 'xd', 'xd', '$2y$10$nbdbDScsoXc3Q2AKAG6tJe8PnuT0IU4xwOU2mTjnBfHk.1mQnL7XO', 0, 29),
(29, 'xd', 'xd', 'xd', '$2y$10$62PG8gQeBI0rXsKsFcgB3OeK9YV86g5dASCup0SP8pulATS4mJ1ey', 0, 30),
(30, 'xd', 'xd', 'xd', '$2y$10$idX2K0R5AyqcuPxF.L66U.b0CDJ.LI4YUzDQDGKM./Ez2MIE2mtvq', 0, 31),
(31, 'xd', 'xd', 'xd', '$2y$10$MFtm3cghPCgp/PbpgXcLheUkbyHZOYhTEnBtdnDOVGzOqDQWcNrIu', 0, 32),
(32, 'xd', 'xd', 'xd', '$2y$10$dbAAGJ94kHtjvdqFtgsWkO7boOYLCWhyG9T7bco53RkXW8JHsKDGm', 0, 33),
(33, 'xd', 'xd', 'xd', '$2y$10$MziL.hY4Pbn6gKHwWHlDbeFos7tgp9cXsHO.3qmkxGqMR2NwdW0RO', 0, 34),
(34, 'xd', 'xd', 'xd', '$2y$10$eqaM3pH3v/d4HPa7DtDLLeWJLxjKWW2y3M82WQUrb/IGSn7oXNQcm', 0, 35),
(35, 'xd', 'xd', 'xd', '$2y$10$Jw7PFh5L5G5HgLJxP0sMuu6Nk48K4wCHtSESAbrQ.7y9B6v.6Ys52', 0, 36),
(36, 'xd', 'xd', 'xd', '$2y$10$hBG1NohizvrPFB0425E0yeMV0ZcLFpdKf6Jw5saf.ZX7H8EzgDAmG', 0, 37),
(37, 'x', 'x', 'x', '$2y$10$SHT.TN66DyXv1ACpKS.GpOI0l0kv2WTUb3/SZOecaUOyDeIuE5pbu', 0, 38),
(38, 'x', 'x', 'x', '$2y$10$3q6qzUClhEJQhpxGyfZFNeXCvHrSdswdJReD1.HXwzzLa3KsUuYMm', 0, 39),
(39, 'xdd2', 'xdd2', 'xdd2', '$2y$10$SkeXxE1TnNdndBkZ.E1G/eLDDDLIAhSs5HLoApbfpIJ9zulE4N1Bq', 0, 40),
(40, 'xd', 'xd', 'xd', '$2y$10$sb4ivf/kOm4Vfvu2nCWfJOmjUCnp4QhZ8/gwLSEpnqNxpp/OiGRJS', 0, 41),
(41, 'Jakub', 'Lemiesiewicz', 'jakug.lemiesiewicz@gmail.com', '$2y$10$Wo/P8o6RKnzLxYwRaUcFheI0i/zToRFrSQEHBOnM2hG4FmehQzL92', 0, 42),
(42, '1', '1', 'totalnie', '$2y$10$U8vZ4LWC5crNQc2LiSTZ..h0TIFU1xgGTGht6xbT3CuUF.qjuHJDe', 1, 43),
(43, 'julia', 'nowak', 'nowak123', '$2y$10$8WlquzQE8Pnn6rDcGnr9SOs1TO5KGL2NpaOiCOMDhgInn50ZG3ZJe', 0, 44),
(44, 'asd', 'asd', 'asd', '$2y$10$dpYzRbk4DKD2sgJO4Uf3p.HmIOKYAiGB9omxljQlH7j4YNIQZ.9cS', 0, 45),
(45, '', '', '', '$2y$10$RkMTyYFeQTfVzRM6gGUxQu5WguhCRqmS0kCYRDPfygcYKrAxNjKT2', 0, 46),
(46, '', '', '', '$2y$10$YxWWkBWTPRXUuxBT.mFFb.r7iuonsYBz2c0sgTHmCRVxeVMcQfc3G', 0, 47),
(47, '123', '123', '123', '$2y$10$drQj0nlmJOGd/Zlth5wK8Ol/SflkQVcrJgRGh6r2Eynzh5jg5QTg6', 123, 48),
(48, '123', '123', '123', '$2y$10$6dMaGWsLbqzO8.61wKPMGOdXyM2ZTKYr0QWVOy06SVP8uGO7AqyDu', 123, 49),
(49, '123', '123', '123', '$2y$10$wtT59GPeME4lTcb3AkOYp.K3ga4Dyn/6b9/ac5bJwbr/XMtPbmHiG', 123, 50),
(50, '123', '123', '123', '$2y$10$amzVkod12DAgF6TKjXpmr.XhzjzHqZTKTPAXreaHs0DfZAK9IxMLy', 123, 51),
(51, 'xd', 'xd', 'jakub.lemiesiewicz@gmail.com', '$2y$10$lXzWDlJyDLn/ibDLUtmxq.25AJDdHXm7L5gcrc3w3ILPyQejrP63e', 0, 52),
(52, 'xd', 'xd', 'jakug.lemiesiewicz@gmail.com', '$2y$10$wqAQcmh1ZnubYO8sI0DEieNYlNobsFeXIX529GnW.ZJ2ylSKJplme', 0, 53),
(53, 'xddd', 'xd', 'jakug.lemiesiewicz@gmail.com', '$2y$10$IVtPczcrUVcbW.Anl4XBMuFyxiWC29YHMaiAkmhGKmQDq69mSxq0S', 0, 54),
(54, 'xdd', 'xdd', 'nowykurwaemail@email', '$2y$10$PcvGawvPoWgPTH8KEnvTqemqY5V0LqsNHeBEbRTw7WEAeW9uC2ml6', 0, 55),
(55, 'xd', 'xd', 'jakug.lemiesiewicz@gmail.com', '$2y$10$Lr7h0uPSt396fKzYeAo0/uOeSsfFNAyCPbkg41BYJaONmNR3AVnU2', 0, 56),
(56, 'xd', 'xd', 'jakug.lemiesiewicz@gmail.com', '$2y$10$GsIuXXNoHyetl6ZnRSlTweNBun2ieXDhl75ROAGmJdc0wosUM9mFa', 0, 57),
(57, 'xd', 'xd', 'jakug.lemiesiewicz@gmail.com', '$2y$10$PuWVWG04j29n5aI8tQ9K9OLqzzKjG6j89ubCSQLrxWnFBBZ.kpjKm', 0, 58),
(58, 'gowno', 'gowno', 'admin@admin.pl', '$2y$10$xAsYs8rNq851kRc0jouEB.nX3bmZUS.EQagYWk2gpqliZPz7y0n5S', 0, 59),
(59, 'Jakub', 'Lemiesiewicz', 'jakub@wp.pl', '$2y$10$mp8UKpLEsSofGgz4LEgPQO0OXM0w/QltWJWiO4ZsumnvOEVyy2uhS', 2147483647, 60),
(60, 'zxd', 'zxd', 'testooooo@wppppp.x', '$2y$10$/vlENBT/evdpCGwhhuKtUueZkI4285VTtkry2Z8eM57El5ypWiF36', 0, 61),
(61, 'xd', 'xd', 'nowy@nowysss', '$2y$10$YRDcTBk3VgF7b9dXSywQhecnsikPnSNpm75fsLmN/QZPJstWoRq5G', 0, 62),
(62, 'xd', 'xd', 'ttttt@tttttt', '$2y$10$YwvPX/Q.vXSqzTQa/oRVeuZj9QyUb8pa9ArxNs0DBPYYeF/u.BHMS', 0, 63);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

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
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

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
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT dla tabeli `cart`
--
ALTER TABLE `cart`
  MODIFY `master_cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT dla tabeli `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
