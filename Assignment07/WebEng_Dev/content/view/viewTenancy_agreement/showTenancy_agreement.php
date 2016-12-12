<div class="container">
    <div class="row">
        <h3>Tenancy_agreement Overview</h3>
    </div>
    <div class="row">
        <p>
            <a href="?controller=Tenancy_agreement&action=create" class="btn btn-success">Create</a>
        </p>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Vorname</th>
                <th>Nachname</th>
                <th>Beginn</th>
                <th>Ende</th>
                <th>Netto Miete</th>
                <th>MO Strasse</th>
                <th>MO Nr.</th>
                <th>MO PLZ</th>
                <th>MO Ort</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($tenancy_agreements as $tenancy_agreement) {
                echo '<tr>';
                echo '<td>' . $tenancy_agreement->getId_tenancy_agreement() . '</td>';
                echo '<td>' . $tenancy_agreement->getFirstname() . '</td>';
                echo '<td>' . $tenancy_agreement->getLastname() . '</td>';
                echo '<td>' . $tenancy_agreement->getStart_of_tenancy() . '</td>';
                echo '<td>' . $tenancy_agreement->getEnd_of_tenancy() . '</td>';
                echo '<td>' . $tenancy_agreement->getNetrent() . '</td>';
                echo '<td>' . $tenancy_agreement->getStreet() . '</td>';
                echo '<td>' . $tenancy_agreement->getStreetnumber() . '</td>';
                echo '<td>' . $tenancy_agreement->getPostcode() . '</td>';
                echo '<td>' . $tenancy_agreement->getCity() . '</td>';

                echo '<td width=250>';
                echo '<a class="btn" href="?controller=Tenancy_agreement&action=read&id_tenancy_agreement=' . $tenancy_agreement->getId_tenancy_agreement() . '"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span></a>';
                echo '&nbsp;';
                echo '<a class="btn btn-success" href="?controller=Tenancy_agreement&action=update&id_tenancy_agreement=' . $tenancy_agreement->getId_tenancy_agreement() . '"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
                echo '&nbsp;';
                echo '<a class="btn btn-danger" href="?controller=Tenancy_agreement&action=deleteAsk&id_tenancy_agreement=' . $tenancy_agreement->getId_tenancy_agreement() . '"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>