
/*Benutzer erfassen*/
INSERT INTO benutzer
(Vorname, Nachname, Benutzername, Passwort, Email, `Session`, Admin)
VALUES ($nachname, $vorname, $benutzername, $passwort, $email, $sess, $admin);

/*Benutzer update*/
UPDATE benutzer
SET Vorname = $vornameNeu, Nachname = $nachnameNeu, Benutzername = $usernameNeu, Passwort = $pwNeu, Email = $emailNeu, `Session` = $sessNeu, Admin = $adminNeu
WHERE Benutzername = $benutzername;

