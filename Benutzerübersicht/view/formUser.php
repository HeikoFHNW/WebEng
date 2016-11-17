<div class="control-group <?php echo !empty($userValidator->getNameError()) ? 'error' : ''; ?>">
    <label class="control-label">Vorname</label>
    <div class="controls">
        <input name="firstname" type="text" placeholder="Vorname"
               value="<?php echo !empty($user->getFirstname()) ? $user->getFirstname() : ''; ?>">
        <?php if (!empty($userValidator->getNameError())): ?>
            <span class="help-inline"><?php echo $userValidator->getNameError(); ?></span>
        <?php endif; ?>
    </div>
</div>

<div class="control-group <?php echo !empty($userValidator->getNameError()) ? 'error' : ''; ?>">
    <label class="control-label">Nachname</label>
    <div class="controls">
        <input name="lastname" type="text" placeholder="Nachname"
               value="<?php echo !empty($user->getLastname()) ? $user->getLastname() : ''; ?>">
        <?php if (!empty($userValidator->getNameError())): ?>
            <span class="help-inline"><?php echo $userValidator->getNameError(); ?></span>
        <?php endif; ?>
    </div>
</div>

<div class="control-group <?php echo !empty($userValidator->getNameError()) ? 'error' : ''; ?>">
    <label class="control-label">Benutzername</label>
    <div class="controls">
        <input name="username" type="text" placeholder="Benutzername"
               value="<?php echo !empty($user->getUsername()) ? $user->getUsername() : ''; ?>">
        <?php if (!empty($userValidator->getNameError())): ?>
            <span class="help-inline"><?php echo $userValidator->getNameError(); ?></span>
        <?php endif; ?>
    </div>
</div>

<div class="control-group <?php echo !empty($userValidator->getNameError()) ? 'error' : ''; ?>">
    <label class="control-label">Passwort</label>
    <div class="controls">
        <input name="password" type="password" placeholder="Passwort"
               value="<?php echo !empty($user->getPassword()) ? $user->getPassword() : ''; ?>">
        <?php if (!empty($userValidator->getNameError())): ?>
            <span class="help-inline"><?php echo $userValidator->getNameError(); ?></span>
        <?php endif; ?>
    </div>
</div>


<div class="control-group <?php echo !empty($userValidator->getEmailError()) ? 'error' : ''; ?>">
    <label class="control-label">Email Address</label>
    <div class="controls">
        <input name="email" type="text" placeholder="Email Address"
               value="<?php echo !empty($user->getEmail()) ? $user->getEmail() : ''; ?>">
        <?php if (!empty($userValidator->getEmailError())): ?>
            <span class="help-inline"><?php echo $userValidator->getEmailError(); ?></span>
        <?php endif; ?>
    </div>
</div>
