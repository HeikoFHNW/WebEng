<?php
include("../../fpdf/fpdf.php");
include_once '../dao/Database.php';
include_once '../dao/AnnualStatementDAO/AuxiliaryCostDAOImpl.php';

// Begin configuration

$textColour = array( 0, 0, 0 );
$headerColour = array( 100, 100, 100 );
$tableHeaderTopTextColour = array( 255, 255, 255 );
$tableHeaderTopFillColour = array( 125, 152, 179 );
$tableHeaderTopProductTextColour = array( 0, 0, 0 );
$tableHeaderTopProductFillColour = array( 143, 173, 204 );
$tableHeaderLeftTextColour = array( 99, 42, 57 );
$tableHeaderLeftFillColour = array( 184, 207, 229 );
$tableBorderColour = array( 50, 50, 50 );
$tableRowFillColour = array( 213, 170, 170 );
$reportName = ("Nebenkostenabrechnung");
$columnLabels = array( "MieterID", "Vorname", "Nachname", "Bereich", "Bezahlt", "Offen" , "Total" );


$chartColours = array(
                  array( 255, 100, 100 ),
                  array( 100, 255, 100 ),
                  array( 100, 100, 255 ),
                  array( 255, 255, 100 ),
                );


// End configuration

// Data receive

            $date_begin = "2016-01-01";
            $date_end = "2016-12-31";
            
            $invoiceTypes = array("Miete", "Reparatur", "Oel" , "Wasser", "Strom", "Hauswart", "Diverses");


            $auxTenants = (new AuxiliaryCostDAOImpl(Database::connect()))->findAll($date_begin, $date_end);
            foreach ($auxTenants as $auxTenant) {
                $auxInvoiceTypes = array();
                foreach ($invoiceTypes as $invoiceTypeString) {
                    $invoiceType = (new AuxiliaryCostDAOImpl(Database::connect()))->findAuxInvoiceType($auxTenant->getId_tenant(), $invoiceTypeString, $date_begin, $date_end);
                    if(!empty($invoiceType)){
                    array_push($auxInvoiceTypes, $invoiceType);
                    }
                }
                $auxTenant->setAuxInvoiceTypes($auxInvoiceTypes);
            } 

/**
  Create the title page
**/

$pdf = new FPDF( 'P', 'mm', 'A4' );
$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );

// Report Name
$pdf->AddPage();
$pdf->SetTextColor( $headerColour[0], $headerColour[1], $headerColour[2] );
$pdf->SetFont( 'Arial', '', 17 );
$pdf->Cell( 0, 15, $reportName, 0, 0, 'C' );
$pdf->Ln(15);

/**
 * Create Datatable 1
 */

$pdf->SetDrawColor( $tableBorderColour[0], $tableBorderColour[1], $tableBorderColour[2] );
$pdf->Ln( 15 );

// Create the table header row
$pdf->SetFont( 'Arial', 'B', 12 );

$pdf->SetTextColor( $tableHeaderTopTextColour[0], $tableHeaderTopTextColour[1], $tableHeaderTopTextColour[2] );
    $pdf->SetFillColor( $tableHeaderTopFillColour[0], $tableHeaderTopFillColour[1], $tableHeaderTopFillColour[2] );

      $pdf->Cell( 22, 10, $columnLabels[0], 1, 0, 'C', true );
      $pdf->Cell( 35, 10, $columnLabels[1], 1, 0, 'C', true );
      $pdf->Cell( 35, 10, $columnLabels[2], 1, 0, 'C', true );
      $pdf->Cell( 25, 10, $columnLabels[3], 1, 0, 'C', true );
      $pdf->Cell( 23, 10, $columnLabels[4], 1, 0, 'C', true );
      $pdf->Cell( 23, 10, $columnLabels[5], 1, 0, 'C', true );
      $pdf->Cell( 23, 10, $columnLabels[6], 1, 0, 'C', true );

    $pdf->Ln();


// Create the table data rows

