-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 23 Oca 2021, 20:56:52
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

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `appcategories`
--

CREATE TABLE `appcategories` (
  `CategoryId` varchar(50) NOT NULL,
  `CategoryName` varchar(100) NOT NULL,
  `CategoryIndex` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
