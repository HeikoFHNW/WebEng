<?php include_once("../includes/header.tpl.php"); ?>
    <div class="container">
        <div class="row">
            <h3>PHP CRUD Grid</h3>
        </div>
        <div class="row">
            <p>
                <a href="create.php" class="btn btn-success">Create</a>
            </p>

            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>Mobile Number</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include '../dao/Database.php';
                include '../dao/CustomerDAOImpl.php';
                foreach ((new CustomerDAOImpl(Database::connect()))->findAll() as $customer) {
                    echo '<tr>';
                    echo '<td>' . $customer->getName() . '</td>';
                    echo '<td>' . $customer->getEmail() . '</td>';
                    echo '<td>' . $customer->getMobile() . '</td>';
                    echo '<td width=250>';
                    echo '<a class="btn" href="read.php?id=' . $customer->getId() . '">Read</a>';
                    echo '&nbsp;';
                    echo '<a class="btn btn-success" href="update.php?id=' . $customer->getId() . '">Update</a>';
                    echo '&nbsp;';
                    echo '<a class="btn btn-danger" href="delete.php?id=' . $customer->getId() . '">Delete</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
<?php include_once("../includes/footer.tpl.php"); ?>