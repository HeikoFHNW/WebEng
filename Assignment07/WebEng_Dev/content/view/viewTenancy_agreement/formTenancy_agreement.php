
<div class="control-group <?php echo !empty($tenancy_agreementValidator->getStart_of_tenancyError()) ? 'error' : ''; ?>">
    <label class="control-label">Beginn*</label>
    <div class="controls">
        <input name="start_of_tenancy" type="text" id="datepicker" placeholder="yyyy-mm-dd" 
               value="<?php echo !empty($tenancy_agreement->getStart_of_tenancy()) ? $tenancy_agreement->getStart_of_tenancy() : ''; ?>">
               <?php if (!empty($tenancy_agreementValidator->getStart_of_tenancyError())): ?>
               <span class="help-inline"><?php echo $tenancy_agreementValidator->getStart_of_tenancyError(); ?></span>
               <?php endif;?>
        <span id="startDateMessage"></span>  
    </div>
</div>
<div class="control-group <?php echo !empty($tenancy_agreementValidator->getEnd_of_tenancyError()) ? 'error' : ''; ?>">
    <label class="control-label">Ende</label>
    <div class="controls">
        <input name="end_of_tenancy" type="text" id="datepicker2" placeholder="yyyy-mm-dd" 
               value="<?php echo !empty($tenancy_agreement->getEnd_of_tenancy()) ? $tenancy_agreement->getEnd_of_tenancy() : ''; ?>">
               <?php if (!empty($tenancy_agreementValidator->getEnd_of_tenancyError())): ?>
               <span class="help-inline"><?php echo $tenancy_agreementValidator->getEnd_of_tenancyError(); ?></span>
               <?php endif;?>
        <span id="endDateMessage"></span>  
    </div>
</div>
<div class="control-group <?php echo !empty($tenancy_agreementValidator->getNetrentError()) ? 'error' : ''; ?>">
    <label class="control-label">Nettomiete*</label>
    <div class="controls">
        <input name="netrent" type="number" id="fTA_netrent" placeholder="CHF" 
               value="<?php echo !empty($tenancy_agreement->getNetrent()) ? $tenancy_agreement->getNetrent() : ''; ?>">
               <?php if (!empty($tenancy_agreementValidator->getNetrentError())): ?>
               <span class="help-inline"><?php echo $tenancy_agreementValidator->getNetrentError(); ?></span>
               <?php endif; ?>
        <span id="netrentMessage"></span>
    </div>
</div>
<div class="control-group">
    <label class="control-label">Kündigungsbestimmungen</label>
    <div class="controls">
        <textarea rows = "5" name="cancellationterms" type="text" id="fTA_cancellationterms" placeholder="Fliesstext" 
                  value="<?php echo !empty($tenancy_agreement->getCancellationterms()) ? $tenancy_agreement->getCancellationterms() : ''; ?>"></textarea>
    </div>
</div>
<div class="control-group <?php echo !empty($tenancy_agreementValidator->getId_ApartmentError()) ? 'error' : ''; ?>">
    <label class="control-label">Apartment*</label>
    <div class="controls">
        <input name="id_apartment" type="number" id="fTA_id_apartment" placeholder="Wohnungsnummer" 
               value="<?php echo !empty($tenancy_agreement->getId_apartment()) ? $tenancy_agreement->getId_apartment() : ''; ?>">
               <?php if (!empty($tenancy_agreementValidator->getId_ApartmentError())): ?>
               <span class="help-inline"><?php echo $tenancy_agreementValidator->getId_ApartmentError(); ?></span>
               <?php endif; ?>
            <span id="id_apartmentMessage"></span>   
    </div>
</div>
<div class="control-group <?php echo !empty($tenancy_agreementValidator->getId_TenantError()) ? 'error' : ''; ?>">
    <label class="control-label">Mieter*</label>
    <div class="controls">
        <input name="id_tenant" type="number" id="fTA_id_tenant" placeholder="Mieternummer" 
               value="<?php echo !empty($tenancy_agreement->getId_tenant()) ? $tenancy_agreement->getId_tenant() : ''; ?>">
               <?php if (!empty($tenancy_agreementValidator->getId_TenantError())): ?>
               <span class="help-inline"><?php echo $tenancy_agreementValidator->getId_TenantError(); ?></span>
               <?php endif; ?>
            <span id="id_tenantMessage"></span>   
            <p id="requiredMessage"</p> 
    </div>
</div>
