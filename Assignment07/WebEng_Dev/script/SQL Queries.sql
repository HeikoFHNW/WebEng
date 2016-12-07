/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  Alexander
 * Created: 06.12.2016
 */
SELECT invoice.amount, invoice.invoice_date, invoice.invoice_type, tenant.firstname, tenant.lastname, adress.street, adress.streetnumber, adress.postcode, city.city 
FROM invoice 
JOIN tenancy_agreement 
    ON invoice.id_tenancy_agreement=tenancy_agreement.id_tenancy_agreement 
JOIN apartment 
    ON tenancy_agreement.id_apartment=apartment.id_apartment 
JOIN property 
    ON apartment.id_property=property.id_property 
JOIN adress 
    ON property.id_adress=adress.id_adress 
JOIN city 
    ON adress.postcode=city.postcode 
JOIN tenant 
    ON tenancy_agreement.id_tenant=tenant.id_tenant



SELECT invoice.id_invoice, invoice.amount, invoice.invoice_date, invoice.id_tenancy_agreement, invoice.invoice_type, invoice.invoicenr, invoice.comment, 
	apartment.id_apartment, 
        property.id_property, 
        adress.street, adress.streetnumber, adress.postcode, 
        city.city, 
        tenant.firstname, tenant.lastname 
FROM invoice 
JOIN tenancy_agreement 
    ON invoice.id_tenancy_agreement=tenancy_agreement.id_tenancy_agreement 
JOIN apartment 
    ON tenancy_agreement.id_apartment=apartment.id_apartment 
JOIN property 
    ON apartment.id_property=property.id_property 
JOIN adress 
    ON property.id_adress=adress.id_adress 
JOIN city 
    ON adress.postcode=city.postcode 
JOIN tenant 
    ON tenancy_agreement.id_tenant=tenant.id_tenant
