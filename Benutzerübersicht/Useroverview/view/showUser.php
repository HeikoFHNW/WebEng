<div class="container">
    <div class="row">
        <h3>PHP CRUD Grid</h3>
    </div>
    <div class="row">
        <p>
            <a href="?controller=User&action=create" class="btn btn-success">Create</a>
        </p>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Benutzername</th>
                <th>Vorname</th>
                <th>Nachname</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($users as $user) {
                echo '<tr>';
                echo '<td>' . $user->getUsername() . '</td>';
                echo '<td>' . $user->getFirstname() . '</td>';
                echo '<td>' . $user->getLastname() . '</td>';
                echo '<td>' . $user->getEmail() . '</td>';
                echo '<td width=250>';
                echo '<a class="btn" href="?controller=User&action=read&id=' . $user->getId() . '">Read</a>';
                echo '&nbsp;';
                echo '<a class="btn btn-success" href="?controller=User&action=update&id=' . $user->getId() . '">Update</a>';
                echo '&nbsp;';
                echo '<a class="btn btn-danger" href="?controller=User&action=deleteAsk&id=' . $user->getId() . '">Delete</a>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>