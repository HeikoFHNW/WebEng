<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Create a Tenant</h3>
        </div>

        <form class="form-horizontal" action="?controller=Tenant&action=create" method="post">
            <?php include_once("formTenant.php"); ?>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Create</button>
                <a class="btn" href="?controller=Tenant&action=show">Back</a>
            </div>
        </form>
    </div>

</div>