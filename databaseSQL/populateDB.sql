/*POPULATE DB*/

/*CATEGORIE

1= SUBWOOFER
2= SPEAKER
3= MIXER
4= HEADPHONES
5= MICROPHONES
6= CABLES

*/
INSERT INTO `categoria`(`CodCategoria`, `Nome`) VALUES (1,'Subwoofer');
INSERT INTO `categoria`(`CodCategoria`, `Nome`) VALUES (2,'Speaker');
INSERT INTO `categoria`(`CodCategoria`, `Nome`) VALUES (3,'Mixer');
INSERT INTO `categoria`(`CodCategoria`, `Nome`) VALUES (4,'Headphones');
INSERT INTO `categoria`(`CodCategoria`, `Nome`) VALUES (5,'Microphones');
INSERT INTO `categoria`(`CodCategoria`, `Nome`) VALUES (6,'Cables');

/*UTENTI*/

INSERT INTO `utente` (`Nome`, `Cognome`, `Nickname`, `E_mail`, `Password`, `isVend`) VALUES
('Andrea', 'Brigliadori', 'bribri00', 'brigliadoriandrea@gmail.com', 'adec5f06f4290eca5edafd9d779f48f6aa4fc83c7a50cd1644545a04aeac2a7e', b'1'),
('Davide', 'Di marco', 'davidima00', 'davidedimarco44@gmail.com', '9331a1d273d1c186ac996050b184dd0c616d495c4b6ff7bc9ba016c21cd331ea', b'1'),
('Riccardo', 'Leonelli', 'richileo', 'riccardoleonelli@gmail.com', '7477c6479a5184743694f9b65d3c422d76d7009f9bafa3c37e1c1677694c6198', b'1');
INSERT INTO `utente`(`Nome`, `Cognome`, `Nickname`, `E_mail`, `Password`, `isVend`) VALUES ('Marco','Rossi','marcolinor','marcorossi@gmail.com','b133a0c0e9bee3be20163d2ad31d6248db292aa6dcb1ee087a2aa50e0fc75ae2',b'0');

/*PRODOTTI -> SUBWOOFER*/
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('1897','Subwoofer XENON','Medium Level','185.00','1','5','davidima00');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('1898','Subwoofer DAEMON','For your tech house','225.00','1','4','davidima00');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('1899','Subwoofer EVIL','EXTREME bass for your music','385.99','1','10','bribri00');


/*PRODOTTI -> SPEAKER*/
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('2564','Speaker XENON','Medium Level','85.00','2','2','bribri00');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('2565','Speaker DAEMON','Fantastic voices','130.00','2','3','davidima00');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('2566','Speaker EVIL','EXTREME high-mid for your music','250.00','2','5','richileo');

/*PRODOTTI -> MIXER*/
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('2568','Mixer XENON','Are you a beginner?','300','3','7','richileo');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('2569','Mixer DAEMON','Mix your best songs','600','3','2','bribri00');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('2570','Mixer EVIL','Your console where you want','1200','3','5','davidima00');

/*PRODOTTI -> HEADPHONES*/

INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('2897','Headphones XENON','For home use','100','4','4','davidima00');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('2898','Headphones DAEMON','Use them where you want','200','4','10','bribri00');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('2899','headphones EVIL','For professional use','600','4','8','richileo');

/*PRODOTTI -> MICROPHONES */

INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('1885','Microphone XENON','Powerfull, easy to use','39.99','5','1','davidima00');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('1886','Microphone DAEMON','the cheapest','15.99','5','20','richileo');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('1887','Microphone EVIL','For professional use','79.99','5','6','bribri00');

/*PRODOTTI -> CABLES*/
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('3541','Cables XENON 3.5mm','For home use','10','6','0','bribri00');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('3542','Cables DAEMON 1.5mm','Use them where you want','25','6','5','bribri00');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('3543','Cables EXTREME 6.5mm','For professional use','35','6','3','davidima00');


/*NOTIFICA SOLO PER PROVA A DAVIDE CHE E UN VENDITORE*/
INSERT INTO `notifica`(`CodNotifica`, `DataNotifica`, `Testo`, `Letto`, `Nickname`) VALUES (NULL,'2022-01-22','Notifica di prova',false,'davidima00');

/*CODICI SCONTO*/

INSERT INTO `codici`(`Id`, `codiceSconto`, `sconto`, `isActive`) VALUES (1,'PROMO20',20,1);
INSERT INTO `codici`(`Id`, `codiceSconto`, `sconto`, `isActive`) VALUES (2,'PROMO30',30,1);
INSERT INTO `codici`(`Id`, `codiceSconto`, `sconto`, `isActive`) VALUES (3,'PROMO50',50,0);
