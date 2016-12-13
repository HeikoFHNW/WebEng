<?PHP

if(!isset($_SESSION['login_user']))
{
    Route::call('User', 'loginShow');
    exit;
}
?>
<div class="container">
    <div class="row">
        <h3>Benutzerübersicht</h3>
    </div>
    <div class="row">
        <p>
            <a href="?controller=User&action=create" class="btn btn-success">Create</a>
        </p>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Vorname</th>
                <th>Nachname</th>
                <th>Benutzername</th>
                <!--<th>Passwort</th>-->
                <th>Email</th>
                <th>lock</th>
                <th>Admin</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($users as $user) {
                echo '<tr>';
                echo '<td>' . $user->getId_user() . '</td>';
                echo '<td>' . $user->getFirstname() . '</td>';
                echo '<td>' . $user->getLastname() . '</td>';
                echo '<td>' . $user->getUsername() . '</td>';
               // echo '<td>' . $user->getPassword() . '</td>';
                echo '<td>' . $user->getEmail() . '</td>';
                echo '<td>' . $user->getLocked() . '</td>';
                echo '<td>' . $user->getAdmin() . '</td>';
                echo '<td width=250>';
                echo '<a class="btn" href="?controller=User&action=read&id_user=' . $user->getId_user() . '"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span></a>';
                echo '&nbsp;';
                echo '<a class="btn btn-success" href="?controller=User&action=update&id_user=' . $user->getId_user() . '"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
                echo '&nbsp;';
                echo '<a class="btn btn-danger" href="?controller=User&action=deleteAsk&id_user=' . $user->getId_user() . '"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>