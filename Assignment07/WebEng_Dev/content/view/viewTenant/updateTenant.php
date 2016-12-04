<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Update a Tenant</h3>
        </div>

        <form class="form-horizontal" action="?controller=Tenant&action=update&id_tenant=<?php echo $tenant->getId_tenant() ?>" method="post">
            <?php include_once("formTenant.php"); ?>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Update</button>
                <a class="btn" href="?controller=Tenant&action=show">Back</a>
            </div>
        </form>
    </div>

</div>