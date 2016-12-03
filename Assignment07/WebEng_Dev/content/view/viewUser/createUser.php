<?php include ("../../content/includes/head.inc.php");?>

<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Create a User</h3>
        </div>

        <form class="form-horizontal" action="?controller=User&action=create" onkeyup="return validateBenutzerForm()"  method="post">
            <?php include_once("formUser.php"); ?>
            <div class="form-actions">
                <button type="submit"  class="btn btn-success">Create</button>
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
        //var e = notEmpty(fB_passwort2);
        var f = notEmpty(email);
        var g = validateEmail(email);
        //var h = passwordEquals(fB_passwort1, fB_passwort2);
        
        if(a && b && c && d &&f &&g){ //&& e && h && f
            return true;
        }else{
            return false;
        }
        }
           
        </script>