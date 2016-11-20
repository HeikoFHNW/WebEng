<div class="control-group <?php echo !empty($customerValidator->getNameError()) ? 'error' : ''; ?>">
    <label class="control-label">Name</label>
    <div class="controls">
        <input name="name" type="text" placeholder="Name"
               value="<?php echo !empty($customer->getName()) ? $customer->getName() : ''; ?>">
        <?php if (!empty($customerValidator->getNameError())): ?>
            <span class="help-inline"><?php echo $customerValidator->getNameError(); ?></span>
        <?php endif; ?>
    </div>
</div>
<div class="control-group <?php echo !empty($customerValidator->getEmailError()) ? 'error' : ''; ?>">
    <label class="control-label">Email Address</label>
    <div class="controls">
        <input name="email" type="text" placeholder="Email Address"
               value="<?php echo !empty($customer->getEmail()) ? $customer->getEmail() : ''; ?>">
        <?php if (!empty($customerValidator->getEmailError())): ?>
            <span class="help-inline"><?php echo $customerValidator->getEmailError(); ?></span>
        <?php endif; ?>
    </div>
</div>
<div class="control-group <?php echo !empty($customerValidator->getMobileError()) ? 'error' : ''; ?>">
    <label class="control-label">Mobile Number</label>
    <div class="controls">
        <input name="mobile" type="text" placeholder="Mobile Number"
               value="<?php echo !empty($customer->getMobile()) ? $customer->getMobile() : ''; ?>">
        <?php if (!empty($customerValidator->getMobileError())): ?>
            <span class="help-inline"><?php echo $customerValidator->getMobileError(); ?></span>
        <?php endif; ?>
    </div>
</div>