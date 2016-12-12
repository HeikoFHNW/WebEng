USE propertymanagement;

INSERT INTO `user`(`firstname`, `lastname`, `username`, `password`, `email`, `locked`, `admin`) 
    VALUES ('Alexander', 'Noever', 'Alex', '12345678', 'alex@gmail.com', '0', '1'),
            ('Simon', 'Zahnd', 'Simon', '12345678', 'simon@gmail.com', '0', '1'),
            ('Heiko', 'Meier', 'Heiko', '12345678', 'heiko@gmail.com', '0', '1');

INSERT INTO `city`(`postcode`, `city`) 
    VALUES ('8834','Schindellegi'),
            ('5004','Aarau'),
            ('6000','Luzern'),
            ('6045','Meggen'),
            ('4600','Olten');

INSERT IGNORE INTO adress (street, streetnumber, postcode)
    VALUES ('Chaltenbodenstrasse', '6', '8834'),
            ('Neumattstrasse', '4', '5004'),
            ('Pilatusstrasse', '16', '6000'),
            ('Obermattstrasse', '2', '6045'),
            ('Von Rollstrasse', '10', '4600')

            
INSERT INTO tenant (title, firstname, lastname, birthday, marital_status, phone, mobile, email, id_adress)
    VALUES ('Herr', 'Clint', 'Eastwood', '1930-05-31', 'ledig', '058 854 96 21', '078 854 96 21', 'clint@gmail.com', (SELECT id_adress FROM adress WHERE street = 'Chaltenbodenstrasse' AND streetnumber = '6' AND postcode = '8834')),
            ('Herr', 'Thomas', 'Hanne', '1964-07-12', 'verheiratet', '058 246 75 95', '079 246 75 95', 'thomas@gmail.com', (SELECT id_adress FROM adress WHERE street = 'Neumattstrasse' AND streetnumber = '4' AND postcode = '5004')),
            ('Herr', 'Janosch', 'Nietlispach', '1988-02-28', 'ledig', '058 465 55 86', '079 465 55 86', 'janosch@gmail.com', (SELECT id_adress FROM adress WHERE street = 'Pilatusstrasse' AND streetnumber = '16' AND postcode = '6000')),
            ('Herr', 'Rainer', 'Telesko', '1968-09-23', 'verheiratet', '058 788 98 56', '078 788 98 56', 'rainer@gmail.com', (SELECT id_adress FROM adress WHERE street = 'Von Rollstrasse' AND streetnumber = '10' AND postcode = '4600')),
            ('Herr', 'Hakan', 'Yakin', '1977-02-22', 'verheiratet', '062 122 35 66', '079 122 35 66', 'hakan@gmail.com', (SELECT id_adress FROM adress WHERE street = 'Obermattstrasse' AND streetnumber = '2' AND postcode = '6045'));

INSERT INTO property (id_adress)
    VALUES ((SELECT id_adress FROM adress WHERE street = 'Chaltenbodenstrasse' AND streetnumber = '6' AND postcode = '8834')),
            ((SELECT id_adress FROM adress WHERE street = 'Pilatusstrasse' AND streetnumber = '16' AND postcode = '6000'));

INSERT INTO apartment (id_property, apartment_type, rooms, squaremeter)
    VALUES ((SELECT id_property FROM property WHERE id_property = 1), 'Attika', '6.5', '320'),
            ((SELECT id_property FROM property WHERE id_property = 1), 'Loft', '3.5', '600'),
            ((SELECT id_property FROM property WHERE id_property = 2), '3.OG', '4.5', '200'),
            ((SELECT id_property FROM property WHERE id_property = 2), '4.OG', '4.5', '200'),
            ((SELECT id_property FROM property WHERE id_property = 2), '5.OG', '5.5', '220');

INSERT INTO tenancy_agreement (id_tenant, id_apartment, start_of_tenancy, end_of_tenancy, netrent, cancellationterms)
            VALUES ((SELECT id_tenant FROM tenant WHERE id_tenant = '1'), 
                    (SELECT id_apartment FROM apartment WHERE id_apartment = '1'),
                    '2005-09-01', '2018-09-30', '8000', '3 Monate'),
                    ((SELECT id_tenant FROM tenant WHERE id_tenant = '2'), 
                    (SELECT id_apartment FROM apartment WHERE id_apartment = '2'),
                    '2010-05-01', '2099-12-31', '10000', '3 Monate'),
                    ((SELECT id_tenant FROM tenant WHERE id_tenant = '3'), 
                    (SELECT id_apartment FROM apartment WHERE id_apartment = '3'),
                    '2008-03-01', '2099-12-31', '2250', '3 Monate'),
                    ((SELECT id_tenant FROM tenant WHERE id_tenant = '4'), 
                    (SELECT id_apartment FROM apartment WHERE id_apartment = '4'),
                    '2006-09-01', '2018-01-31', '2350', '3 Monate'),
                    ((SELECT id_tenant FROM tenant WHERE id_tenant = '5'), 
                    (SELECT id_apartment FROM apartment WHERE id_apartment = '5'),
                    '2000-09-01', '2020-06-30', '2800', '3 Monate');


INSERT INTO invoice (amount, invoice_date, id_tenancy_agreement, invoice_type, invoicenr, `comment`, payed)
    VALUES ('8000', '2016-11-30', '1', 'Miete', '16113001', 'Monatsmiete Dezember', '1'),
            ('10000', '2016-11-30', '2', 'Miete', '16113002', 'Monatsmiete Dezember', '1'),
            ('8000', '2016-11-30', '3','Miete', '16113003', 'Monatsmiete Dezember', '1'),
            ('2250', '2016-11-30', '4', 'Miete', '16113004', 'Monatsmiete Dezember', '1'),
            ('2350', '2016-11-30', '5', 'Miete', '16113005', 'Monatsmiete Dezember', '1'),
            ('8000', '2016-12-01', '3', 'Reparatur', '16120101', 'Fenster auswechseln', '0'),
            ('8000', '2016-10-30', '1', 'Miete', '16103001', 'Monatsmiete November', '1'),
            ('10000', '2016-10-30', '2', 'Miete', '16103002', 'Monatsmiete November', '1'),
            ('8000', '2016-10-30', '3','Miete', '16103003', 'Monatsmiete November', '1'),
            ('2250', '2016-10-30', '4', 'Miete', '16103004', 'Monatsmiete November', '1'),
            ('2350', '2016-10-30', '5', 'Miete', '16103005', 'Monatsmiete November', '1'),
            ('8000', '2016-09-30', '1', 'Miete', '16093001', 'Monatsmiete Oktober', '1'),
            ('10000', '2016-09-30', '2', 'Miete', '16093002', 'Monatsmiete Oktober', '1'),
            ('8000', '2016-09-30', '3','Miete', '16093003', 'Monatsmiete Oktober', '1'),
            ('2250', '2016-09-30', '4', 'Miete', '16093004', 'Monatsmiete Oktober', '1'),
            ('2350', '2016-09-30', '5', 'Miete', '16093005', 'Monatsmiete Oktober', '1');


invoice.invoice_date BETWEEN CAST('2000-01-01' AS DATE) AND CAST('2016-12-12' AS DATE)