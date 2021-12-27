-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Dic 27, 2021 alle 22:20
-- Versione del server: 10.4.21-MariaDB
-- Versione PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `cliente`
--

CREATE TABLE `cliente` (
  `civico` int(11) NOT NULL,
  `metPagamento` varchar(20) NOT NULL,
  `NickCliente` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(40) NOT NULL,
  `Nome` varchar(20) NOT NULL,
  `Cognome` varchar(20) NOT NULL,
  `data_di_nascita` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `ordine`
--

CREATE TABLE `ordine` (
  `Stato` varchar(20) NOT NULL,
  `prezzoTotale` float NOT NULL,
  `codOrdine` int(11) NOT NULL,
  `Data` date NOT NULL,
  `numProdotti` int(11) NOT NULL,
  `NickVend` varchar(20) NOT NULL,
  `NickCliente` varchar(20) NOT NULL,
  `codSpedizione` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto`
--

CREATE TABLE `prodotto` (
  `peso` float NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `costo` float NOT NULL,
  `codProdotto` int(11) NOT NULL,
  `Prezzo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `prodottoordine`
--

CREATE TABLE `prodottoordine` (
  `codOrdine` int(11) NOT NULL,
  `codProdotto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `prodottovenditore`
--

CREATE TABLE `prodottovenditore` (
  `codProdotto` int(11) NOT NULL,
  `NickVend` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `spedizione`
--

CREATE TABLE `spedizione` (
  `codSpedizione` int(11) NOT NULL,
  `nomeCorriere` varchar(20) NOT NULL,
  `indirizzoDest` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `venditore`
--

CREATE TABLE `venditore` (
  `NickVend` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(40) NOT NULL,
  `Nome` varchar(20) NOT NULL,
  `Cognome` varchar(20) NOT NULL,
  `data_di_nascita` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`NickCliente`);

--
-- Indici per le tabelle `ordine`
--
ALTER TABLE `ordine`
  ADD PRIMARY KEY (`codOrdine`),
  ADD KEY `REF_ORDIN_VENDI_FK` (`NickVend`),
  ADD KEY `REF_ORDIN_CLIEN_FK` (`NickCliente`),
  ADD KEY `REF_ORDIN_SPEDI_FK` (`codSpedizione`);

--
-- Indici per le tabelle `prodotto`
--
ALTER TABLE `prodotto`
  ADD PRIMARY KEY (`codProdotto`);

--
-- Indici per le tabelle `prodottoordine`
--
ALTER TABLE `prodottoordine`
  ADD PRIMARY KEY (`codOrdine`,`codProdotto`);

--
-- Indici per le tabelle `prodottovenditore`
--
ALTER TABLE `prodottovenditore`
  ADD PRIMARY KEY (`codProdotto`);

--
-- Indici per le tabelle `spedizione`
--
ALTER TABLE `spedizione`
  ADD PRIMARY KEY (`codSpedizione`);

--
-- Indici per le tabelle `venditore`
--
ALTER TABLE `venditore`
  ADD PRIMARY KEY (`NickVend`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `ordine`
--
ALTER TABLE `ordine`
  MODIFY `codOrdine` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  MODIFY `codProdotto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `spedizione`
--
ALTER TABLE `spedizione`
  MODIFY `codSpedizione` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `ordine`
--
ALTER TABLE `ordine`
  ADD CONSTRAINT `REF_ORDIN_CLIEN_FK` FOREIGN KEY (`NickCliente`) REFERENCES `cliente` (`NickCliente`),
  ADD CONSTRAINT `REF_ORDIN_SPEDI_FK` FOREIGN KEY (`codSpedizione`) REFERENCES `spedizione` (`codSpedizione`),
  ADD CONSTRAINT `REF_ORDIN_VENDI_FK` FOREIGN KEY (`NickVend`) REFERENCES `venditore` (`NickVend`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
