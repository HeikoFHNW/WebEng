<?PHP

if(!isset($_SESSION['login_user']))
{
    Route::call('User', 'loginShow');
    exit;
}
?>

<script>
    $(document).ready(function() {
        $('#datatable').dataTable({
                "columnDefs": [ 
                    { "targets": 5, "orderable": false }
                ],
                language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.13/i18n/German.json"
                }
        });
        $("[data-toggle=tooltip]").tooltip();
    }
        );
</script>

<div class="container">
    <div class="row">
        <h3>Benutzerübersicht</h3>
    </div>
    <div class="row">
        <p>
            <a href="?controller=User&action=create" class="btn btn-success">Erstellen</a>
        </p>

        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Vorname</th>
                <th>Nachname</th>
                <th>Benutzername</th>
                <!--<th>Passwort</th>-->
                <th>Email</th>
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
