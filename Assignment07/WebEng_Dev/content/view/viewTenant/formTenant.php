<div class="control-group">
  <label class="control-label" for="sel1">Anrede:</label>
  <div class="controls">
    <select name="title" class="form-control" 
            value="<?php echo !empty($tenant->getTitle()) ? $tenant->getTitle() : ''; ?>">
      <option>Herr</option>
      <option>Frau</option>
      <option>Fam.</option>
      <option>Dr.</option>
      <option>Prof.</option>
    </select>
  </div>
</div>
<div class="control-group <?php echo !empty($tenantValidator->getFirstnameError()) ? 'error' : ''; ?>">
    <label class="control-label">Vorname</label>
    <div class="controls">
        <input name="firstname" type="text" placeholder="Vorname"
               value="<?php echo !empty($tenant->getFirstname()) ? $tenant->getFirstname() : ''; ?>">
        <?php if (!empty($tenantValidator->getFirstnameError())): ?>
            <span class="help-inline"><?php echo $tenantValidator->getFirstnameError(); ?></span>
        <?php endif; ?>
    </div>
</div>
<div class="control-group <?php echo !empty($tenantValidator->getLastnameError()) ? 'error' : ''; ?>">
    <label class="control-label">Nachname</label>
    <div class="controls">
        <input name="lastname" type="text" placeholder="Nachname"
               value="<?php echo !empty($tenant->getLastname()) ? $tenant->getLastname() : ''; ?>">
        <?php if (!empty($tenantValidator->getLastnameError())): ?>
            <span class="help-inline"><?php echo $tenantValidator->getLastnameError(); ?></span>
        <?php endif; ?>
    </div>
</div>
<div class="control-group">
    <label class="control-label">Geburtsdatum</label>
    <div class="controls">
        <input name="birthday" type="text" placeholder="DD/MM/YYYY" 
               value="<?php echo !empty($tenant->getBirthday()) ? $tenant->getBirthday() : ''; ?>">
    </div>
</div>
<div class="control-group">
  <label class="control-label" for="sel1">Zivilstand:</label>
  <div class="controls">
    <select name="marital_status" class="form-control">
      <option>ledig</option>
      <option>verheiratet</option>
      <option>Konkurbinat</option>
    </select>
  </div>
</div>
    <div class="control-group">
    <label class="control-label">Telefon:</label>
    <div class="controls">
        <input name="phone" type="text" placeholder="+41 12 345 67 89" 
               value="<?php echo !empty($tenant->getPhone()) ? $tenant->getPhone() : ''; ?>">
    </div>
</div>
<div class="control-group">
    <label class="control-label">Mobil:</label>
    <div class="controls">
        <input name="mobile" type="text" placeholder="+41 12 345 67 89" 
               value="<?php echo !empty($tenant->getMobile()) ? $tenant->getMobile() : ''; ?>">
    </div>
</div>
<div class="control-group <?php echo !empty($tenantValidator->getEmailError()) ? 'error' : ''; ?>">
    <label class="control-label">Email Addresse</label>
    <div class="controls">
        <input name="email" type="text" placeholder="Email Addresse"
               value="<?php echo !empty($tenant->getEmail()) ? $tenant->getEmail() : ''; ?>">
        <?php if (!empty($tenantValidator->getEmailError())): ?>
            <span class="help-inline"><?php echo $tenantValidator->getEmailError(); ?></span>
        <?php endif; ?>
    </div>
</div>
<div class="control-group">
    <label class="control-label">Strasse:</label>
    <div class="controls">
        <input name="street" type="text" placeholder="Strasse" 
               value="<?php echo !empty($tenant->getStreet()) ? $tenant->getStreet() : ''; ?>">
    </div>
</div>
<div class="control-group">
    <label class="control-label">Hausnummer:</label>
    <div class="controls">
        <input name="streetnumber" type="text" placeholder="Hausnr." 
               value="<?php echo !empty($tenant->getStreetnumber()) ? $tenant->getStreetnumber() : ''; ?>">
    </div>
</div>
<div class="control-group">
    <label class="control-label">PLZ:</label>
    <div class="controls">
        <input name="postcode" type="text" placeholder="PLZ" 
               value="<?php echo !empty($tenant->getPostcode()) ? $tenant->getPostcode() : ''; ?>">
    </div>
</div>
 <div class="control-group">
    <label class="control-label">Ort:</label>
    <div class="controls">
        <input name="city" type="text" placeholder="Wohnort" 
               value="<?php echo !empty($tenant->getCity()) ? $tenant->getCity() : ''; ?>">
    </div>
</div>
 

