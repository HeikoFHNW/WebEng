<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Read a User</h3>
        </div>

        <div class="form-horizontal">
            <div class="control-group">
                <label class="control-label">Vorname</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $user->getFirstname(); ?>
                    </label>
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label">Nachname</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $user->getLastname(); ?>
                    </label>
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label">Benutzername</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $user->getUsername(); ?>
                    </label>
                </div>
            </div>
            
            
            
            <div class="control-group">
                <label class="control-label">Email Address</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $user->getEmail(); ?>
                    </label>
                </div>
            </div>
            
            <div class="form-actions">
                <a class="btn" href="../app/Useroverview.php">Back</a>
            </div>


        </div>
    </div>

</div>