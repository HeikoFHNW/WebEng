<?PHP

if(!isset($_SESSION['login_user']))
{
    Route::call('User', 'loginShow');
    exit;
}
?>
<?php include ("../../content/includes/head.inc.php");?>


<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Benutzer ändern</h3>
        </div>

        <form class="form-horizontal" action="?controller=User&action=update&id_user=<?php echo $user->getId_user() ?>" onsubmit="return ValidateBenutzerForm()" onkeyup="return validateBenutzerForm()" method="post">
            <?php include_once("formUser.php"); ?>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Update</button>
                <a class="btn" href="?controller=User&action=show">Back</a>
            </div>
        </form>
    </div>

</div>

<script>
        function validateBenutzerForm() {
        var a = notEmpty(firstname);
        var b = notEmpty(lastname);
        var c = notEmpty(username);
        var d = notEmpty(password);
        var e = notEmpty(password2);
        var f = notEmpty(email);
        var g = validateEmail(email);
        var h = passwordEquals(password, password2);
        
        if(a && b && c && d && e &&f &&g && h){ 
            return true;
        }else{
            return false;
        }
        }
           
        </script>