<div class="container">
    <div class="row">
        <h3>Property Overview</h3>
    </div>
    <div class="row">
        <p>
            <a href="?controller=Property&action=create" class="btn btn-success">Create</a>
        </p>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Wohnungen</th>
                <th>anlegen</th>
                <th>Strasse</th>
                <th>Nr.</th>
                <th>PLZ</th>
                <th>Ort</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($propertys as $property) {
                echo '<tr>';
                echo '<td>' . $property->getId_property() . '</td>';
                echo '<td>' . $property->getApartments() . '</td>';
                echo '<td width=50>';
                echo '<a class="btn btn-success" href="?controller=Apartment&action=create&id_property=' . $property->getId_property() . '">neue Wohnung</a>';
                echo '</td>';
                echo '<td>' . $property->getStreet() . '</td>';
                echo '<td>' . $property->getStreetnumber() . '</td>';
                echo '<td>' . $property->getPostcode() . '</td>';
                echo '<td>' . $property->getCity() . '</td>';
                echo '<td width=250>';
                echo '<a class="btn" href="?controller=Property&action=read&id_property=' . $property->getId_property() . '">Read</a>';
                echo '&nbsp;';
                echo '<a class="btn btn-success" href="?controller=Property&action=update&id_property=' . $property->getId_property() . '">Update</a>';
                echo '&nbsp;';
                echo '<a class="btn btn-danger" href="?controller=Property&action=deleteAsk&id_property=' . $property->getId_property() . '">Delete</a>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>