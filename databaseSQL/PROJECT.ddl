-- *********************************************
-- * Standard SQL generation                   
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.1              
-- * Generator date: Dec  4 2018              
-- * Generation date: Sat Jan 29 12:20:17 2022 
-- * LUN file: C:\xampp\htdocs\webProject\database\ER.lun 
-- * Schema: dsoundsystemLOGIC/SQL 
-- ********************************************* 


-- Database Section
-- ________________ 

create database dsoundsystemLOGIC;


-- DBSpace Section
-- _______________


-- Tables Section
-- _____________ 

create table PRODOTTO (
     CodProdotto int(11) not null AUTO_INCREMENT,
     Nome varchar(20) not null,
     Descrizione varchar(600) not null,
     Prezzo float not null,
     CodCategoria int(11) not null,
     constraint ID_PRODOTTO_ID primary key (CodProdotto));

create table CARRELLO (
     CodCarrello int(11) not null AUTO_INCREMENT,
     Nickname varchar(20) not null,
     constraint ID_CARRELLO_ID primary key (CodCarrello));

create table UTENTE (
     Nome varchar(20) not null,
     Cognome varchar(20) not null,
     Nickname varchar(20) not null,
     E_mail varchar(200) not null,
     Password varchar(256) not null,
     isVend bit not null,
     constraint ID_UTENTE_ID primary key (Nickname));

create table ORDINE (
     CodOrdine int(11) not null,
     CodCarrello int(11) not null,
     Stato varchar(20) not null,
     Data date not null,
     constraint ID_ORDINE_ID primary key (CodOrdine),
     constraint SID_ORDIN_CARRE_ID unique (CodCarrello));

create table CATEGORIA (
     CodCategoria int(11) not null AUTO_INCREMENT,
     Nome varchar(20) not null,
     constraint ID_CATEGORIA_ID primary key (CodCategoria));

create table NOTIFICA (
     CodNotifica int(11) not null AUTO_INCREMENT,
     Data datetime not null,
     Testo varchar(600) not null,
     Letto bit not null,
     Nickname varchar(20) not null,
     constraint ID_NOTIFICA_ID primary key (CodNotifica));

create table Incarrello (
     CodCarrello int(11) not null,
     CodProdotto int(11) not null,
     quantita int(11) not null,
     constraint ID_Incarrello_ID primary key (CodProdotto, CodCarrello));

create table SPEDIZIONE (
     CodSpedizione int(11) not null AUTO_INCREMENT,
     CodOrdine int(11) not null,
     StatoSpedizione varchar(20) not null,
     NomeCorriere varchar(50) not null,
     DataInvio date not null,
     DataArrivo date not null,
     constraint ID_SPEDIZIONE_ID primary key (CodSpedizione),
     constraint SID_SPEDI_ORDIN_ID unique (CodOrdine));

create table codici (
     Id int(11) not null AUTO_INCREMENT,
     codiceSconto varchar(20) not null,
     sconto int(20) not null,
     isActive bit not null,
     constraint ID_codici_ID primary key (Id));

-- Constraints Section
-- ___________________ 

alter table PRODOTTO add constraint REF_PRODO_CATEG_FK
     foreign key (CodCategoria)
     references CATEGORIA (CodCategoria);

alter table CARRELLO add constraint REF_CARRE_UTENT_FK
     foreign key (Nickname)
     references UTENTE (Nickname);

alter table ORDINE add constraint SID_ORDIN_CARRE_FK
     foreign key (CodCarrello)
     references CARRELLO (CodCarrello);

alter table NOTIFICA add constraint REF_NOTIF_UTENT_FK
     foreign key (Nickname)
     references UTENTE(Nickname);

alter table Incarrello add constraint REF_Incar_PRODO
     foreign key (CodProdotto)
     references PRODOTTO(CodProdotto);

alter table Incarrello add constraint REF_Incar_CARRE_FK
     foreign key (CodCarrello)
     references CARRELLO(CodCarrello);

alter table SPEDIZIONE add constraint SID_SPEDI_ORDIN_FK
     foreign key (CodOrdine)
     references ORDINE (CodOrdine);


-- Index Section
-- _____________ 

create unique index ID_PRODOTTO_IND
     on PRODOTTO (CodProdotto);

create index REF_PRODO_CATEG_IND
     on PRODOTTO (CodCategoria);

create unique index ID_CARRELLO_IND
     on CARRELLO (CodCarrello);

create index REF_CARRE_UTENT_IND
     on CARRELLO (Nickname);

create unique index ID_UTENTE_IND
     on UTENTE (Nickname);

create unique index ID_ORDINE_IND
     on ORDINE (CodOrdine);

create unique index SID_ORDIN_CARRE_IND
     on ORDINE (CodCarrello);

create unique index ID_CATEGORIA_IND
     on CATEGORIA (CodCategoria);

create unique index ID_NOTIFICA_IND
     on NOTIFICA (CodNotifica);

create index REF_NOTIF_UTENT_IND
     on NOTIFICA (Nickname);

create unique index ID_Incarrello_IND
     on Incarrello (CodProdotto, CodCarrello);

create index REF_Incar_CARRE_IND
     on Incarrello (CodCarrello);

create unique index ID_SPEDIZIONE_IND
     on SPEDIZIONE (CodSpedizione);

create unique index SID_SPEDI_ORDIN_IND
     on SPEDIZIONE (CodOrdine);

create unique index ID_codici_IND
     on codici (Id);

rename TABLE CARRELLO to carrello;
rename TABLE NOTIFICA to notifica;
rename TABLE CATEGORIA to categoria;
rename TABLE ORDINE to ordine;
rename TABLE PRODOTTO to prodotto;
rename TABLE SPEDIZIONE to spedizione;
rename TABLE UTENTE to utente;
