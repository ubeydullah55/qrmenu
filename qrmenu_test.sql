-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 01 Eki 2022, 19:19:21
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `qrmenu_test`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `call_waiter`
--

CREATE TABLE `call_waiter` (
  `id` int(11) NOT NULL,
  `table_no` int(255) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `call_waiter`
--

INSERT INTO `call_waiter` (`id`, `table_no`, `time`) VALUES
(23, 53, '09:57:00'),
(24, 53, '09:57:00'),
(26, 2, '20:17:00'),
(27, 1, '20:21:00'),
(28, 1, '20:28:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Salata'),
(2, 'Çorba'),
(17, 'Pide'),
(18, 'Hamburger'),
(21, 'Lahmacun');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `id` int(255) NOT NULL,
  `k_adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `k_sifre` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `soyad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `unvan` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yetki` int(255) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`id`, `k_adi`, `k_sifre`, `ad`, `soyad`, `unvan`, `yetki`) VALUES
(1, '05541897234', '1453', 'Ubeydullah', 'DOĞAN', 'Müdür', 0),
(8, '05357915561', '3455', 'Deneme', 'Verisi', 'YÖNETİCİ', 1),
(13, '05551897264', '123456', 'Garson ', 'Deneme', 'Garson', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `categories_id` int(255) NOT NULL,
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `info` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `price` int(255) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `categories_id`, `img`, `name`, `info`, `price`, `is_active`) VALUES
(3, 2, 'mercimek-corbasi-image(1020x760).jpeg', 'Mercimek Çorbası', 'Klasik sarı mercimek                               ', 15, 1),
(11, 18, 'islak-hamburger-2.jpg', 'Islak Hanburgerr', 'Batının lezzetlerinden doyurucu menüdür  ', 80, 1),
(12, 17, 'kuşbaşı_2.jpg', 'Kaşarlı pide', 'kasaşrlı pide güzel kesinlikle tadılması gereken bir tat', 35, 1),
(13, 21, 'lahmacun-findik.jpg', 'Fındık Lahmacun', 'Sokak lezzetlerimizin önde gelen tatlarından', 20, 1),
(17, 18, 'ıslak-hamburger-10.jpg', 'asdasd', 'asdasd', 123, 1),
(52, 1, '1663098753_e247bbf7b75b88f9f59c.jpg', 'Çoban Salata', 'Et yemeklerinin yanını süsleyen lezzet.', 23, 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `call_waiter`
--
ALTER TABLE `call_waiter`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `call_waiter`
--
ALTER TABLE `call_waiter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
