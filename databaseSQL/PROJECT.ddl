-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Feb 12, 2022 alle 17:36
-- Versione del server: 10.4.21-MariaDB
-- Versione PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dsoundsystemLOGIC`
--
CREATE DATABASE dsoundsystemLOGIC;
-- --------------------------------------------------------

--
-- Struttura della tabella `carrello`
--

CREATE TABLE `carrello` (
  `CodCarrello` int(11) NOT NULL,
  `Nickname` varchar(20) NOT NULL,
  `Stato` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `categoria`
--

CREATE TABLE `categoria` (
  `CodCategoria` int(11) NOT NULL,
  `Nome` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `codici`
--

CREATE TABLE `codici` (
  `Id` int(11) NOT NULL,
  `codiceSconto` varchar(20) NOT NULL,
  `sconto` int(20) NOT NULL,
  `isActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `fattura`
--

CREATE TABLE `fattura` (
  `CodFattura` int(11) NOT NULL,
  `CodOrdine` int(11) NOT NULL,
  `Importo` int(11) NOT NULL,
  `Nome` varchar(20) NOT NULL,
  `Cognome` varchar(20) NOT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Indirizzo` varchar(22) NOT NULL,
  `Zip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `Incarrello`
--

CREATE TABLE `Incarrello` (
  `CodCarrello` int(11) NOT NULL,
  `CodProdotto` int(11) NOT NULL,
  `quantita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `notifica`
--

CREATE TABLE `notifica` (
  `CodNotifica` int(11) NOT NULL,
  `DataNotifica` varchar(20) NOT NULL,
  `Testo` varchar(600) NOT NULL,
  `Letto` bit(1) NOT NULL,
  `Nickname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `ordine`
--

CREATE TABLE `ordine` (
  `CodOrdine` int(11) NOT NULL,
  `CodCarrello` int(11) NOT NULL,
  `Stato` varchar(20) NOT NULL,
  `DataOrdine` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto`
--

CREATE TABLE `prodotto` (
  `CodProdotto` int(11) NOT NULL,
  `Nome` varchar(20) NOT NULL,
  `Descrizione` varchar(600) NOT NULL,
  `Prezzo` float NOT NULL,
  `CodCategoria` int(11) NOT NULL,
  `Quantità` int(11) NOT NULL,
  `Venditore` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `Nome` varchar(20) NOT NULL,
  `Cognome` varchar(20) NOT NULL,
  `Nickname` varchar(20) NOT NULL,
  `E_mail` varchar(200) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `isVend` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `carrello`
--
ALTER TABLE `carrello`
  ADD PRIMARY KEY (`CodCarrello`),
  ADD UNIQUE KEY `ID_CARRELLO_IND` (`CodCarrello`),
  ADD KEY `REF_CARRE_UTENT_IND` (`Nickname`);

--
-- Indici per le tabelle `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`CodCategoria`),
  ADD UNIQUE KEY `ID_CATEGORIA_IND` (`CodCategoria`);

--
-- Indici per le tabelle `codici`
--
ALTER TABLE `codici`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `ID_codici_IND` (`Id`);

--
-- Indici per le tabelle `fattura`
--
ALTER TABLE `fattura`
  ADD PRIMARY KEY (`CodFattura`,`CodOrdine`);

--
-- Indici per le tabelle `Incarrello`
--
ALTER TABLE `Incarrello`
  ADD PRIMARY KEY (`CodProdotto`,`CodCarrello`),
  ADD UNIQUE KEY `ID_Incarrello_IND` (`CodProdotto`,`CodCarrello`),
  ADD KEY `REF_Incar_CARRE_IND` (`CodCarrello`);

--
-- Indici per le tabelle `notifica`
--
ALTER TABLE `notifica`
  ADD PRIMARY KEY (`CodNotifica`),
  ADD UNIQUE KEY `ID_NOTIFICA_IND` (`CodNotifica`),
  ADD KEY `REF_NOTIF_UTENT_IND` (`Nickname`);

--
-- Indici per le tabelle `ordine`
--
ALTER TABLE `ordine`
  ADD PRIMARY KEY (`CodOrdine`,`CodCarrello`);

--
-- Indici per le tabelle `prodotto`
--
ALTER TABLE `prodotto`
  ADD PRIMARY KEY (`CodProdotto`),
  ADD UNIQUE KEY `ID_PRODOTTO_IND` (`CodProdotto`),
  ADD KEY `REF_PRODO_CATEG_IND` (`CodCategoria`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`Nickname`),
  ADD UNIQUE KEY `ID_UTENTE_IND` (`Nickname`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `carrello`
--
ALTER TABLE `carrello`
  MODIFY `CodCarrello` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT per la tabella `categoria`
--
ALTER TABLE `categoria`
  MODIFY `CodCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `codici`
--
ALTER TABLE `codici`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `fattura`
--
ALTER TABLE `fattura`
  MODIFY `CodFattura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `notifica`
--
ALTER TABLE `notifica`
  MODIFY `CodNotifica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `ordine`
--
ALTER TABLE `ordine`
  MODIFY `CodOrdine` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  MODIFY `CodProdotto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3544;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `carrello`
--
ALTER TABLE `carrello`
  ADD CONSTRAINT `REF_CARRE_UTENT_FK` FOREIGN KEY (`Nickname`) REFERENCES `utente` (`Nickname`);

--
-- Limiti per la tabella `Incarrello`
--
ALTER TABLE `Incarrello`
  ADD CONSTRAINT `REF_Incar_CARRE_FK` FOREIGN KEY (`CodCarrello`) REFERENCES `carrello` (`CodCarrello`),
  ADD CONSTRAINT `REF_Incar_PRODO` FOREIGN KEY (`CodProdotto`) REFERENCES `prodotto` (`CodProdotto`);

--
-- Limiti per la tabella `notifica`
--
ALTER TABLE `notifica`
  ADD CONSTRAINT `REF_NOTIF_UTENT_FK` FOREIGN KEY (`Nickname`) REFERENCES `utente` (`Nickname`);

--
-- Limiti per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  ADD CONSTRAINT `REF_PRODO_CATEG_FK` FOREIGN KEY (`CodCategoria`) REFERENCES `categoria` (`CodCategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;