<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Delete an Apartment</h3>
        </div>

        <form class="form-horizontal" action="?controller=Apartment&action=delete" method="post">
            <input type="hidden" name="id_apartment" value="<?php echo $apartment->getId_apartment(); ?>"/>
            <p class="alert alert-error">Are you sure to delete ?</p>
            <div class="form-actions">
                <button type="submit" class="btn btn-danger">Yes</button>
                <a class="btn" href="?controller=Apartment&action=show">No</a>
            </div>
        </form>
    </div>

</div>