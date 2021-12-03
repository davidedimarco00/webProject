-- *********************************************
-- * Standard SQL generation                   
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.1              
-- * Generator date: Dec  4 2018              
-- * Generation date: Mon Nov 29 22:39:09 2021 
-- * LUN file: C:\Users\david\OneDrive\Desktop\PROGETTO WEB\webProject\database\webProject.lun 
-- * Schema: E-COMMERCELOGIC2/SQL 
-- ********************************************* 


-- Database Section
-- ________________ 

create database E-COMMERCELOGIC2;


-- DBSpace Section
-- _______________


-- Tables Section
-- _____________ 

create table ORDINE (
     Stato char(1) not null,
     prezzoTotale char(1) not null,
     codOrdine char(1) not null,
     Data char(1) not null,
     numProdotti char(1) not null,
     NickVend char(1) not null,
     NickCliente char(1) not null,
     codSpedizione char(1) not null,
     constraint ID_ORDINE_ID primary key (codOrdine));

create table PRODOTTO (
     peso char(1) not null,
     tipo char(1) not null,
     costo char(1) not null,
     codProdotto char(1) not null,
     Prezzo char(1) not null,
     constraint ID_PRODOTTO_ID primary key (codProdotto));

create table SPEDIZIONE (
     codSpedizione char(1) not null,
     nomeCorriere char(1) not null,
     indirizzoDest char(1) not null,
     constraint ID_SPEDIZIONE_ID primary key (codSpedizione));

create table VENDITORE (
     NickVend char(1) not null,
     password char(1) not null,
     email char(1) not null,
     Nome char(1) not null,
     Cognome char(1) not null,
     data_di_nascita char(1) not null,
     constraint ID_VENDITORE_ID primary key (NickVend));

create table CLIENTE (
     civico char(1) not null,
     metPagamento char(1) not null,
     NickCliente char(1) not null,
     password char(1) not null,
     email char(1) not null,
     Nome char(1) not null,
     Cognome char(1) not null,
     data_di_nascita char(1) not null,
     constraint ID_CLIENTE_ID primary key (NickCliente));

create table codProdotto (
     codOrdine char(1) not null,
     codProdotto char(1) not null,
     constraint ID_codProdotto_ID primary key (codOrdine, codProdotto));

create table codProdotto_1 (
     codProdotto char(1) not null,
     NickVend char(1) not null,
     constraint ID_codPr_PRODO_ID primary key (codProdotto));


-- Constraints Section
-- ___________________ 

alter table ORDINE add constraint ID_ORDINE_CHK
     check(exists(select * from codProdotto
                  where codProdotto.codOrdine = codOrdine)); 

alter table ORDINE add constraint REF_ORDIN_VENDI_FK
     foreign key (NickVend)
     references VENDITORE;

alter table ORDINE add constraint REF_ORDIN_CLIEN_FK
     foreign key (NickCliente)
     references CLIENTE;

alter table ORDINE add constraint REF_ORDIN_SPEDI_FK
     foreign key (codSpedizione)
     references SPEDIZIONE;

alter table PRODOTTO add constraint ID_PRODOTTO_CHK
     check(exists(select * from codProdotto_1
                  where codProdotto_1.codProdotto = codProdotto)); 

alter table codProdotto add constraint REF_codPr_PRODO_FK
     foreign key (codProdotto)
     references PRODOTTO;

alter table codProdotto add constraint FKORD_cod
     foreign key (codOrdine)
     references ORDINE;

alter table codProdotto_1 add constraint ID_codPr_PRODO_FK
     foreign key (codProdotto)
     references PRODOTTO;

alter table codProdotto_1 add constraint FKVEN_cod_FK
     foreign key (NickVend)
     references VENDITORE;


-- Index Section
-- _____________ 

create unique index ID_ORDINE_IND
     on ORDINE (codOrdine);

create index REF_ORDIN_VENDI_IND
     on ORDINE (NickVend);

create index REF_ORDIN_CLIEN_IND
     on ORDINE (NickCliente);

create index REF_ORDIN_SPEDI_IND
     on ORDINE (codSpedizione);

create unique index ID_PRODOTTO_IND
     on PRODOTTO (codProdotto);

create unique index ID_SPEDIZIONE_IND
     on SPEDIZIONE (codSpedizione);

create unique index ID_VENDITORE_IND
     on VENDITORE (NickVend);

create unique index ID_CLIENTE_IND
     on CLIENTE (NickCliente);

create unique index ID_codProdotto_IND
     on codProdotto (codOrdine, codProdotto);

create index REF_codPr_PRODO_IND
     on codProdotto (codProdotto);

create unique index ID_codPr_PRODO_IND
     on codProdotto_1 (codProdotto);

create index FKVEN_cod_IND
     on codProdotto_1 (NickVend);

