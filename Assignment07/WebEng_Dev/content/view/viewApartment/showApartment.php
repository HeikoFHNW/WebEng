<?PHP

if(!isset($_SESSION['login_user']))
{
    Route::call('User', 'loginShow');
    exit;
}
?>
<div class="container">
    <div class="row">
        <h3>Wohungsübersicht</h3>
    </div>
    <div class="row">
        <p>
            <a class="btn btn-success" href="?controller=Apartment&action=create&id_property=' <?php  echo $_GET['id_property'] ?> '" class="btn btn-success">Erstellen</a>
            <a class="btn btn" href="?controller=Property&action=show" class="btn btn">Zurück</a>
        </p>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Typ</th>
                <th>Zimmer</th>
                <th>M^2</th>
                <th>Liegenschaft</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($apartments as $apartment) {
                echo '<tr>';
                echo '<td>' . $apartment->getId_apartment() . '</td>';
                echo '<td>' . $apartment->getApartment_type() . '</td>';
                echo '<td>' . $apartment->getRooms() . '</td>';
                echo '<td>' . $apartment->getSquaremeter() . '</td>';
                echo '<td>' . $apartment->getId_property() . '</td>';
                echo '<td width=250>';
                echo '<a class="btn" href="?controller=Apartment&action=read&id_apartment=' . $apartment->getId_apartment() . '"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span></a>';
                echo '&nbsp;';
                echo '<a class="btn btn-success" href="?controller=Apartment&action=update&id_apartment=' . $apartment->getId_apartment() . '"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
                echo '&nbsp;';
                echo '<a class="btn btn-danger" href="?controller=Apartment&action=deleteAsk&id_apartment=' . $apartment->getId_apartment() . '"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
