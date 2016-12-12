<div class="control-group <?php echo !empty($invoiceValidator->getAmountError()) ? 'error' : ''; ?>">
    <label class="control-label">Betrag:</label>
    <div class="controls">
        <input name="amount" type="text" id="fI_amount" placeholder="CHF" 
               value="<?php echo !empty($invoice->getAmount()) ? $invoice->getAmount() : ''; ?>">
               <?php if (!empty($invoiceValidator->getAmountError())): ?>
               <span class="help-inline"><?php echo $invoiceValidator->getAmountError(); ?></span>
               <?php endif; ?>
        <span id="amountMessage"></span>
    </div>
</div>
<div class="control-group <?php echo !empty($invoiceValidator->getInvoice_dateError()) ? 'error' : ''; ?>">
    <label class="control-label">Rechnungsdatum</label>
    <div class="controls">
        <input name="invoice_date" type="text" id="datepicker" placeholder="DD/MM/YYYY" 
               value="<?php echo !empty($invoice->getInvoice_date()) ? $invoice->getInvoice_date() : ''; ?>">
               <?php if (!empty($invoiceValidator->getInvoice_dateError())): ?>
               <span class="help-inline"><?php echo $invoiceValidator->getInvoice_dateError(); ?></span>
               <?php endif;?>
        <span id="isNotaValidDate"></span>  
    </div>
</div>
<div class="control-group <?php echo !empty($invoiceValidator->getId_tenancy_agreementError()) ? 'error' : ''; ?>">
    <label class="control-label">Vertragsid:</label>
    <div class="controls">
        <input name="id_tenancy_agreement" type="text" id="fI_id_tenancy_agreement" placeholder="Nr." 
               value="<?php echo !empty($invoice->getId_tenancy_agreement()) ? $invoice->getId_tenancy_agreement() : ''; ?>">
               <?php if (!empty($invoiceValidator->getId_tenancy_agreementError())): ?>
               <span class="help-inline"><?php echo $invoiceValidator->getId_tenancy_agreementError(); ?></span>
               <?php endif; ?>
               <span id="id_tenancy_agreementMessage"></span>
    </div>
</div>
<div class="control-group <?php echo !empty($invoiceValidator->getInvoice_typeError()) ? 'error' : ''; ?>">
    <label class="control-label">Rechnungstyp:</label>
    <div class="controls">
        <select name="invoice_type" type="text" id="fI_invoice_type" placeholder="Miete/Reparatur/Nebenkosten"
               value="<?php echo !empty($invoice->getInvoice_type()) ? $invoice->getInvoice_type() : ''; ?>">
            <option>Miete</option>
            <option>Reparatur</option>
            <option>Oel</option>
            <option>Wasser</option>
            <option>Strom</option>
            <option>Hauswart</option>
            <option>Diverses</option>
               <?php if (!empty($invoiceValidator->getInvoice_typeError())): ?>
               <span class="help-inline"><?php echo $invoiceValidator->getInvoice_typeError(); ?></span>
               <?php endif; ?>
               <span id="invoice_typeMessage"></span>
        </select>
    </div>    
</div>
<div class="control-group <?php echo !empty($invoiceValidator->getInvoicenrError()) ? 'error' : ''; ?>">
    <label class="control-label">Rechnungsnr:</label>
    <div class="controls">
        <input name="invoicenr" type="text" id="fI_Invoicenr" placeholder="Nr." 
               value="<?php echo !empty($invoice->getInvoicenr()) ? $invoice->getInvoicenr() : ''; ?>">
               <?php if (!empty($invoiceValidator->getInvoicenrError())): ?>
               <span class="help-inline"><?php echo $invoiceValidator->getInvoicenrError(); ?></span>
               <?php endif; ?>
               <span id="invoicenrMessage"></span>
    </div>
</div>
<div class="control-group">
    <label class="control-label">Kommentar:</label>
    <div class="controls">
        <textarea rows = "5" name="comment" type="text" placeholder="Fliesstext">
            <?php echo !empty($invoice->getComment()) ? $invoice->getComment() : ''; ?>
        </textarea>
         <p id="requiredMessage"></p>
    </div>
</div>
