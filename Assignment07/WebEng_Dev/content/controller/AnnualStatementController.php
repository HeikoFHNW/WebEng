<?php

include_once '../dao/Database.php';
include_once '../dao/annualStatementDAO/AnnualStatementDAOImpl.php';


class AnnualStatementController
{
            public function create()
    {
        require_once('../view/viewAnnualStatement/createAnnualStatement.php');
    }
    
    public function home()
    {
        
        require_once('../view/viewAnnualStatement/homeAnnualStatement.php');
    }
    
    public function show()
    {
        
        if (!empty($_POST)) {
            $date_begin = $_POST['date_begin'];
            $date_end = $_POST['date_end'];
        
        
            $payed='1';
            $payedNeg='0';

            $totalAmountPayed = (new AnnualStatementDAOImpl(Database::connect()))->findTotal($payed, $date_begin, $date_end);
            $totalAmountPayedNeg = (new AnnualStatementDAOImpl(Database::connect()))->findTotal($payedNeg, $date_begin, $date_end);
            $totalSuccess = $totalAmountPayed->getTotalAmount() - $totalAmountPayedNeg->getTotalAmount();

            $invoiceTypes = (new AnnualStatementDAOImpl(Database::connect()))->findAll($payed, $date_begin, $date_end);
            foreach ($invoiceTypes as $invoiceType) {
                $reportPropertys = (new AnnualStatementDAOImpl(Database::connect()))->findAllReportPropertys($payed, $invoiceType->getInvoice_type(), $date_begin, $date_end);

                $invoiceType->setReportPropertys($reportPropertys);
            }

            $invoiceNegTypes = (new AnnualStatementDAOImpl(Database::connect()))->findAll($payedNeg, $date_begin, $date_end);
            foreach ($invoiceNegTypes as $invoiceNegType) {
                $reportNegPropertys = (new AnnualStatementDAOImpl(Database::connect()))->findAllReportPropertys($payedNeg, $invoiceNegType->getInvoice_type(), $date_begin, $date_end);

                $invoiceNegType->setReportPropertys($reportNegPropertys);
            }
        }
        
        require_once('../view/viewAnnualStatement/showAnnualStatement.php');
    }
}