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
            <h3>Benutzer löschen</h3>
        </div>

        <form class="form-horizontal" action="?controller=User&action=delete" method="post">
            <input type="hidden" name="id_user" value="<?php echo $user->getId_user(); ?>"/>
            <p class="alert alert-error">Wollen Sie den Eintrag löschen ?</p>
            <div class="form-actions">
                <button type="submit" class="btn btn-danger">Yes</button>
                <a class="btn" href="?controller=User&action=show">No</a>
            </div>
        </form>
    </div>

</div>