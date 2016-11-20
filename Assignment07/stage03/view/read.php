<?php
include '../dao/Database.php';
include '../dao/CustomerDAOImpl.php';
$id = null;
$customer=null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: index.php");
} else {
    $customer = (new CustomerDAOImpl(Database::connect()))->readCustomer($id);
}
?>

<?php include_once("../includes/header.tpl.php"); ?>
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
                    <a class="btn" href="index.php">Back</a>
                </div>


            </div>
        </div>

    </div>
<?php include_once("../includes/footer.tpl.php"); ?>