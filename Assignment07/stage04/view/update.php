<?php
include '../dao/Database.php';
include '../dao/CustomerDAOImpl.php';
include '../validator/CustomerValidator.php';

$customer = new Customer();
$customerValidator = new CustomerValidator();

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: index.php");
}

if (!empty($_POST)) {
    $customer = new Customer($id, $_POST['name'],$_POST['email'],$_POST['mobile']);
    $customerValidator = new CustomerValidator($customer);

    if ($customerValidator->isValid()) {
        $customer = (new CustomerDAOImpl(Database::connect()))->updateCustomer($customer);
        header("Location: index.php");
    }
} else {
    $customer = (new CustomerDAOImpl(Database::connect()))->readCustomer($id);
}
?>

<?php include_once("../includes/header.tpl.php"); ?>
    <div class="container">

        <div class="span10 offset1">
            <div class="row">
                <h3>Update a Customer</h3>
            </div>

            <form class="form-horizontal" action="update.php?id=<?php echo $customer->getId() ?>" method="post">
                <?php include_once("form.php"); ?>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a class="btn" href="index.php">Back</a>
                </div>
            </form>
        </div>

    </div>
<?php include_once("../includes/footer.tpl.php"); ?>