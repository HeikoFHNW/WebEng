<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Create a Customer</h3>
        </div>

        <form class="form-horizontal" action="?controller=Customer&action=create" method="post">
            <?php include_once("formCustomer.php"); ?>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Create</button>
                <a class="btn" href="../app/index.php">Back</a>
            </div>
        </form>
    </div>

</div>