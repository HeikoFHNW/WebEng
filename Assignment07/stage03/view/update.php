<?php
include '../dao/Database.php';
include '../dao/CustomerDAOImpl.php';

$id = null;
$customer = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: index.php");
}

if (!empty($_POST)) {
    // keep track validation errors
    $nameError = null;
    $emailError = null;
    $mobileError = null;

    // keep track post values
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    $customer = new Customer($id, $name, $email, $mobile);

    // validate input
    $valid = true;
    if (empty($name)) {
        $nameError = 'Please enter Name';
        $valid = false;
    }

    if (empty($email)) {
        $emailError = 'Please enter Email Address';
        $valid = false;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = 'Please enter a valid Email Address';
        $valid = false;
    }

    if (empty($mobile)) {
        $mobileError = 'Please enter Mobile Number';
        $valid = false;
    }

    // update data
    if ($valid) {
        $customer = (new CustomerDAOImpl(Database::connect()))->updateCustomer(new Customer($id, $name,$email,$mobile));
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
                <div class="control-group <?php echo !empty($nameError) ? 'error' : ''; ?>">
                    <label class="control-label">Name</label>
                    <div class="controls">
                        <input name="name" type="text" placeholder="Name"
                               value="<?php echo !empty($customer->getName()) ? $customer->getName() : ''; ?>">
                        <?php if (!empty($nameError)): ?>
                            <span class="help-inline"><?php echo $nameError; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="control-group <?php echo !empty($emailError) ? 'error' : ''; ?>">
                    <label class="control-label">Email Address</label>
                    <div class="controls">
                        <input name="email" type="text" placeholder="Email Address"
                               value="<?php echo !empty($customer->getEmail()) ? $customer->getEmail() : ''; ?>">
                        <?php if (!empty($emailError)): ?>
                            <span class="help-inline"><?php echo $emailError; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="control-group <?php echo !empty($mobileError) ? 'error' : ''; ?>">
                    <label class="control-label">Mobile Number</label>
                    <div class="controls">
                        <input name="mobile" type="text" placeholder="Mobile Number"
                               value="<?php echo !empty($customer->getMobile()) ? $customer->getMobile() : ''; ?>">
                        <?php if (!empty($mobileError)): ?>
                            <span class="help-inline"><?php echo $mobileError; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a class="btn" href="index.php">Back</a>
                </div>
            </form>
        </div>

    </div>
<?php include_once("../includes/footer.tpl.php"); ?>