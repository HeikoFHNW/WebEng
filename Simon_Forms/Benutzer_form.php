<!DOCTYPE html>
<html>
<body>

    <form action="Benutzer_form.php" method="POST">
    <h2>Benutzer erfassen</h2>
    <table border="0" cellspacing="0" cellpadding="2">
    <tbody>
    <tr>
        <td>Vorname:*</td>
        <td>
          <input type="text" name="name" value="" />
        </td>
    </tr>
    
    <tr>
        <td>Nachname:*</td>
        <td>
            <input type="text" name="nachname" value="" />
        </td>
    </tr>
    
    <tr>
        <td>Benutzername:*</td>
        <td>
           <input type="text" name="benutzername" value="" /> 
        </td>
    </tr>
    
    <tr>
        <td>Passwort:*</td>
        <td>
            <input type="password" name="passwort1" value="" />
        </td>
    </tr>
    
    <tr>
        <td>Passwort bestätigen:*</td>
        <td>
           <input type="password" name="passwort2" value="" />
        </td>
    </tr>
    
    <tr>
        <td>E-Mail:*</td>
        <td>
            <input type="email" name="email" value="" />
        </td>
    </tr>
    
    <tr>
        <td>Adminrechte:</td>
        <td>
            <input name="Admin" size="Adminrechte" type="checkbox"/>
        </td>
    </tr>
    
    <tr>
        <td><input type="submit" name="Speichern" value="erfassen" /></td>
        <td><input type="reset" value="Zurücksetzen" /></td>
    </tr>
    </tbody>
    </table>
</form>
</body>
</html>