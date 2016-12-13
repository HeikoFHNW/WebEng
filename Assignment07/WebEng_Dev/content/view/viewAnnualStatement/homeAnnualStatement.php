<?PHP

if(!isset($_SESSION['login_user']))
{
    Route::call('User', 'loginShow');
    exit;
}
?>
    <div class="container">
    <div class="row">
        <h3>Berichte</h3>
    </div>
    <div class="row">
        <h5>Wählen Sie den Zeitraum für den gewünschten Bericht aus und drücken sie den entsprechenden Knopf.</h5>
    </div>
            <div class="form-actions">
                <a class="btn btn-success" href="?controller=AnnualStatement&action=create">Jahresabrechnung</a>
                <a class="btn btn-success" href="?controller=AuxiliaryCost&action=create">Nebenkostenabrechnung</a>
                <a class="btn" href="?controller=Homepage&action=show">Back</a>
            </div>    
</div>
