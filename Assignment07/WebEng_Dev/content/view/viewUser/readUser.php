<?PHP

if(!isset($_SESSION['login_user']))
{
    Route::call('User', 'loginShow');
    exit;
}
?>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Benutzer anzeigen</h3>
        </div>

        <div class="form-horizontal">
            <div class="control-group row">
                <label class="control-label">ID</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $user->getId_user(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Firstname</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $user->getFirstname(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Lastname</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $user->getLastname(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Username</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $user->getUsername(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Password</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $user->getPassword(); ?>
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
            <div class="control-group">
                <label class="control-label">Locked</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $user->getLocked(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Locked</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $user->getAdmin(); ?>
                    </label>
                </div>
            </div>
            <div class="form-actions">
                <a class="btn" href="?controller=User&action=show">Back</a>
            </div>


        </div>
    </div>

</div>