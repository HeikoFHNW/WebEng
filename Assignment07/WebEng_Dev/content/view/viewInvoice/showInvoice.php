<div class="container">
    <div class="row">
        <h3>Invoice Overview</h3>
    </div>
    <div class="row">
        <p>
            <a href="?controller=Invoice&action=create" class="btn btn-success">Create</a>
        </p>
        <p>
            <a href="?controller=Auxiliary_Cost&action=create" class="btn btn-success">Create Auxiliary Cost Invoice</a>
        </p>
        <table data-toggle="table" data-sort-name="invoice_date" data-sort-order="desc">
            <thead>
            <tr>
                <th data-field="id_invoice" data-sortable="true">ID</th>
                <th data-field="amount" data-sortable="true">Betrag</th>
                <th data-field="invoice_date" data-sortable="true">Rechnungsdatum</th>
                <th data-field="firstname" data-sortable="true">Mieter Vorname</th>
                <th data-field="lastname" data-sortable="true">Mieter Nachname</th>
                <th data-field="city" data-sortable="true">Mietobjekt Ort</th>
                <th data-field="invoice_type" data-sortable="true">Rechungsart</th>
                <th data-field="invoicenr" data-sortable="true">Rechnungsnr.</th>
                <th data-field="action" data-sortable="false">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($invoices as $invoice) {
                echo '<tr>';
                echo '<td>' . $invoice->getId_invoice() . '</td>';
                echo '<td>' . $invoice->getAmount() . '</td>';
                echo '<td>' . $invoice->getInvoice_date() . '</td>';
                echo '<td>' . $invoice->getFirstname() . '</td>';
                echo '<td>' . $invoice->getLastname() . '</td>';
                echo '<td>' . $invoice->getCity() . '</td>';
                echo '<td>' . $invoice->getInvoice_type() . '</td>';
                echo '<td>' . $invoice->getInvoicenr() . '</td>';
                echo '<td width=250>';
                echo '<a class="btn" href="?controller=Invoice&action=read&id_invoice=' . $invoice->getId_invoice() . '"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span></a>';
                echo '&nbsp;';
                echo '<a class="btn btn-success" href="?controller=Invoice&action=update&id_invoice=' . $invoice->getId_invoice() . '"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
                echo '&nbsp;';
                echo '<a class="btn btn-danger" href="?controller=Invoice&action=deleteAsk&id_invoice=' . $invoice->getId_invoice() . '"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>