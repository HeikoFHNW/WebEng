<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <script src="../../js/bootstrap.min.js"></script>
    
</head>

<body>

<?php require('../includes/navBar.php');?>
    
<?php
require_once('routes.php');
Route::call($controller, $action);
?>


</body>
</html>