-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 20 Oca 2021, 00:28:24
-- Sunucu sürümü: 10.4.13-MariaDB
-- PHP Sürümü: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `onurkolweb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `appcategories`
--

CREATE TABLE `appcategories` (
  `CategoryId` varchar(50) NOT NULL,
  `CategoryName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `appcategories`
--

INSERT INTO `appcategories` (`CategoryId`, `CategoryName`) VALUES
('testcat1', '$string_android_apps_text$'),
('testcat2', 'Test Category.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `applications`
--

CREATE TABLE `applications` (
  `AppId` varchar(50) NOT NULL,
  `CategoryId` varchar(50) NOT NULL,
  `AppName` varchar(100) NOT NULL,
  `AppAuthor` varchar(100) NOT NULL,
  `AppImage` varchar(350) NOT NULL,
  `AppDownloadUrl` varchar(350) NOT NULL,
  `AppSourceUrl` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `applications`
--

INSERT INTO `applications` (`AppId`, `CategoryId`, `AppName`, `AppAuthor`, `AppImage`, `AppDownloadUrl`, `AppSourceUrl`) VALUES
('testapp1', 'testcat1', 'Basic Notes', 'Onur KOL', 'https://lh3.googleusercontent.com/AglfU72l0SY14GPEY9O5alLJ5pk2-2uTrva8PSRRTJLqc1x8Q9Fh1m3KJ692E57B8A', 'https://play.google.com/store/apps/details?id=com.onurkol.app.notes', 'https://github.com/onurkolofficial/OKSimpleNotes-Android'),
('testapp2', 'testcat1', 'Calculator', 'Onur KOL', 'https://lh3.googleusercontent.com/WE6fa7l09X8wirhi_rdISPBmaSaxBpCUmJgl-qUUy6eXm9kF57hBK6VeD8JYJIfKyhM', 'https://play.google.com/store/apps/details?id=com.onurkol.app.calculator', 'https://github.com/onurkolofficial/OKCalculator-Android'),
('testapp3', 'testcat1', 'SPS Game', 'Onur KOL', 'https://lh3.googleusercontent.com/pqHUig-YvNNjICPXOOuR3XPx_bNAEV5vMqmaQ2ZVoaT9thDU1AWzR2AtdSTlaY5wdTY', 'https://play.google.com/store/apps/details?id=com.onurkolofficial.spsgame', 'https://github.com/onurkolofficial/Stone-Paper-Scissors-Game_Android'),
('testapp4', 'testcat1', 'TEST APPLICATION', 'TEST AUTHOR', 'https://www.talkwalker.com/images/2020/blog-headers/image-analysis.png', '/', '/'),
('testapp5', 'testcat2', 'TEST APPLICATION', 'TEST AUTHOR', 'https://www.talkwalker.com/images/2020/blog-headers/image-analysis.png', '/download', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sitemenu`
--

CREATE TABLE `sitemenu` (
  `id` int(10) UNSIGNED NOT NULL,
  `ItemText` varchar(100) NOT NULL,
  `ItemUrl` varchar(150) NOT NULL,
  `ItemIndex` int(10) NOT NULL,
  `ItemId` varchar(50) NOT NULL,
  `ItemAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sitemenu`
--

INSERT INTO `sitemenu` (`id`, `ItemText`, `ItemUrl`, `ItemIndex`, `ItemId`, `ItemAdmin`) VALUES
(1, '$string_home_text$', '/', 1, 'home', 0),
(2, '$string_applications_text$', '/apps', 2, 'apps', 0),
(3, '$string_about_text$', '/about', 3, 'about', 0),
(4, '$string_contact_text$', '/contact', 4, 'contact', 0),
(5, 'TEST MENU', '/', 5, 'test', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `appcategories`
--
ALTER TABLE `appcategories`
  ADD UNIQUE KEY `CategoryId` (`CategoryId`);

--
-- Tablo için indeksler `applications`
--
ALTER TABLE `applications`
  ADD UNIQUE KEY `AppId` (`AppId`),
  ADD KEY `CategoryId` (`CategoryId`);

--
-- Tablo için indeksler `sitemenu`
--
ALTER TABLE `sitemenu`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `sitemenu`
--
ALTER TABLE `sitemenu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
