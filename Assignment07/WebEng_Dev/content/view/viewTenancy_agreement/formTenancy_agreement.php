
<div class="control-group <?php echo !empty($tenancy_agreementValidator->getBirthdayError()) ? 'error' : ''; ?>">
    <label class="control-label">Beginn:</label>
    <div class="controls">
        <input name="start_of_tenancy" type="text" id="datepicker" placeholder="DD/MM/YYYY" 
               value="<?php echo !empty($tenancy_agreement->getStart_of_tenancy()) ? $tenancy_agreement->getStart_of_tenancy() : ''; ?>">
               <?php if (!empty($tenancy_agreementValidator->getBirthdayError())): ?>
               <span class="help-inline"><?php echo $tenancy_agreementValidator->getBirthdayError(); ?></span>
               <?php endif;?>
        <span id="isNotaValidDate"></span>  
    </div>
</div>
<div class="control-group <?php echo !empty($tenancy_agreementValidator->getBirthdayError()) ? 'error' : ''; ?>">
    <label class="control-label">Ende:</label>
    <div class="controls">
        <input name="end_of_tenancy" type="text" id="datepicker2" placeholder="DD/MM/YYYY" 
               value="<?php echo !empty($tenancy_agreement->getEnd_of_tenancy()) ? $tenancy_agreement->getEnd_of_tenancy() : ''; ?>">
               <?php if (!empty($tenancy_agreementValidator->getBirthdayError())): ?>
               <span class="help-inline"><?php echo $tenancy_agreementValidator->getBirthdayError(); ?></span>
               <?php endif;?>
        <span id="isNotaValidDate"></span>  
    </div>
</div>
<div class="control-group <?php echo !empty($tenancy_agreementValidator->getPostcodeError()) ? 'error' : ''; ?>">
    <label class="control-label">Nettomiete:</label>
    <div class="controls">
        <input name="netrent" type="text" id="fM_plz" placeholder="CHF" 
               value="<?php echo !empty($tenancy_agreement->getNetrent()) ? $tenancy_agreement->getNetrent() : ''; ?>">
               <?php if (!empty($tenancy_agreementValidator->getPostcodeError())): ?>
               <span class="help-inline"><?php echo $tenancy_agreementValidator->getPostcodeError(); ?></span>
               <?php endif; ?>
        <span id="plzMessage"></span>
    </div>
</div>
<div class="control-group">
    <label class="control-label">Kündigungsbestimmungen:</label>
    <div class="controls">
        <textarea rows = "5" name="cancellationterms" type="text" placeholder="Fliesstext" 
                  value="<?php echo !empty($tenancy_agreement->getCancellationterms()) ? $tenancy_agreement->getCancellationterms() : ''; ?>"></textarea>
    </div>
</div>
<div class="control-group">
    <label class="control-label">Apartment:</label>
    <div class="controls">
        <input name="id_apartment" type="text" placeholder="Wohnungsnummer" 
               value="<?php echo !empty($tenancy_agreement->getId_apartment()) ? $tenancy_agreement->getId_apartment() : ''; ?>">
    </div>
</div>
<div class="control-group">
    <label class="control-label">Mieter:</label>
    <div class="controls">
        <input name="id_tenant" type="text" placeholder="Mieternummer" 
               value="<?php echo !empty($tenancy_agreement->getId_tenant()) ? $tenancy_agreement->getId_tenant() : ''; ?>">
    </div>
</div>

 

