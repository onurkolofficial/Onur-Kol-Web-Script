-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 Oca 2021, 00:25:45
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
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `UserId` varchar(50) NOT NULL,
  `UserName` varchar(140) NOT NULL,
  `Root` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`UserId`, `UserName`, `Root`) VALUES
('NAcGR4q0LOxEC5Q3ImubyBvlFsriZ2SwaHekUTgtnXhVjD6871', 'onurkol4161', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `appcategories`
--

CREATE TABLE `appcategories` (
  `CategoryId` varchar(50) NOT NULL,
  `CategoryName` varchar(100) NOT NULL,
  `CategoryIndex` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `appcategories`
--

INSERT INTO `appcategories` (`CategoryId`, `CategoryName`, `CategoryIndex`) VALUES
('testcat1', '$string_android_apps_text$', 1),
('testcat2', 'Test Category.', 2);

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
  `AppSourceUrl` varchar(350) NOT NULL,
  `AppReleaseDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `applications`
--

INSERT INTO `applications` (`AppId`, `CategoryId`, `AppName`, `AppAuthor`, `AppImage`, `AppDownloadUrl`, `AppSourceUrl`, `AppReleaseDate`) VALUES
('testapp1', 'testcat1', 'Basic Notes', 'Onur KOL', 'https://lh3.googleusercontent.com/AglfU72l0SY14GPEY9O5alLJ5pk2-2uTrva8PSRRTJLqc1x8Q9Fh1m3KJ692E57B8A', 'https://play.google.com/store/apps/details?id=com.onurkol.app.notes', 'https://github.com/onurkolofficial/OKSimpleNotes-Android', '2021-01-20 09:00:00'),
('testapp2', 'testcat1', 'Calculator', 'Onur KOL', 'https://lh3.googleusercontent.com/WE6fa7l09X8wirhi_rdISPBmaSaxBpCUmJgl-qUUy6eXm9kF57hBK6VeD8JYJIfKyhM', 'https://play.google.com/store/apps/details?id=com.onurkol.app.calculator', 'https://github.com/onurkolofficial/OKCalculator-Android', '2021-01-20 10:15:24'),
('testapp3', 'testcat1', 'SPS Game', 'Onur KOL', 'https://lh3.googleusercontent.com/pqHUig-YvNNjICPXOOuR3XPx_bNAEV5vMqmaQ2ZVoaT9thDU1AWzR2AtdSTlaY5wdTY', 'https://play.google.com/store/apps/details?id=com.onurkolofficial.spsgame', 'https://github.com/onurkolofficial/Stone-Paper-Scissors-Game_Android', '2021-01-20 15:00:00'),
('testapp4', 'testcat1', 'TEST APPLICATION CAT 1', 'TEST AUTHOR', 'https://www.talkwalker.com/images/2020/blog-headers/image-analysis.png', '/', '/', '2021-01-20 13:34:19'),
('testapp5', 'testcat2', 'TEST APPLICATION', 'TEST AUTHOR', 'https://www.talkwalker.com/images/2020/blog-headers/image-analysis.png', '/download', '', '2021-01-20 14:47:32');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sitemenu`
--

CREATE TABLE `sitemenu` (
  `id` int(10) UNSIGNED NOT NULL,
  `ItemText` varchar(100) NOT NULL,
  `ItemUrl` varchar(150) NOT NULL,
  `ItemIndex` int(10) NOT NULL,
  `ItemMenuId` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sitemenu`
--

INSERT INTO `sitemenu` (`id`, `ItemText`, `ItemUrl`, `ItemIndex`, `ItemMenuId`) VALUES
(1, '$string_home_text$', '/', 1, 'home'),
(2, '$string_applications_text$', '/apps', 2, 'apps'),
(3, '$string_about_text$', '/about', 3, 'about'),
(4, '$string_contact_text$', '/contact', 4, 'contact'),
(5, 'TEST MENU', '/', 5, 'test');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` varchar(50) NOT NULL,
  `UserFirstName` varchar(100) NOT NULL,
  `UserLastName` varchar(100) NOT NULL,
  `UserName` varchar(80) NOT NULL,
  `UserPassword` varchar(200) NOT NULL,
  `UserMail` varchar(140) NOT NULL,
  `UserImage` varchar(250) NOT NULL,
  `UserCountry` varchar(100) NOT NULL,
  `UserAddress` varchar(200) NOT NULL,
  `UserPhone` varchar(40) NOT NULL,
  `UserRegisterDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `UserFirstName`, `UserLastName`, `UserName`, `UserPassword`, `UserMail`, `UserImage`, `UserCountry`, `UserAddress`, `UserPhone`, `UserRegisterDate`) VALUES
('NAcGR4q0LOxEC5Q3ImubyBvlFsriZ2SwaHekUTgtnXhVjD6871', 'Onur', 'Kol', 'onurkol4161', '629f5862ef52febdaa2e45b8b124ec98', 'onurkol4161@gmail.com', 'DEFAULT', 'Turkey', '', '+90 536 590 2876', '2021-01-20 20:25:02');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `versionlog`
--

CREATE TABLE `versionlog` (
  `VersionName` varchar(15) NOT NULL,
  `VersionText` longtext NOT NULL,
  `VersionReleaseDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `versionlog`
--

INSERT INTO `versionlog` (`VersionName`, `VersionText`, `VersionReleaseDate`) VALUES
('1.0.0', '$string_version100_text$', '2021-01-20 04:00:55'),
('1.0.1', '$string_version101_text$', '2021-01-20 16:20:55'),
('1.1.0', '$string_version110_text$', '2021-01-20 20:36:53');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `UserId` (`UserId`);

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
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- Tablo için indeksler `versionlog`
--
ALTER TABLE `versionlog`
  ADD UNIQUE KEY `VersionName` (`VersionName`);

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
