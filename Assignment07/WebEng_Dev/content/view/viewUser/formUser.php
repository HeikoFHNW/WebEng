<div class="control-group <?php echo !empty($userValidator->getFirstnameError()) ? 'error' : ''; ?>">
    <label class="control-label">Vorname*</label>
    <div class="controls">
        <input name="firstname" type="text" placeholder="Vorname" id="firstname"
               value="<?php echo !empty($user->getFirstname()) ? $user->getFirstname() : ''; ?>">
        <?php if (!empty($userValidator->getFirstnameError())): ?>
            <span class="help-inline"><?php echo $userValidator->getFirstnameError(); ?></span>
        <?php endif; ?>
    </div>
</div>
<div class="control-group <?php echo !empty($userValidator->getLastnameError()) ? 'error' : ''; ?>">
    <label class="control-label">Nachname*</label>
    <div class="controls">
        <input name="lastname" type="text" id="lastname" placeholder="Nachname"
               value="<?php echo !empty($user->getLastname()) ? $user->getLastname() : ''; ?>">
        <?php if (!empty($userValidator->getLastnameError())): ?>
            <span class="help-inline"><?php echo $userValidator->getLastnameError(); ?></span>
        <?php endif; ?>
    </div>
</div>
<div class="control-group <?php echo !empty($userValidator->getUsernameError()) ? 'error' : ''; ?>">
    <label class="control-label">Benutzername*</label>
    <div class="controls">
        <input name="username" type="text" id="username" placeholder="Benutzername"
               value="<?php echo !empty($user->getUsername()) ? $user->getUsername() : ''; ?>">
        <?php if (!empty($userValidator->getUsernameError())): ?>
            <span class="help-inline"><?php echo $userValidator->getUsernameError(); ?></span>
        <?php endif; ?>
    </div>
</div>
<div class="control-group <?php echo !empty($userValidator->getPasswordError()) ? 'error' : ''; ?>">
    <label class="control-label">Passwort*</label>
    <div class="controls">
        <input name="password" type="password" id="password" placeholder="Passwort"
               value="<?php echo !empty($user->getHash()) ? $user->getHash() : ''; ?>">
        <div id="complexity" class="default">Passwortstärke</div>
        <?php if (!empty($userValidator->getPasswordError())): ?>
            <span class="help-inline"><?php echo $userValidator->getPasswordError(); ?></span>
        <?php endif; ?>
    </div>
</div>

<div class="control-group <?php echo !empty($userValidator->getPasswordError2()) ? 'error' : ''; ?>">
    <label class="control-label">Passwort wiederholen*</label>
    <div class="controls">
        <input name="password2" type="password" id="password2" placeholder="Passwort"
               value="<?php echo !empty($user->getPassword2()) ? $user->getPassword2() : ''; ?>">
        
        <?php if (!empty($userValidator->getPasswordError2())): ?>
            <span class="help-inline"><?php echo $userValidator->getPasswordError2(); ?></span>
        <?php endif; ?>
        <span id="passwortBestätigungMessage"></span> 
    </div>
</div>
<div class="control-group <?php echo !empty($userValidator->getEmailError()) ? 'error' : ''; ?>">
    <label class="control-label">Email Addresse*</label>
    <div class="controls">
        <input name="email" type="text" id="email" placeholder="Email Addresse" 
               value="<?php echo !empty($user->getEmail()) ? $user->getEmail() : ''; ?>">
        <?php if (!empty($userValidator->getEmailError())): ?>
            <span class="help-inline"><?php echo $userValidator->getEmailError(); ?></span>
        <?php endif; ?>
        <span id="emailValidationMessage"></span>
            <p id="requiredMessage"></p>
            
    </div>
</div>
