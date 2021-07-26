-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 01 Ocak 2002 saat 03:31:50
-- Sunucu sürümü: 5.1.36
-- PHP Sürümü: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `db`
--
CREATE DATABASE `db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db`;

-- --------------------------------------------------------

--
-- Tablo yapısı: `baslik`
--

CREATE TABLE IF NOT EXISTS `baslik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kulid` int(11) NOT NULL,
  `kulad` varchar(20) NOT NULL,
  `baslik` varchar(50) NOT NULL,
  `entry` varchar(100) NOT NULL,
  `tarih` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Tablo döküm verisi `baslik`
--

INSERT INTO `baslik` (`id`, `kulid`, `kulad`, `baslik`, `entry`, `tarih`) VALUES
(4, 3, 'Baykuş', 'İstanbul', 'Merhaba İstanbul nasılsın', '1009849879'),
(8, 3, 'Baykuş', 'ASD', 'FFSSSDDD', '1009858148'),
(9, 3, 'Baykuş', 'swdasdas', 'asdasdasd', '1009858249'),
(10, 3, 'Baykuş', 'dgvdfgdfg', 'dfsdfsdfsdfsdf asfsdfsdf asdasdasd', '1009858305'),
(11, 3, 'Baykuş', 'dfgdgdfg', 'dfgdfgdf sdgfsdfsdf sdfsdfsd fsdfsd fsdf ', '1009858464'),
(21, 6, 'ali', 'Marmara', 'Denizin içine Güneş ışıkları girerken marmara denizinde oturuyorum.', '1009841085');

-- --------------------------------------------------------

--
-- Tablo yapısı: `uye`
--

CREATE TABLE IF NOT EXISTS `uye` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ad` varchar(20) NOT NULL,
  `soyad` varchar(20) NOT NULL,
  `kulad` varchar(20) NOT NULL,
  `sifre` varchar(20) NOT NULL,
  `cins` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Tablo döküm verisi `uye`
--

INSERT INTO `uye` (`id`, `ad`, `soyad`, `kulad`, `sifre`, `cins`, `email`) VALUES
(5, 'Hüseyin', 'Arkın', 'Heur', 'h', 'Erkek', 'heur@h.h'),
(3, 'Burak', 'Bakış', 'Baykuş', '1', 'Erkek', 'burak@hotmail.com'),
(6, 'Ali', 'Aksu', 'ali', '1', 'Erkek', 'ali@gmail.com');
