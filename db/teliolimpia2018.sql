-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Gép: localhost:8889
-- Létrehozás ideje: 2022. Ápr 24. 21:14
-- Kiszolgáló verziója: 5.7.34
-- PHP verzió: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `teliolimpia2018`
--
CREATE DATABASE IF NOT EXISTS `teliolimpia2018` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `teliolimpia2018`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `helyezettek`
--

DROP TABLE IF EXISTS `helyezettek`;
CREATE TABLE `helyezettek` (
  `helyezesID` int(11) NOT NULL,
  `helyezes` int(2) NOT NULL,
  `orszag` varchar(50) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `arany` int(2) NOT NULL,
  `ezust` int(2) NOT NULL,
  `bronz` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `helyezettek`
--

INSERT INTO `helyezettek` (`helyezesID`, `helyezes`, `orszag`, `arany`, `ezust`, `bronz`) VALUES
(1, 1, 'Norvégia', 14, 14, 11),
(2, 2, 'Németország', 14, 10, 4),
(3, 3, 'Kanada', 11, 8, 10),
(4, 4, 'Egyesült Államok', 9, 8, 10),
(5, 5, 'Hollandia', 8, 6, 6),
(6, 6, 'Svédország', 7, 6, 1),
(7, 7, 'Dél-Korea', 5, 8, 4),
(8, 8, 'Svájc', 5, 6, 4),
(9, 9, 'Franciaország', 5, 4, 6),
(10, 10, 'Ausztria', 5, 3, 6),
(11, 21, 'Magyarország', 1, 0, 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `sportagak`
--

DROP TABLE IF EXISTS `sportagak`;
CREATE TABLE `sportagak` (
  `sportagID` int(11) NOT NULL,
  `sportagneve` varchar(50) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `versenyszamok` int(2) NOT NULL,
  `varos` varchar(50) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `helyszin` varchar(100) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `sportagak`
--

INSERT INTO `sportagak` (`sportagID`, `sportagneve`, `versenyszamok`, `varos`, `helyszin`) VALUES
(1, 'Alpesisí', 11, 'Csongszon', 'Csongszoni alpesi közpon'),
(2, 'Biatlon', 11, 'Csongszon', 'Alpensia biatlonközpont'),
(3, 'Bob', 3, 'Phjongcshang', 'Alpensia biatlonközpont'),
(4, 'Curling', 3, 'Kangnung', 'Kangnungi curlingközpont'),
(5, 'Északi összetett', 3, 'Phjongcshang', 'Alpensia biatlonközpont'),
(6, 'Gyorskorcsolya', 14, 'Kangnung', 'Kangnungi gyorskorcsolya-pálya'),
(7, 'Jégkorong', 2, 'Kangnung', 'Kangnungi jégkorongcsarnok'),
(8, 'Műkorcsolya', 5, 'Kangnung', 'Kangnungi jégkorongcsarnok'),
(9, 'Rövidpályás gyorskorcsolya', 9, 'Kangnung', 'Kangnungi jégkorongcsarnok'),
(10, 'Síakrobatika', 10, 'Pogvang', 'Phoenix Park'),
(11, 'Sífutás', 12, 'Phjongcshang', 'Alpensia biatlonközpont'),
(12, 'Síugrás', 4, 'Phjongcshang', 'Pyeongchang'),
(13, 'Snowboard', 10, 'Pogvang', 'Phoenix Park'),
(14, 'Szánkó', 4, 'Phjongcshang', 'Alpensia csúszóközpont'),
(15, 'Szkeleton', 2, 'Phjongcshang', 'Alpensia csúszóközpont');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `helyezettek`
--
ALTER TABLE `helyezettek`
  ADD PRIMARY KEY (`helyezesID`),
  ADD UNIQUE KEY `IdxOrszag` (`orszag`);

--
-- A tábla indexei `sportagak`
--
ALTER TABLE `sportagak`
  ADD PRIMARY KEY (`sportagID`),
  ADD UNIQUE KEY `IdxSportag` (`sportagneve`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
