<?php

include '../dao/Database.php';
include '../dao/CustomerDAOImpl.php';
include '../validator/CustomerValidator.php';

$customer = new Customer();
$customerValidator = new CustomerValidator();

if (!empty($_POST)) {

    $customer = new Customer(null, $_POST['name'], $_POST['email'], $_POST['mobile']);
    $customerValidator = new CustomerValidator($customer);

    if ($customerValidator->isValid()) {
        $customer = (new CustomerDAOImpl(Database::connect()))->createCustomer($customer);
        header("Location: index.php");
    }
}
?>

<?php include_once("../includes/header.tpl.php"); ?>
    <div class="container">

        <div class="span10 offset1">
            <div class="row">
                <h3>Create a Customer</h3>
            </div>

            <form class="form-horizontal" action="create.php" method="post">
                <?php include_once("form.php"); ?>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">Create</button>
                    <a class="btn" href="index.php">Back</a>
                </div>
            </form>
        </div>

    </div>
<?php include_once("../includes/footer.tpl.php"); ?>