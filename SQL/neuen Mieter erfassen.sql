USE hausverwaltung;

INSERT INTO ort (PLZ, Land, Ort) 
VALUES($plz, $land, $ort);

INSERT INTO adresse (Strasse, Hausnummer, PLZ) 
VALUES ($strasse, $hausnummer, $plz);

SELECT ID_Adresse = $adresse FROM adresse WHERE Strasse = $strasse AND Hausnummer = $hausnummer AND PLZ =$plz;

INSERT INTO mieter (Anrede, Vorname, Nachname, Geburtsdatum, Zivilstand, Telefon, Mobile, Email, Adresse)
VALUES ($anrede, $vorname, $nachname, $geburtsdatum, $zivilstand, $telefon, $mobile, $email, $adresse);