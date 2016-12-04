/*erstellen der Datenbank*/

CREATE DATABASE IF NOT EXISTS propertymanagement;
USE propertymanagement;

/*erstelllen der Tabellen*/

CREATE TABLE adress 
(id_adress int(10) NOT NULL AUTO_INCREMENT, 
street varchar(55), 
streetnumber int(10), 
postcode int(8) NOT NULL, 
PRIMARY KEY (id_adress));

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

CREATE TABLE property 
(id_property int(10) NOT NULL AUTO_INCREMENT, 
id_adress int(10) NOT NULL, 
apartments int(3), 
PRIMARY KEY (id_property));

CREATE TABLE tenant 
(id_tenant int(15) NOT NULL AUTO_INCREMENT, 
title varchar(25), 
firstname varchar(55), 
lastname varchar(55), 
birthday date, 
marital_status varchar(30), 
phone varchar(25), 
mobile varchar(25), 
email varchar(50), 
id_adress int(10) NOT NULL, 
PRIMARY KEY (id_tenant));

CREATE TABLE tenancy_agreement 
(id_tenancy_agreement int(10) NOT NULL AUTO_INCREMENT, 
start_of_tenancy date, 
end_of_tenancy date, 
netrent decimal(10, 2), 
cancellationterms varchar(255), 
id_apartment int(10) NOT NULL, 
id_tenant int(15) NOT NULL, 
PRIMARY KEY (id_tenancy_agreement));

CREATE TABLE city 
(postcode int(8) NOT NULL,  
city varchar(55), 
PRIMARY KEY (postcode));

CREATE TABLE invoice 
(id_invoice int(10) NOT NULL AUTO_INCREMENT, 
amount decimal(10, 2) NOT NULL, 
invoice_date date NOT NULL, 
id_tenancy_agreement int(10) NOT NULL, 
id_invoice_type int(3), 
invoicenr int(10) NOT NULL, 
comment varchar(255),
PRIMARY KEY (id_invoice));

CREATE TABLE invoice_type
(id_invoice_type int(3) NOT NULL AUTO_INCREMENT,
label varchar(25),
PRIMARY KEY (id_invoice_type));

CREATE TABLE apartment 
(id_apartment int(10) NOT NULL AUTO_INCREMENT, 
apartment_type varchar(50), 
rooms int(10), 
squaremeter int(10), 
id_property int(10) NOT NULL, 
PRIMARY KEY (id_apartment));

ALTER TABLE user
ADD CONSTRAINT UCUsername UNIQUE (username);

ALTER TABLE property 
ADD INDEX FKLiegenscha502068 (id_adress), 
ADD CONSTRAINT FKLiegenscha502068 FOREIGN KEY (id_adress) REFERENCES adress (id_adress);

ALTER TABLE tenant 
ADD INDEX FKMieter911551 (id_adress), 
ADD CONSTRAINT FKMieter911551 FOREIGN KEY (id_adress) REFERENCES adress (id_adress);

ALTER TABLE tenancy_agreement 
ADD INDEX FKMietvertra805092 (id_tenant), 
ADD CONSTRAINT FKMietvertra805092 FOREIGN KEY (id_tenant) REFERENCES tenant (id_tenant);

ALTER TABLE adress 
ADD INDEX FKAdresse656401 (postcode), 
ADD CONSTRAINT FKAdresse656401 FOREIGN KEY (postcode) REFERENCES city (postcode),
ADD CONSTRAINT UCAdresse UNIQUE (street, streetnumber, postcode);

ALTER TABLE city
ADD CONSTRAINT ucOrt UNIQUE (postcode, city);

ALTER TABLE invoice 
ADD INDEX FKRechnung953470 (id_tenancy_agreement), 
ADD INDEX FKRechnungstyp (id_invoice_type),
ADD CONSTRAINT FKRechnung953470 FOREIGN KEY (id_tenancy_agreement) REFERENCES tenancy_agreement (id_tenancy_agreement),
ADD CONSTRAINT FKRechnungstyp FOREIGN KEY (id_invoice_type) REFERENCES invoice_type (id_invoice_type);

ALTER TABLE tenancy_agreement 
ADD INDEX FKMietvertra158055 (id_apartment), 
ADD CONSTRAINT FKMietvertra158055 FOREIGN KEY (id_apartment) REFERENCES apartment (id_apartment);

ALTER TABLE apartment 
ADD INDEX FKWohnung224894 (id_property), 
ADD CONSTRAINT FKWohnung224894 FOREIGN KEY (id_property) REFERENCES property (id_property);
