<?php

include_once "../dao/AbstractDAO.php";
include "../dao/invoiceDAO/InvoiceDAOInterface.php";

class InvoiceDAOImpl extends AbstractDAO implements InvoiceDAOInterface
{
    /**
     * @param invoice $invoice
     * @return Customer
     */
    public function createInvoice(Invoice $invoice)
    {
        if (!is_null($invoice->getId_invoice())) {
            return $this->updateInvoice($invoice);
        }
        
        $stmt = $this->pdoInstance->prepare('

            INSERT INTO invoice (amount, invoice_date, id_tenancy_agreement, invoice_type, invoicenr, comment)
            VALUES (:amount, :invoice_date, 
            (SELECT id_tenancy_agreement FROM tenancy_agreement WHERE id_tenancy_agreement = :id_tenancy_agreement),
            :invoice_type, :invoicenr, :comment);');
        
        $stmt->bindValue(':amount', $invoice->getAmount());
        $stmt->bindValue(':invoice_date', $invoice->getInvoice_date());
        $stmt->bindValue(':id_tenancy_agreement', $invoice->getId_tenancy_agreement());
        $stmt->bindValue(':', $invoice->get());
        $stmt->bindValue(':', $invoice->get());
        $stmt->bindValue(':', $invoice->get());
        $stmt->bindValue(':', $invoice->get());
        $stmt->bindValue(':', $invoice->get());
        $stmt->execute();
        unset($stmt);
        $invoice = $this->readInvoice($this->pdoInstance->lastInsertId());
        return $invoice;
    }

    /**
     * @param Customer $customer
     * @return Customer
     */
    public function updateInvoice(Invoice $invoice)
    {
        if (is_null($invoice->getId_invoice())) {
            throw new LogicException(
                'Cannot update invoice that does not yet exist in the database.'
            );
        }
        $stmt = $this->pdoInstance->prepare('
            INSERT IGNORE INTO city (postcode, city)
            VALUES (:postcode, :city);
            
            INSERT IGNORE INTO adress (street, streetnumber, postcode)
            VALUES (:street, :streetnumber, :postcode);

            UPDATE invoicemanagement.invoice
            SET
            id_adress = (SELECT id_adress FROM adress WHERE street = :street AND streetnumber = :streetnumber AND postcode = :postcode)
            WHERE id_invoice = :id_invoice;
        ');
        $stmt->bindValue(':street', $invoice->getStreet());
        $stmt->bindValue(':streetnumber', $invoice->getStreetnumber());
        $stmt->bindValue(':postcode', $invoice->getPostcode());
        $stmt->bindValue(':city', $invoice->getCity());
        $stmt->bindValue(':id_invoice', $invoice->getId_invoice());
        $stmt->execute();
        unset($stmt);
        return $invoice;
    }


    /**
     * @param $id
     * @return Customer
     */
    public function readInvoice($id_invoice)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT C.id_invoice, B.postcode, B.city, A.id_adress, A.street, A.streetnumber  
                FROM adress = A, city = B, invoice = C
                WHERE A.postcode = B.postcode 
                AND A.id_adress = C.id_adress
                AND C.id_invoice = :id_invoice;
        ');
        $stmt->bindValue(':id_invoice', $id_invoice);
        $stmt->execute();
        return $stmt->fetchObject("Invoice");
    }

    /**
     * @param Customer $customer
     */
    public function deleteInvoice(Invoice $invoice)
    {
        $stmt = $this->pdoInstance->prepare('
            DELETE FROM invoice
            WHERE id_invoice = :id
        ');
        $stmt->bindValue(':id', $invoice->getId_invoice());
        $stmt->execute();
        $invoice = null;
    }


    /**
     * @return Invoice[]
     */
    public function findAll()
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT C.id_invoice, B.postcode, B.city, A.id_adress, A.street, A.streetnumber 
                FROM adress = A, city = B, invoice = C
                WHERE A.postcode = B.postcode 
                AND A.id_adress = C.id_adress
        ');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Invoice');
    }

}