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
INSERT INTO `categoria`(`CodCategoria`, `Nome`) VALUES (4,'Cuffie');
INSERT INTO `categoria`(`CodCategoria`, `Nome`) VALUES (5,'Microfoni');
INSERT INTO `categoria`(`CodCategoria`, `Nome`) VALUES (6,'Cavi e fili');

/*UTENTI*/

INSERT INTO `utente` (`Nome`, `Cognome`, `Nickname`, `E_mail`, `Password`, `isVend`) VALUES
('Andrea', 'Brigliadori', 'bribri00', 'brigliadoriandrea@gmail.com', 'adec5f06f4290eca5edafd9d779f48f6aa4fc83c7a50cd1644545a04aeac2a7e', b'1'),
('Davide', 'Di marco', 'davidima00', 'davidedimarco44@gmail.com', '9331a1d273d1c186ac996050b184dd0c616d495c4b6ff7bc9ba016c21cd331ea', b'1'),
('Riccardo', 'Leonelli', 'richileo', 'riccardoleonelli@gmail.com', '7477c6479a5184743694f9b65d3c422d76d7009f9bafa3c37e1c1677694c6198', b'1');
INSERT INTO `utente`(`Nome`, `Cognome`, `Nickname`, `E_mail`, `Password`, `isVend`) VALUES ('Marco','Rossi','marcolinor','marcorossi@gmail.com','b133a0c0e9bee3be20163d2ad31d6248db292aa6dcb1ee087a2aa50e0fc75ae2',b'0');

/*PRODOTTI -> SUBWOOFER*/
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('1897','Subwoofer XENON','Livello Medio','185.00','1','5','davidima00');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('1898','Subwoofer DAEMON','Per la tua tech-house','225.00','1','4','davidima00');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('1899','Subwoofer EVIL','EXTREME bass per la tua musica','385.99','1','10','bribri00');


/*PRODOTTI -> SPEAKER*/
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('2564','Speaker XENON','Livello medio','85.00','2','2','bribri00');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('2565','Speaker DAEMON','Una voce fantastica','130.00','2','3','davidima00');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('2566','Speaker EVIL','EXTREME alti e medi per la tua musica','250.00','2','5','richileo');

/*PRODOTTI -> MIXER*/
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('2568','Mixer XENON','Sei un principiante?','300','3','7','richileo');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('2569','Mixer DAEMON','Mixa le tue canzoni preferite','600','3','2','bribri00');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('2570','Mixer EVIL','La tua console dove vuoi tu','1200','3','5','davidima00');

/*PRODOTTI -> HEADPHONES*/

INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('2897','Cuffie XENON','Da usare in casa','100','4','4','davidima00');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('2898','Cuffie DAEMON','Puoi portarle dove vuoi','200','4','10','bribri00');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('2899','Cuffie EVIL','Consigliate per un uso professionale','600','4','8','richileo');

/*PRODOTTI -> MICROPHONES */

INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('1885','Microfono XENON','Potente e semplice da usare','39.99','5','1','davidima00');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('1886','Microfono DAEMON','Il piu economico','15.99','5','20','richileo');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('1887','Microfono EVIL','Per uso professionale','79.99','5','6','bribri00');

/*PRODOTTI -> CABLES*/
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('3541','Cavo XENON 3.5mm','Per un uso a casa','10','6','0','bribri00');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('3542','Cavo DAEMON 1.5mm','Usali dove vuoi tu','25','6','5','bribri00');
INSERT INTO `prodotto`(`CodProdotto`, `Nome`, `Descrizione`, `Prezzo`, `CodCategoria`, `Quantità`, `Venditore`) VALUES ('3543','Cavo EXTREME 6.5mm','Per uso professionale','35','6','3','davidima00');


/*NOTIFICA SOLO PER PROVA A DAVIDE CHE E UN VENDITORE*/
INSERT INTO `notifica`(`CodNotifica`, `DataNotifica`, `Testo`, `Letto`, `Nickname`) VALUES (NULL,'2022-01-22','Notifica di prova',false,'davidima00');

/*CODICI SCONTO*/

INSERT INTO `codici`(`Id`, `codiceSconto`, `sconto`, `isActive`) VALUES (1,'PROMO20',20,1);
INSERT INTO `codici`(`Id`, `codiceSconto`, `sconto`, `isActive`) VALUES (2,'PROMO30',30,1);
INSERT INTO `codici`(`Id`, `codiceSconto`, `sconto`, `isActive`) VALUES (3,'PROMO50',50,0);
