<?php

/*
MFH Codes:
0 - PHP Code nicht ausgeführt
1 - Fehler, bei der Verbindung zur Datenbank
2 - Fehler, Benutzer nicht gefunden
3 - Fehler, Passwort falsch
4 - Fehler, Benutzername vergeben
5 - Fehler, unterschiedliche Passwörter eingegeben
6 - Fehler, Registrierung fehlgeschlagen
7 -
8 -
9 -
10 -
11 - Registrierung erfolgreich
12 - Login erfolgreich
*/



function Login($Benutzername, $Passwort){
    
    $Servername = "localhost";
    $User = "root";
    $UserPW = "";
    $Datenbank = "muckibude_feenstaub";
    $connection = new mysqli($Servername, $User, $UserPW, $Datenbank);
    $Meldung = 0;
    
    if($connection->connect_error){
    $Meldung = 1;
    return $Meldung;
                                    }
    
    $sql = "SELECT * FROM login WHERE Benutzername='$Benutzername'";            
    $re = $connection->query($sql); #SQL Befehl wird ausgeführt
    
    $ID = $re->fetch_assoc()["Benutzer_ID"]; #Ergebis aus der Ausführung [ID] wird in $ID gespeichert
    
    $Passwort = hash('sha512', $Passwort); #Passwort wird in sha512 verschlüsselt


    $re = $connection->query($sql); #SQL Befehl wird ausgeführt
    $DB_Passwort = $re->fetch_assoc()["Passwort"]; #Ergebis aus der Ausführung [Passwort] wird in $DB_Passwort gespeichert
    
    #ID wird rausgenommen
    $Puffer1 = substr($DB_Passwort, 0 , 57); 
    $Puffer2 = substr($DB_Passwort, -71); 
    $DB_Passwort = $Puffer1 . $Puffer2;



    if($re->num_rows == 1){ 
        if($Passwort == $DB_Passwort) $Meldung = 12;
        else $Meldung = 3;
    }
    else $Meldung = 2;

    $connection->close();
    return $Meldung;

    }

function Reg($Benutzername, $Email, $Passwort1, $Passwort2){
    
    #Server
    $Servername = "localhost";
    $User = "root";
    $UserPW = "";
    $Datenbank = "muckibude_feenstaub";
    $connection = new mysqli($Servername, $User, $UserPW, $Datenbank);
    $Meldung = 0;
    
    #Serverprüfung
    if($connection->connect_error){
    $Meldung = 1;
    return $Meldung;
                                    }
    
    #Variabeln erstellen
    $Mitglied_seit = time();
    $Mitglied_seit = date("Y.m.d");

    $sql1 = "SELECT * FROM login";
    $ID = $connection->query($sql1);
    $ID = $ID->num_rows;
    $ID = $ID + 1;

    $sql3 = "INSERT INTO mitglieder VALUES($ID, 'Max', 'Mustermann', '$Email', 0, '$Mitglied_seit', '0000.00.00', 0)";
    $sql4 = "SELECT Benutzername FROM login WHERE Benutzername='$Benutzername'";
    $sql5 = "DELETE FROM login WHERE Benutzer_ID=$ID";
    $sql6 = "DELETE FROM mitglieder WHERE Benutzer_ID=$ID";
    $sql7 = "INSERT INTO bmi(Benutzer_ID) VALUES ($ID)";
    $sql8 = "DELETE FROM bmi WHERE Benutzer_ID=$ID";

    $REsql4 = $connection->query($sql4);

    $Anfrage2 = FALSE;
    $Anfrage3 = FALSE;
    $Anfrage4 = FALSE;




    #Registrierung

    if($Passwort1 == $Passwort2){
        if($REsql4->num_rows > 0) $Meldung = 4;
        else{
            $Passwort1 = hash('sha512', $Passwort1);
            $Puffer1 = substr($Passwort1, 0 , 57);
            $Puffer2 = substr($Passwort1, -71);
            $Passwort1 = $Puffer1 . $ID . $Puffer2;

            $sql2 = "INSERT INTO login VALUES($ID, '$Benutzername', '$Passwort1')";

            if($connection->query($sql2) === TRUE){

            $Anfrage2 = TRUE;
            }

            

            if($connection->query($sql3) === TRUE){

            $Anfrage3 = TRUE;
            }
            

            if($connection->query($sql7) === TRUE){
                $Anfrage4 = TRUE;
            }


        }


    }
    else{
        $Meldung = 5;
    }

    if($Anfrage2 == TRUE && $Anfrage3 == TRUE && $Anfrage4 == TRUE) $Meldung = 11;
    else{
        
        $connection->query($sql5);
        $connection->query($sql6);
        $connection->query($sql8);


    } 


    $connection->close();
    return $Meldung;
}

function bmi($Groesse, $Gewicht){
    $Groesse = $Groesse / 100;
    $BMI = $Gewicht / pow($Groesse, 2);
    $BMI = round($BMI, 1);
    return $BMI;
    
}

function Jahresbeitrag($Geschlecht, $Groesse, $Gewicht){
    
    
    $Beitrag = 240.00;
    $BMI = bmi($Groesse, $Gewicht);

    if($Geschlecht == 'm'){



        if($BMI < 25){ 


                            }
        elseif($BMI < 30){ 

            $Rabatt = (240.00 * 5) / 100;
            $Beitrag = $Beitrag - $Rabatt;

                            }
        elseif($BMI < 35){ 

            $Rabatt = (240.00 * 10) / 100;
            $Beitrag = $Beitrag - $Rabatt;
        }

        elseif($BMI < 40){ 

            $Rabatt = (240.00 * 25) / 100;
            $Beitrag = $Beitrag - $Rabatt;
                            }

        elseif($BMI >= 40){ 

            $Rabatt = (240.00 * 40) / 100;
            $Beitrag = $Beitrag - $Rabatt;
        }


    }

    elseif($Geschlecht == 'w'){


        if($BMI < 25){ 

                            }
        elseif($BMI < 30){ 

            $Rabatt = (240.00 * 10) / 100;
            $Beitrag = $Beitrag - $Rabatt;

                            }
        elseif($BMI < 35){ 

            $Rabatt = (240.00 * 20) / 100;
            $Beitrag = $Beitrag - $Rabatt;

                            }
        elseif($BMI < 40){

            $Rabatt = (240.00 * 30) / 100;
            $Beitrag = $Beitrag - $Rabatt;

                            }
        elseif($BMI >= 40){ 

            $Rabatt = (240.00 * 40) / 100;
            $Beitrag = $Beitrag - $Rabatt;

                            }

        }
    
    return $Beitrag;
}
    
    




?>
