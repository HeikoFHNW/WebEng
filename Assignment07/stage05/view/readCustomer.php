<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Read a Customer</h3>
        </div>

        <div class="form-horizontal">
            <div class="control-group">
                <label class="control-label">Name</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $customer->getName(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Email Address</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $customer->getEmail(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Mobile Number</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $customer->getMobile(); ?>
                    </label>
                </div>
            </div>
            <div class="form-actions">
                <a class="btn" href="../app/index.php">Back</a>
            </div>


        </div>
    </div>

</div>