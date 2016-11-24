<div class="container">
    <div class="row">
        <h3>User Overview</h3>
    </div>
    <div class="row">
        <p>
            <a href="?controller=Tenant&action=create" class="btn btn-success">Create</a>
        </p>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Titel</th>
                <th>Vorname</th>
                <th>Nachname</th>
                <th>Strasse</th>
                <th>Nr.</th>
                <th>PLZ</th>
                <th>Ort</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($tenants as $tenant) {
                echo '<tr>';
                echo '<td>' . $tenant->getId_tenant() . '</td>';
                echo '<td>' . $tenant->getTitle() . '</td>';
                echo '<td>' . $tenant->getFirstname() . '</td>';
                echo '<td>' . $tenant->getLastname() . '</td>';
                echo '<td>' . $tenant->getStreet() . '</td>';
                echo '<td>' . $tenant->getStreetnumber() . '</td>';
                echo '<td>' . $tenant->getPostcode() . '</td>';
                echo '<td>' . $tenant->getCity() . '</td>';
                echo '<td>' . $tenant->getEmail() . '</td>';
                echo '<td width=250>';
                echo '<a class="btn" href="?controller=Tenant&action=read&id_tenant=' . $tenant->getId_tenant() . '">Read</a>';
                echo '&nbsp;';
                echo '<a class="btn btn-success" href="?controller=Tenant&action=update&id_tenant=' . $tenant->getId_tenant() . '">Update</a>';
                echo '&nbsp;';
                echo '<a class="btn btn-danger" href="?controller=Tenant&action=deleteAsk&id_tenant=' . $tenant->getId_tenant() . '">Delete</a>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>