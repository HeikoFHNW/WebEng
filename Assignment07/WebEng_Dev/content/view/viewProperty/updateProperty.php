<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Update a Property</h3>
        </div>

        <form class="form-horizontal" action="?controller=Property&action=update&id_property=<?php echo $property->getId_property() ?>" method="post">
            <?php include_once("formProperty.php"); ?>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Update</button>
                <a class="btn" href="?controller=Property&action=show">Back</a>
            </div>
        </form>
    </div>

</div>