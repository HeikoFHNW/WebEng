<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Login</h3>
        </div>
        <form class="form-horizontal" action="?controller=User&action=login" method="post">
            <?php include_once("formLogin.php"); ?>            
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Login</button>
                <a class="btn" href="../app/index.php">Back</a>
            </div>
        </form>
    </div>

</div>
