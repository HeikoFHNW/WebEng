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
            <h3>Read a Property</h3>
        </div>

        <div class="form-horizontal">
            <div class="control-group row">
                <label class="control-label">ID</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $property->getId_property(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Strasse</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $property->getStreet(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Nr.</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $property->getStreetnumber(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">PLZ</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $property->getPostcode(); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Stadt</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $property->getCity(); ?>
                    <div class="form-actions">
                        <a class="btn" href="?controller=Property&action=show">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>