/*neuen Ort anlegen*/
INSERT INTO Ort
(ID_PLZ, Land, Ort)
VALUES ($plz, $land, $ort);

/*neue Adresse anlegen*/
INSERT INTO Adresse
(Strasse, Hausnummer, PLZ)
VALUES ($strasse, $Hausnummer, $plz);

/*AdressID auslesen*/
SELECT ID_Adresse FROM Adresse
WHERE Strasse = $strasse AND Hausnummer = $hausnummer AND PLZ = $plz;

/*neue Liegenschaft anlegen*/
INSERT INTO Liegenschaft 
(Adresse, Anzahl_Wohnungen)
VALUES ($ID_adresse, $anz_wohn);