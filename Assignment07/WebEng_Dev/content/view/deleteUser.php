<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Delete an User</h3>
        </div>

        <form class="form-horizontal" action="?controller=User&action=delete" method="post">
            <input type="hidden" name="id_user" value="<?php echo $user->getId_user(); ?>"/>
            <p class="alert alert-error">Are you sure to delete ?</p>
            <div class="form-actions">
                <button type="submit" class="btn btn-danger">Yes</button>
                <a class="btn" href="../app/index.php">No</a>
            </div>
        </form>
    </div>

</div>