$fill = false;
$row = 0;

foreach ( $auxTenants as $auxTenant ) {

    // Remaining header cells
    if( $pdf->GetY() >= 190){
        $pdf->AddPage();
        
        // Create the table header row
        $pdf->SetFont( 'Arial', 'B', 12 );

        $pdf->SetTextColor( $tableHeaderTopTextColour[0], $tableHeaderTopTextColour[1], $tableHeaderTopTextColour[2] );
            $pdf->SetFillColor( $tableHeaderTopFillColour[0], $tableHeaderTopFillColour[1], $tableHeaderTopFillColour[2] );

              $pdf->Cell( 22, 10, $columnLabels[0], 1, 0, 'C', true );
              $pdf->Cell( 35, 10, $columnLabels[1], 1, 0, 'C', true );
              $pdf->Cell( 35, 10, $columnLabels[2], 1, 0, 'C', true );
              $pdf->Cell( 25, 10, $columnLabels[3], 1, 0, 'C', true );
              $pdf->Cell( 23, 10, $columnLabels[4], 1, 0, 'C', true );
              $pdf->Cell( 23, 10, $columnLabels[5], 1, 0, 'C', true );
              $pdf->Cell( 23, 10, $columnLabels[6], 1, 0, 'C', true );

            $pdf->Ln();
    }
    // Create the data cells
    $pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
    $pdf->SetFillColor( $tableRowFillColour[0], $tableRowFillColour[1], $tableRowFillColour[2] );
    $pdf->SetFont( 'Arial', '', 10 );

    $pdf->Cell(22, 10, ($auxTenant->getId_Tenant()), 'LT', 0, 'C', $fill);
    $pdf->Cell(35, 10, ($auxTenant->getFirstname()), 'T', 0, 'C', $fill);
    $pdf->Cell(35, 10, ($auxTenant->getLastname()), 'T', 0, 'C', $fill);
    $pdf->Cell(25, 10, (""), 'T', 0, 'C', $fill);
    $pdf->Cell(23, 10, (""), 'T', 0, 'C', $fill);
    $pdf->Cell(23, 10, (""), 'T', 0, 'C', $fill);
    $pdf->Cell(23, 10, (""), 'RT', 0, 'C', $fill);
    $pdf->Ln();
    foreach ($auxTenant->getAuxInvoiceTypes() as $auxInvoiceType) {
        $pdf->Cell(22, 10, (""), 'L', 0, 'C', $fill);
        $pdf->Cell(35, 10, (""), 0, 0, 'C', $fill);
        $pdf->Cell(35, 10, (""), 0, 0, 'C', $fill);
        $pdf->Cell(25, 10, ($auxInvoiceType->getInvoice_type()), 0, 0, 'C', $fill);
        $pdf->Cell(23, 10, ($auxInvoiceType->getAmount_payed()), 0, 0, 'C', $fill);
        $pdf->Cell(23, 10, ($auxInvoiceType->getAmount_open()), 0, 0, 'R', $fill);
        $pdf->Cell(23, 10, (""), 'R', 0, 'C', $fill);
        $pdf->Ln();
    }
    $pdf->Cell(22, 10, (""), 'LB', 0, 'C', $fill);
    $pdf->Cell(35, 10, (""), 'B', 0, 'C', $fill);
    $pdf->Cell(35, 10, (""), 'B', 0, 'C', $fill);
    $pdf->Cell(25, 10, (""), 'B', 0, 'C', $fill);
    $pdf->Cell(23, 10, (""), 'B', 0, 'C', $fill);
    $pdf->Cell(23, 10, (""), 'B', 0, 'C', $fill);
    $pdf->SetFont( 'Arial', 'B', 10 );
    $pdf->Cell(23, 10, ($auxTenant->getTotalAmount()), 'RB', 0, 'R', $fill);
    $pdf->Ln();

  $fill = !$fill;
  
}
  

/***
  Serve the PDF
***/

$pdf->Output( "report.pdf", "I" );
?>