-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Maj 2021, 17:37
-- Wersja serwera: 10.4.18-MariaDB
-- Wersja PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `restauracja`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klient`
--

CREATE TABLE `klient` (
  `Klient_ID` int(11) NOT NULL,
  `Imie` varchar(255) DEFAULT NULL,
  `Nazwisko` varchar(255) DEFAULT NULL,
  `Telefon` int(11) DEFAULT NULL,
  `Adres` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kupon`
--

CREATE TABLE `kupon` (
  `KodZniżkowy` varchar(25) DEFAULT NULL,
  `Rabat` decimal(10,2) DEFAULT NULL,
  `DataWażności` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `menu`
--

CREATE TABLE `menu` (
  `Menu_ID` int(11) NOT NULL,
  `Kategoria` varchar(255) DEFAULT NULL,
  `Nazwa` varchar(255) DEFAULT NULL,
  `Cena` decimal(10,2) DEFAULT NULL,
  `Opis` varchar(255) DEFAULT NULL,
  `Alergeny` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `menu`
--

INSERT INTO `menu` (`Menu_ID`, `Kategoria`, `Nazwa`, `Cena`, `Opis`, `Alergeny`) VALUES
(1, 'Pizza', 'Hawajska', '69.42', 'sos pomidorowy,mozarella,szynka,ananas', 'Ananas'),
(2, 'Pizza', 'Margherita', '16.00', 'sos pomidorowy,mozarella,bazylia', ''),
(3, 'Pizza', 'Capricciosa', '20.00', 'sos pomidorowy,szynka,pieczarki,mozarella,bazylia', ''),
(4, 'Pizza', 'Funghi', '18.00', 'sos pomidorowy,pieczarki, mozarella,przyprawy', ''),
(5, 'Pizza', 'Szefa', '20.00', 'sos pomidorowy,mozarella, tuńczyk,cebula,kapary,czosnek,tabasco', ''),
(6, 'Pizza', 'Prosciutto', '20.00', 'sos pomidorowy,szynka,mozarella,przyprawy', ''),
(7, 'Pizza', 'Vegetariańska', '21.00', 'sos pomidorowy,pieczarki,papryka,kukurydza,cebula,pomidor,ogórek,oliwki,ser,przyprawy', ''),
(8, 'Zupa', 'Żurek', '11.00', 'Tradycyjny staropolski żurek z jajkiem i domowym pieczywem', ''),
(9, 'Zupa', 'Barszcz czerwony', '9.00', 'Barszcz z krokiecikiem', ''),
(10, 'Zupa', 'Zupa krem', '10.00', 'Krem z pieczonej papryki z kozim serem i pudrem chili ', ''),
(11, 'Zupa', 'Gulasz', '12.00', 'Zupa gulaszowa z domowym pieczywem', ''),
(12, 'Zupa', 'Grzybowa', '11.00', 'Zupa grzybowa z francuskim paluszkiem', ''),
(13, 'Zupa', 'Rosół', '10.00', 'Rosół z ręcznie robionym makaronem jajecznym, gotowaną marchewką, posypany pietruszką', ''),
(14, 'Zupa', 'Pomidorowa', '8.00', 'Przygotowana na bazie z rosołu', ''),
(15, 'Makaron', 'Boloński', '10.90', 'mięso wołowo- wieprzowe, pomidory pelati, marchewka. czerwona cebula, czosnek, przyprawy', ''),
(16, 'Makaron', 'Szpinakowy', '11.90', 'szpinak, lazur, śmietana, przyprawy', ''),
(17, 'Makaron', 'Szpinakowy z kurczakiem ', '14.90', 'kurczak, szpinak, lazur, śmietana, przyprawy', ''),
(18, 'Makaron', 'Meksykański', '12.90', 'mięso wieprzowo-wołowe, pomidory pelati, kukurydza, czerwona fasola, czerwona cebula, jalapeno, przyprawy', ''),
(19, 'Makaron', 'Carbonara', '13.90', 'bekon, śmietana, cebula, przyprawy', ''),
(20, 'Makaron', 'Currygodny ', '13.90', 'kurczak, curry, śmietana, cebula czerwona, czosnek, przyprawy', ''),
(21, 'Makaron', 'Zielone Curry', '14.90', 'kurczak, kolendra, mleko kokosowe, zielona pasta curry, śmietana, sok z cytryny', ''),
(22, 'Makaron', 'Pomodoro con pollo', '13.90', 'kurczak, pomidory suszone, cebula czerwona, bazylia, czosnek, śmietana, przyprawy', ''),
(23, 'Sushi', 'Futomaki w tempurze z łososiem', '30.90', 'awokado, majonez', ''),
(24, 'Sushi', 'Łosoś wędzony', '28.90', 'omlet tamago, awokado, ogórek, serek, majonez paprykowy, sezam', ''),
(25, 'Sushi', 'Futomaki Mariana', '30.90', 'łosoś, ogórek, awokado, serek, sałata, rzodkiew, majonez, zawinięty zapiekanym łososiem', ''),
(26, 'Sushi', 'Węgorz', '31.90', 'tykwa, omlet tamago, serek, shitake, dodatkowo owinięty omletem', ''),
(27, 'Sushi', 'Tuńczyk w tempurze', '28.90', 'ogórek, rzodkiew, sezam, serek', ''),
(28, 'Sushi', 'Losoś', '28.90', 'awokado, majonez', ''),
(29, 'Sushi', 'Krewetki w tempurze ', '29.90', 'tobikko orange, serek, sałata, ogórek, rzodkiew, surimi', ''),
(30, 'Sushi', 'Łosoś pieczony', '29.90', 'sałata, sezam, serek', ''),
(31, 'Sushi', 'Tatar z łososia', '28.90', 'por, sos sriracha, sezam', ''),
(32, 'Sushi', 'Sandacz w tempurze', '26.90', 'serek, sałata, pestki, tykwa, grzyby shitake, sos śliwkowy, nitki chili', ''),
(33, 'Sushi', 'Zapiekany imbirowy łosoś z krewetkami w tempurze', '29.90', 'sałata, ogórek, serek, prażone pestki, imbirowy sos teriyaki, sriracha mayo, sezam', ''),
(34, 'Pierogi', '', '21.00', 'Z białym twarogiem, ziemniakami i cebulą zasmażaną na boczku', ''),
(35, 'Pierogi', '', '24.00', 'Z kapustą duszoną z borowikami i cebulą zasmażaną na boczku', ''),
(36, 'Pierogi', '', '26.00', 'Z własnoręcznie mielonym mięsem wieprzowo-wołowym i białą cebulą zasmażaną na boczku', ''),
(37, 'Pierogi', '', '24.00', 'Z siekanym szpinakiem, suszonymi pomidorami, rozdrobnionym serem feta, oraz sosem z sera Dor Blue', ''),
(38, 'Pierogi', '', '22.00', 'Z kaszanką przyrządzaną na ostro, podawane z białą cebulą zasmażaną na boczku', ''),
(39, 'Pierogi', '', '28.50', 'Z własnoręcznie mielonym mięsem z dzika polane sosem z grzybów leśnych', ''),
(40, 'Pierogi', '', '25.00', 'Z kurczakiem, suszonymi pomidorami i fetą, polane sosem paprykowo-oliwkowym', ''),
(41, 'Pierogi', '', '23.00', 'Ze szpinakiem, suszonymi pomidorami i tofu podawane z zasmażaną cebulą', ''),
(42, 'Pierogi', '', '27.00', 'z wegańskim mięsem al’a wołowina, wegańskim cheddarem, ogórkiem kiszonym, czerwoną cebulą, majonezem i ketchupem', ''),
(43, 'Pierogi', '', '22.00', 'Z marchewką i masłem orzechowym podawane z zasmażaną cebulą', ''),
(44, 'Pierogi', '', '33.00', 'Z własnoręcznie przygotowaną pastą z łososia, suszonych pomidorów i serka śmietankowego, podawane z sosem koperkowym (mogą zawierać ości)', ''),
(45, 'Pierogi', '', '27.00', 'Z ziemniakami, pikantną kiełbasą chorizo, mascarpone i pastą truflową podawane z sosem koperkowym', ''),
(46, 'Pierogi', '', '29.50', 'Z gęsiną podawane z sosem żurawinowym i posypane pietruszką', ''),
(47, 'Pierogi', '', '23.00', 'Na słodko z malinami i białą czekoladą, na cieście czekoladowym, podawane z sosem śmietankowym', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `porcja`
--

CREATE TABLE `porcja` (
  `Porcja_ID` int(11) NOT NULL,
  `Nazwa` varchar(255) DEFAULT NULL,
  `MnożnikCeny` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamów`
--

CREATE TABLE `zamów` (
  `ZamówienieID` int(11) NOT NULL,
  `MenuID` int(11) NOT NULL,
  `PorcjaID` int(11) NOT NULL,
  `Ilość` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamówienia`
--

CREATE TABLE `zamówienia` (
  `Zamówienie_ID` int(11) NOT NULL,
  `KlientID` int(11) DEFAULT NULL,
  `DataZamówienia` datetime DEFAULT NULL,
  `DataDostarczenia` datetime DEFAULT NULL,
  `Komentarz` varchar(255) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `KodZniżkowy` varchar(25) DEFAULT NULL,
  `Płatność` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`Klient_ID`);

--
-- Indeksy dla tabeli `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`Menu_ID`);

--
-- Indeksy dla tabeli `porcja`
--
ALTER TABLE `porcja`
  ADD PRIMARY KEY (`Porcja_ID`);

--
-- Indeksy dla tabeli `zamów`
--
ALTER TABLE `zamów`
  ADD PRIMARY KEY (`ZamówienieID`,`MenuID`,`PorcjaID`),
  ADD KEY `MenuID` (`MenuID`),
  ADD KEY `PorcjaID` (`PorcjaID`);

--
-- Indeksy dla tabeli `zamówienia`
--
ALTER TABLE `zamówienia`
  ADD PRIMARY KEY (`Zamówienie_ID`),
  ADD KEY `KlientID` (`KlientID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `klient`
--
ALTER TABLE `klient`
  MODIFY `Klient_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `menu`
--
ALTER TABLE `menu`
  MODIFY `Menu_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT dla tabeli `porcja`
--
ALTER TABLE `porcja`
  MODIFY `Porcja_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `zamówienia`
--
ALTER TABLE `zamówienia`
  MODIFY `Zamówienie_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `zamów`
--
ALTER TABLE `zamów`
  ADD CONSTRAINT `zamów_ibfk_1` FOREIGN KEY (`MenuID`) REFERENCES `menu` (`Menu_ID`),
  ADD CONSTRAINT `zamów_ibfk_2` FOREIGN KEY (`PorcjaID`) REFERENCES `porcja` (`Porcja_ID`);

--
-- Ograniczenia dla tabeli `zamówienia`
--
ALTER TABLE `zamówienia`
  ADD CONSTRAINT `zamówienia_ibfk_1` FOREIGN KEY (`KlientID`) REFERENCES `klient` (`Klient_ID`),
  ADD CONSTRAINT `zamówienia_ibfk_2` FOREIGN KEY (`Zamówienie_ID`) REFERENCES `zamów` (`ZamówienieID`),
  ADD CONSTRAINT `zamówienia_ibfk_3` FOREIGN KEY (`KlientID`) REFERENCES `klient` (`Klient_ID`),
  ADD CONSTRAINT `zamówienia_ibfk_4` FOREIGN KEY (`Zamówienie_ID`) REFERENCES `zamów` (`ZamówienieID`),
  ADD CONSTRAINT `zamówienia_ibfk_5` FOREIGN KEY (`KlientID`) REFERENCES `klient` (`Klient_ID`),
  ADD CONSTRAINT `zamówienia_ibfk_6` FOREIGN KEY (`Zamówienie_ID`) REFERENCES `zamów` (`ZamówienieID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
