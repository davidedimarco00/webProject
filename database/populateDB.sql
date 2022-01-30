/*POPULATE DB*/

/*CATEGORIE

1= SUBWOOFER
2= SPEAKER
3= MIXER
4= HEADPHONES
5= MICROPHONES
6= CABLES

*/
INSERT INTO `categoria`(`CodCategoria`, `Nome`) VALUES (NULL,'Subwoofer');
INSERT INTO `categoria`(`CodCategoria`, `Nome`) VALUES (NULL,'Speaker');
INSERT INTO `categoria`(`CodCategoria`, `Nome`) VALUES (NULL,'Mixer');
INSERT INTO `categoria`(`CodCategoria`, `Nome`) VALUES (NULL,'Headphones');
INSERT INTO `categoria`(`CodCategoria`, `Nome`) VALUES (NULL,'Microphones');
INSERT INTO `categoria`(`CodCategoria`, `Nome`) VALUES (NULL,'Cables');

/*UTENTI*/

INSERT INTO `utente` (`Nome`, `Cognome`, `Nickname`, `E_mail`, `Password`, `isVend`) VALUES
('Andrea', 'Brigliadori', 'bribri00', 'brigliadoriandrea@gmail.com', 'adec5f06f4290eca5edafd9d779f48f6aa4fc83c7a50cd1644545a04aeac2a7e', b'1'),
('Davide', 'Di marco', 'davidima00', 'davidedimarco44@gmail.com', '9331a1d273d1c186ac996050b184dd0c616d495c4b6ff7bc9ba016c21cd331ea', b'1'),
('Riccardo', 'Leonelli', 'richileo', 'riccardoleonelli@gmail.com', '7477c6479a5184743694f9b65d3c422d76d7009f9bafa3c37e1c1677694c6198', b'1'),
INSERT INTO `utente`(`Nome`, `Cognome`, `Nickname`, `E_mail`, `Password`, `isVend`) VALUES ('Marco','Rossi','marcolinor','marcorossi@gmail.com','aa9b6b0760783de8553dcad5fab353d64e51bb4c73e3057fbd15d58842c1fe5e',b'0');

/*PRODOTTI -> SUBWOOFER*/
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`) VALUES ('1897','Subwoofer XENON','Medium Level','185.00','1');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`) VALUES ('1898','Subwoofer DAEMON','For your tech house','225.00','1');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`) VALUES ('1899','Subwoofer EVIL','EXTREME bass for your music','385.99','1');


/*PRODOTTI -> SPEAKER*/
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`) VALUES ('2564','Speaker XENON','Medium Level','85.00','2');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`) VALUES ('2565','Speaker DAEMON','Fantastic voices','130.00','2');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`) VALUES ('2566','Speaker EVIL','EXTREME high-mid for your music','250.00','2');

/*PRODOTTI -> MIXER*/
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`) VALUES ('2568','Mixer XENON','Are you a beginner?','300','3');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`) VALUES ('2569','Mixer DAEMON','Mix your best songs','600','3');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`) VALUES ('2570','Mixer EVIL','Your console where you want','1200','3');

/*PRODOTTI -> HEADPHONES*/

INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`) VALUES ('2897','Headphones XENON','For home use','100','4');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`) VALUES ('2898','Headphones DAEMON','Use them where you want','200','4');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`) VALUES ('2899','headphones EVIL','For professional use','600','4');

/*PRODOTTI -> MICROPHONES */

INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`) VALUES ('1885','Microphone XENON','Powerfull, easy to use','39.99','5');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`) VALUES ('1886','Microphone DAEMON','the cheapest','15.99','5');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`) VALUES ('1887','Microphone EVIL','For professional use','79.99','5');

/*PRODOTTI -> CABLES*/
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`) VALUES ('3541','Cables XENON 3.5mm','For home use','10','6');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`) VALUES ('3542','Cables DAEMON 1.5mm','Use them where you want','25','6');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`) VALUES ('3543','Cables EXTREME 6.5mm','For professional use','35','6');


/*NOTIFICA SOLO PER PROVA A DAVIDE CHE E UN VENDITORE*/
INSERT INTO `notifica`(`CodNotifica`, `Data`, `Testo`, `Letto`, `Nickname`) VALUES (NULL,'2022-01-22','Notifica di prova',false,'davidima00');

