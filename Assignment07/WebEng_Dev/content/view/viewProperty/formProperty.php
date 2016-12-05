<div class="control-group">
    <label class="control-label">Strasse:</label>
    <div class="controls">
        <input name="street" type="text" placeholder="Strasse" 
               value="<?php echo !empty($property->getStreet()) ? $property->getStreet() : ''; ?>">
    </div>
</div>
<div class="control-group">
    <label class="control-label">Hausnummer:</label>
    <div class="controls">
        <input name="streetnumber" type="text" placeholder="Hausnr." 
               value="<?php echo !empty($property->getStreetnumber()) ? $property->getStreetnumber() : ''; ?>">
    </div>
</div>
<div class="control-group">
    <label class="control-label">PLZ:</label>
    <div class="controls">
        <input name="postcode" type="text" placeholder="PLZ" 
               value="<?php echo !empty($property->getPostcode()) ? $property->getPostcode() : ''; ?>">
    </div>
</div>
 <div class="control-group">
    <label class="control-label">Ort:</label>
    <div class="controls">
        <input name="city" type="text" placeholder="Wohnort" 
               value="<?php echo !empty($property->getCity()) ? $property->getCity() : ''; ?>">
    </div>
</div>
 

