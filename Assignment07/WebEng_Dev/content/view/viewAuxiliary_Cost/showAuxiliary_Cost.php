<?PHP

if(!isset($_SESSION['login_user']))
{
    Route::call('User', 'loginShow');
    exit;
}
?>
<div class="container">
    <div class="row">
        <h3>Nebenkostenabrechnung</h3>
    </div>
    <div class="row">
        <p>
            <a class="btn btn-success" href="../view/createAuxiliary_CostPDF.php" class="btn btn-success">Create PDF</a>
            <a class="btn btn" href="?controller=AnnualStatement&action=home" class="btn btn">Back</a>
        </p>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>MieterID</th>
                <th>Vorname</th>
                <th>Nachname</th>
                <th>Bereich</th>
                <th>Bezahlt</th>
                <th>Offen</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($auxTenants as $auxTenant) {
                echo '<tr>';
                echo '<td><strong>' . $auxTenant->getId_tenant() . '</strong></td>';
                echo '<td><strong>' . $auxTenant->getFirstname() . '</strong></td>';
                echo '<td><strong>' . $auxTenant->getLastname() . '</strong></td>';
                echo '</tr>';
                foreach ($auxTenant->getAuxInvoiceTypes() as $auxInvoiceType) {
                    echo '<tr>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td>' . $auxInvoiceType->getInvoice_type() . '</td>';
                    echo '<td>' . $auxInvoiceType->getAmount_payed() . '</td>';
                    echo '<td>' . $auxInvoiceType->getAmount_open() . '</td>';
                    echo '<td></td>';
                    echo '</tr>';
                } 
                echo '<tr>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td><strong>' . $auxTenant->getTotalAmount() . '</strong></td>';
                echo '</tr>';
                
            }
            ?>
            </tbody>
        </table>
    </div>
</div>