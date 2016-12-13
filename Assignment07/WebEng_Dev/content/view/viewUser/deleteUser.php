<?PHP

if(!isset($_SESSION['login_user']))
{
    Route::call('User', 'loginShow');
    exit;
}
?>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Delete an User</h3>
        </div>

        <form class="form-horizontal" action="?controller=User&action=delete" method="post">
            <input type="hidden" name="id_user" value="<?php echo $user->getId_user(); ?>"/>
            <p class="alert alert-error">Are you sure to delete ?</p>
            <div class="form-actions">
                <button type="submit" class="btn btn-danger">Ja</button>
                <a class="btn" href="?controller=User&action=show">Nein</a>
            </div>
        </form>
    </div>

</div>