<div class="control-group <?php echo !empty($userValidator->getUsernameError()) ? 'error' : ''; ?>">
    <label class="control-label">Username</label>
    <div class="controls">
        <input name="username" type="text" placeholder="Username"
               value="<?php echo !empty($user->getUsername()) ? $User->getUsername() : ''; ?>">
        <?php if (!empty($userValidator->getUsernameError())): ?>
            <span class="help-inline"><?php echo $userValidator->getUsernameError(); ?></span>
        <?php endif; ?>
    </div>
</div>
<div class="control-group <?php echo !empty($userValidator->getPasswordError()) ? 'error' : ''; ?>">
    <label class="control-label">Password</label>
    <div class="controls">
        <input name="password" type="text" placeholder="Password"
               value="<?php echo !empty($user->getPassword()) ? $user->getPassword() : ''; ?>">
        <?php if (!empty($userValidator->getPasswordError())): ?>
            <span class="help-inline"><?php echo $userValidator->getPasswordError(); ?></span>
        <?php endif; ?>
    </div>
</div>

