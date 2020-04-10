-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: localhost
-- Létrehozás ideje: 2020. Már 13. 13:05
-- Kiszolgáló verziója: 10.4.6-MariaDB
-- PHP verzió: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `513a_kaveoldal`
--
CREATE DATABASE IF NOT EXISTS `513a_kaveoldal` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `513a_kaveoldal`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `ID` int(11) NOT NULL,
  `nev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `jelszo` varchar(32) COLLATE utf8_hungarian_ci NOT NULL,
  `regdatum` datetime NOT NULL,
  `utbelep` datetime DEFAULT NULL,
  `statusz` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`ID`, `nev`, `email`, `jelszo`, `regdatum`, `utbelep`, `statusz`) VALUES
(1, 'próba felhasználó', 'admin@admin.hu', '92eb5ffee6ae2fec3ad71c777531578f', '2020-02-21 14:15:28', NULL, 1),
(2, 'Proba felhasználó 2', 'proba2@kaveoldal.hu', '0cc175b9c0f1b6a831c399e269772661', '2020-03-02 09:22:51', NULL, 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `gepek`
--

CREATE TABLE `gepek` (
  `ID` int(11) NOT NULL,
  `gyarto` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `tipus` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `ar` double NOT NULL,
  `leiras` text COLLATE utf8_hungarian_ci NOT NULL,
  `kep` varchar(100) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `gepek`
--

INSERT INTO `gepek` (`ID`, `gyarto`, `tipus`, `ar`, `leiras`, `kep`) VALUES
(1, 'Jura', 'Cafe80', 56000, 'dfkjsdfgh djsfhgudkf gs,df gjdsfh, ksdjfmb, kdsfnk,sdjf g,msdfgh dsmvh ,jsdfbv jdf,vsdfjkv sdfvjk,ds fvsndfvsdxbsvbcxhbxcvb', ''),
(2, 'Szarvasi', 'Kotyogós', 15000, 'dfsfgsdfgjksd ghjksdhfjksdh fjkas dfkj asd,jfk asdfasdfasdfsgda', ''),
(3, 'DeLonghi', 'Ecam 22.110', 467890, 'sdfgsd,fjg hsjfgh sfgsdfgsdfgsdfgdfgsfg', ''),
(4, 'Philips', 'Series 2200', 54323, 'dsfgsdfgsdfgsdfgsdfgsdvbsdfvsdfgsdfgsdfg', ''),
(5, 'Krups', 'EA81044', 87600, 'shfg sdjaghfsajdk fsadgfasgsdfgsdfg', '');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `hirek`
--

CREATE TABLE `hirek` (
  `ID` int(11) NOT NULL,
  `datum` datetime NOT NULL,
  `cim` varchar(200) COLLATE utf8_hungarian_ci NOT NULL,
  `szoveg` text COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `hirek`
--

INSERT INTO `hirek` (`ID`, `datum`, `cim`, `szoveg`) VALUES
(3, '2020-02-17 09:11:00', 'Ma is süt a nap', 'fgsdfgjsd hgfhjf hjasdfh asdf asdfh sadfhj sadfjh asdfm asdfmnasdf mas, dfs'),
(4, '2020-03-06 14:02:20', 'A PHP-nek van jövője', 'yxvdfsadffsadfsadfsa'),
(5, '2020-03-06 14:02:35', 'Nagyon péntek van', 'sdjhfajksdf kjsdhf jksdhf jsd fgsdf\r\ngfdgdf\r\ngsdfgsdfgkjs dhfgkjsdfg'),
(7, '2020-03-09 09:08:38', 'Itt a tavasz', 'adbufjh agsdjkfh sdj., fasdúfgasdf\r\ngsdf\r\ngsdf\r\ngsdfgsdjkf hgsdofg\r\nsdf\r\ngsd\r\nfgsdfgsdjfkg hsd.jkfgsdfg\r\n');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kavek`
--

CREATE TABLE `kavek` (
  `ID` int(11) NOT NULL,
  `kavenev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `szarmhely` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `ar` double NOT NULL,
  `leiras` text COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kavek`
--

INSERT INTO `kavek` (`ID`, `kavenev`, `szarmhely`, `ar`, `leiras`) VALUES
(1, 'Tchibo extra', 'Brazil', 3000, 'bdfjh gdfj d,hv dfskgh skjdf hgsdkjf gh, fdgvk.sd fvdfjnd ghjsgd fhjsgad fkjsgdhj gasdkjkas dghjasg djdf asd hfasgf asdgf asgf jasdfgjkhdf gjhgf kd fhsdbf hsbf jds fakjsd fsú\r\n\r\nasdjfh akjsdfh kjas,dh fjkshad fkjashdkfja hsdfkjashdfkjasdhkjfa hsdjkf hasdkjfh kjsdh fjkasd hfkjas dhfjkas dfkj ashdfjk asdf,jk hasdkfj ahsdkjfash dfjkh asd,jkfh asdkjf haskdjf hsakdjf askdjf hla,sdkjf haksjdf sadf\r\na ksdfhkjasd fjkasd fkjashdfjka sdkjf hasdkjf adk fhkjasd fkjasd fk.jasd hfkjsa dfkja sd, ashdfkj asdf vxcvbdfb'),
(2, 'Omnia duo', 'Columbia', 4000, 'cbhxjkc vx,kcv dfxy,jcvh ndxkcmv x& vxmcv xny,cv yxcnvnyxm, vyxmn cvy,mxcb yxmv yxc'),
(3, 'Nescafe gold', 'India', 5000, 'dfhs gdhfh dbfjhvbd sfjhvb sdhmv sdfmjvb sdfvbsd hcb ,sjv dsmjvb ndscbs mvbsdvf'),
(4, 'Copyluvak', 'Egyiptom', 12340455653, 'gsdfgsdfgsdfg dfg sdf gdsf gsdfg');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `uzenetek`
--

CREATE TABLE `uzenetek` (
  `ID` int(11) NOT NULL,
  `datum` datetime NOT NULL,
  `nev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `uzenet` text COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `uzenetek`
--

INSERT INTO `uzenetek` (`ID`, `datum`, `nev`, `email`, `uzenet`) VALUES
(1, '2020-03-09 09:33:12', 'Gipsz Jakab', 'sdfsad@sdfdf.hu', 'Szeretnék rendelni egy jó erős kávét holnapra!'),
(2, '2020-03-09 09:38:10', '513A', 'sadasdfs@sdfgfdg.hu', 'sadfbu asjdfjkas hdfjkas hdjkf haskjf gashd fgashdg f,asdh gfjhsda gfjhsdafjsadf');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `gepek`
--
ALTER TABLE `gepek`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `hirek`
--
ALTER TABLE `hirek`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `kavek`
--
ALTER TABLE `kavek`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `uzenetek`
--
ALTER TABLE `uzenetek`
  ADD PRIMARY KEY (`ID`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `gepek`
--
ALTER TABLE `gepek`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `hirek`
--
ALTER TABLE `hirek`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `kavek`
--
ALTER TABLE `kavek`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `uzenetek`
--
ALTER TABLE `uzenetek`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
