<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Delete an Property</h3>
        </div>

        <form class="form-horizontal" action="?controller=Property&action=delete" method="post">
            <input type="hidden" name="id_property" value="<?php echo $property->getId_property(); ?>"/>
            <p class="alert alert-error">Are you sure to delete ?</p>
            <div class="form-actions">
                <button type="submit" class="btn btn-danger">Yes</button>
                <a class="btn" href="?controller=Property&action=show">No</a>
            </div>
        </form>
    </div>

</div>