<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Login</h3>
        </div>

        <form class="form-horizontal" action="?controller=User&action=login" method="post">
            <div class="form-group">
		<label for="username" class="col-sm-2 control-label">Username</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="username" name="username" placeholder="Username" value="">
		</div>
	</div>
	<div class="form-group">
		<label for="password" class="col-sm-2 control-label">Password</label>
		<div class="col-sm-10">
			<input type="password" class="form-control" id="password" name="password" placeholder="min. 8 Zeichen" value="">
		</div>
	</div>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Login</button>
                <a class="btn" href="../app/index.php">Back</a>
            </div>
        </form>
    </div>

</div>
