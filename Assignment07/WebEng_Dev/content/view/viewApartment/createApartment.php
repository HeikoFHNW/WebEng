<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Create a Apartment</h3>
        </div>

        <form class="form-horizontal" action="?controller=Apartment&action=create" method="post">
            <?php include_once("formApartment.php"); ?>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Create</button>
                <a class="btn" href="?controller=Apartment&action=show">Back</a>
            </div>
        </form>
    </div>

</div>