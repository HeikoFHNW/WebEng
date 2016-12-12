<?php

include_once '../dao/Database.php';
include_once '../dao/invoiceDAO/InvoiceDAOImpl.php';
include_once '../validator/InvoiceValidator.php';


class InvoiceController
{

    public function show()
    {
        if(!isset($_SESSION)) 
        $invoices = (new InvoiceDAOImpl(Database::connect()))->findAll();
        require_once('../view/viewInvoice/showInvoice.php');
    }

    public function create()
    {

        $invoice = new Invoice();
        $invoiceValidator = new InvoiceValidator();

        if (!empty($_POST)) {
            
            $invoice = new Invoice(null,$_POST['amount'],$_POST['invoice_date'],$_POST['id_tenancy_agreement'],$_POST['invoice_type'],$_POST['invoicenr'],$_POST['comment'],$_POST['payed']);
            $invoiceValidator = new InvoiceValidator($invoice);

            if ($invoiceValidator->isValid()) {
                $invoice = (new InvoiceDAOImpl(Database::connect()))->createInvoice($invoice);
                return Route::call('Invoice', 'show');
            }
        }
        require_once('../view/viewInvoice/createInvoice.php');
    }

    public function read()
    {
        if (!empty($_GET['id_invoice'])) {
            $id_invoice = $_REQUEST['id_invoice'];
        }else{
            $id_invoice = $_GET['id_invoice'];
        }
        if ($id_invoice==="")
            return Route::call('Error', 'error');

        $invoice = (new InvoiceDAOImpl(Database::connect()))->readInvoice($id_invoice);
        require_once('../view/viewInvoice/readInvoice.php');
    }

    public function update()
    {
        $invoice = new invoice();
        $invoiceValidator = new InvoiceValidator();

        $id_invoice = null;
        if (!empty($_GET['id_invoice'])) {
            $id_invoice = $_REQUEST['id_invoice'];
        }

        if (null == $id_invoice) {
            return Route::call('Invoice', 'show');
        }

        if (!empty($_POST)) {
            $invoice = new Invoice($id_invoice,$_POST['amount'],$_POST['invoice_date'],$_POST['id_tenancy_agreement'],$_POST['invoice_type'],$_POST['invoicenr'],$_POST['comment']);
            $invoiceValidator = new InvoiceValidator($invoice);

            if ($invoiceValidator->isValid()) {
                $invoice = (new InvoiceDAOImpl(Database::connect()))->updateInvoice($invoice);
                return Route::call('Invoice', 'show');
            }
        } else {
            $invoice = (new InvoiceDAOImpl(Database::connect()))->readInvoice($id_invoice);
        }
        require_once('../view/viewInvoice/updateInvoice.php');
    }

    public function deleteAsk()
    {
        if (!empty($_GET['id_invoice'])) {
            $id_invoice = $_REQUEST['id_invoice'];
        }else{
            $id_invoice = $_GET['id_invoice'];
        }
        if ($id_invoice==="")
            return Route::call('Error', 'error');

        $invoice = (new InvoiceDAOImpl(Database::connect()))->readInvoice($id_invoice);
        require_once('../view/viewInvoice/deleteInvoice.php');
    }

    public function delete()
    {
        if (!empty($_POST)) {
            // keep track post values
            $id_invoice = $_POST['id_invoice'];
            if ($id_invoice==="")
                return Route::call('Error', 'error');
            // delete data
            (new InvoiceDAOImpl(Database::connect()))->deleteInvoice(new Invoice($id_invoice));
        }else{
            return Route::call('Error', 'error');
        }
        return Route::call('Invoice', 'show');
    }
    
}