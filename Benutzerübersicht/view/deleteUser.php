<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Delete a User</h3>
        </div>

        <form class="form-horizontal" action="?controller=User&action=delete" method="post">
            <input type="hidden" name="id" value="<?php echo $user->getId(); ?>"/>
            <p class="alert alert-error">Are you sure to delete ?</p>
            <div class="form-actions">
                <button type="submit" class="btn btn-danger">Yes</button>
                <a class="btn" href="../app/Useroverview.php">No</a>
            </div>
        </form>
    </div>

</div>