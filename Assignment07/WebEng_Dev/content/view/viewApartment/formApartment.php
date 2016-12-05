<div class="control-group">
    <label class="control-label">Apartment Typ:</label>
    <div class="controls">
        <input name="apartment_type" type="text" placeholder="Art der Wohnung" 
               value="<?php echo !empty($apartment->getApartment_type()) ? $apartment->getApartment_type() : ''; ?>">
    </div>
</div>
<div class="control-group">
    <label class="control-label">Anzahl Räume:</label>
    <div class="controls">
        <input name="rooms" type="text" placeholder="Räume" 
               value="<?php echo !empty($apartment->getRooms()) ? $apartment->getRooms() : ''; ?>">
    </div>
</div>
<div class="control-group">
    <label class="control-label">Quadratmeter:</label>
    <div class="controls">
        <input name="squaremeter" type="text" placeholder="m^2" 
               value="<?php echo !empty($apartment->getSquaremeter()) ? $apartment->getSquaremeter() : ''; ?>">
    </div>
</div>
 <div class="control-group">
    <label class="control-label">Liegenschafts ID:</label>
    <div class="controls">
        <input name="id_property" type="text" placeholder="Liegenschaft" 
               value="<?php echo !empty($apartment->getId_property()) ? $apartment->getId_property() : ''; ?>">
    </div>
</div>
 

