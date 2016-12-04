<?php
include '../dao/Database.php';
include '../dao/CustomerDAOImpl.php';
$id = 0;

if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (!empty($_POST)) {
    // keep track post values
    $id = $_POST['id'];

    // delete data
    (new CustomerDAOImpl(Database::connect()))->deleteCustomer(new Customer($id));
    header("Location: index.php");

}
?>

<?php include_once("../includes/header.tpl.php"); ?>
    <div class="container">

        <div class="span10 offset1">
            <div class="row">
                <h3>Delete a Customer</h3>
            </div>

            <form class="form-horizontal" action="delete.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                <p class="alert alert-error">Are you sure to delete ?</p>
                <div class="form-actions">
                    <button type="submit" class="btn btn-danger">Yes</button>
                    <a class="btn" href="index.php">No</a>
                </div>
            </form>
        </div>

    </div>
<?php include_once("../includes/footer.tpl.php"); ?>