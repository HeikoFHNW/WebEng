/*erstellen der Datenbank*/

CREATE DATABASE IF NOT EXISTS Hausverwaltung;
USE Hausverwaltung;

/*erstelllen der Tabellen*/

CREATE TABLE Adresse 
(ID_Adresse int(10) NOT NULL AUTO_INCREMENT, 
Strasse varchar(55), 
Hausnummer int(10), 
PLZ int(8) NOT NULL, 
PRIMARY KEY (ID_Adresse));

CREATE TABLE user 
(id_user int(10) NOT NULL AUTO_INCREMENT, 
firstname varchar(55), 
lastname varchar(55), 
username varchar(55), 
password varchar(55), 
email varchar(55), 
locked boolean, 
admin boolean,
PRIMARY KEY (id_user));

CREATE TABLE Liegenschaft 
(ID_Liegenschaft int(10) NOT NULL AUTO_INCREMENT, 
Adresse int(10) NOT NULL, 
Anzahl_Wohnungen int(3), 
PRIMARY KEY (ID_Liegenschaft));

CREATE TABLE Mieter 
(ID_Mieter int(15) NOT NULL AUTO_INCREMENT, 
Anrede varchar(25), 
Vorname varchar(55), 
Geburtsdatum date, 
Nachname varchar(55), 
Zivilstand varchar(30), 
Telefon int(10), 
Mobile int(10), 
Email varchar(50), 
Adresse int(10) NOT NULL, 
PRIMARY KEY (ID_Mieter));

CREATE TABLE Mietvertrag 
(ID_Mietvertrag int(10) NOT NULL AUTO_INCREMENT, 
Mietbeginn date, 
Mietende date, Nettomietzins decimal(10, 2), 
Kündigungsbestimmungen varchar(255), 
WohnungID int(10) NOT NULL, 
ID_Mieter int(15) NOT NULL, 
PRIMARY KEY (ID_Mietvertrag));

CREATE TABLE Mietzins 
(ID_Mietzins int(10) NOT NULL AUTO_INCREMENT, 
Betrag decimal(10, 2), 
Datum date, 
ID_Mietvertrag int(10) NOT NULL, 
Rechnungsnr int(10), 
PRIMARY KEY (ID_Mietzins));

CREATE TABLE Ort 
(ID_PLZ int(8) NOT NULL AUTO_INCREMENT, 
Land varchar(55), 
Ort varchar(55), 
PRIMARY KEY (ID_PLZ));

CREATE TABLE Rechnung 
(ID_Rechnung int(10) NOT NULL AUTO_INCREMENT, 
Betrag decimal(10, 2) NOT NULL, 
Datum date NOT NULL, 
ID_Mietvertrag int(10) NOT NULL, 
Rechnungstyp int(3), 
Rechnungsnr int(10) NOT NULL, 
Bemerkung varchar(255),
PRIMARY KEY (ID_Rechnung));

CREATE TABLE Rechnungstyp
(ID_Rech_Typ int(3) NOT NULL AUTO_INCREMENT,
Bezeichnung varchar(25),
PRIMARY KEY (ID_Rech_Typ));

CREATE TABLE Wohnung 
(ID_Wohnung int(10) NOT NULL AUTO_INCREMENT, 
Wohnungstyp varchar(50), 
Anzahl_Zimmer int(10), 
Anzahl_Quadratmeter int(10), 
Liegenschafts_ID int(10) NOT NULL, 
PRIMARY KEY (ID_Wohnung));

ALTER TABLE user
ADD CONSTRAINT UCUsername UNIQUE (username);

ALTER TABLE Liegenschaft 
ADD INDEX FKLiegenscha502068 (Adresse), 
ADD CONSTRAINT FKLiegenscha502068 FOREIGN KEY (Adresse) REFERENCES Adresse (ID_Adresse);

ALTER TABLE Mieter 
ADD INDEX FKMieter911551 (Adresse), 
ADD CONSTRAINT FKMieter911551 FOREIGN KEY (Adresse) REFERENCES Adresse (ID_Adresse);

ALTER TABLE Mietvertrag 
ADD INDEX FKMietvertra805092 (ID_Mieter), 
ADD CONSTRAINT FKMietvertra805092 FOREIGN KEY (ID_Mieter) REFERENCES Mieter (ID_Mieter);

ALTER TABLE Adresse 
ADD INDEX FKAdresse656401 (PLZ), 
ADD CONSTRAINT FKAdresse656401 FOREIGN KEY (PLZ) REFERENCES Ort (ID_PLZ),
ADD CONSTRAINT UCAdresse UNIQUE (Strasse, Hausnummer, PLZ);

ALTER TABLE Mietzins 
ADD INDEX FKMietzins337400 (ID_Mietvertrag), 
ADD CONSTRAINT FKMietzins337400 FOREIGN KEY (ID_Mietvertrag) REFERENCES Mietvertrag (ID_Mietvertrag);

ALTER TABLE Ort
ADD CONSTRAINT ucOrt UNIQUE (ID_PLZ, Land, Ort);

ALTER TABLE Rechnung 
ADD INDEX FKRechnung953470 (ID_Mietvertrag), 
ADD INDEX FKRechnungstyp (Rechnungstyp),
ADD CONSTRAINT FKRechnung953470 FOREIGN KEY (ID_Mietvertrag) REFERENCES Mietvertrag (ID_Mietvertrag),
ADD CONSTRAINT FKRechnungstyp FOREIGN KEY (Rechnungstyp) REFERENCES Rechnungstyp (ID_Rech_Typ);

ALTER TABLE Mietvertrag 
ADD INDEX FKMietvertra158055 (WohnungID), 
ADD CONSTRAINT FKMietvertra158055 FOREIGN KEY (WohnungID) REFERENCES Wohnung (ID_Wohnung);

ALTER TABLE Wohnung 
ADD INDEX FKWohnung224894 (Liegenschafts_ID), 
ADD CONSTRAINT FKWohnung224894 FOREIGN KEY (Liegenschafts_ID) REFERENCES Liegenschaft (ID_Liegenschaft);
