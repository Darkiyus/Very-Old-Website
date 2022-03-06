<!doctype html>

<html>

<head>
    <title>Muckibude Feenstaub | Registrierung</title>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" />
    <link type="image/png" rel="icon" href="unicorn.png" sizes="16x16" />
    <meta name="viewport" content="initial-scale=1.0">
</head>

<body>
    <div id="header">
        <table style="width: 100%; margin-top: -10px;">
            <colgroup>
                <col width="50%" />
                <col width="50%" />
            </colgroup>
            <tr>
                <td><img src="M11.png" style="width: auto; height: auto;" /></td>
                <td>
                    <nav>
                        <a href="index.html" id='nava'>Startseite</a>
                        <a href="login.php" id='nava'>Login</a>
                        <a href="game1.html" id='nava'>Spiel</a>
                        <a href="Kurse.html" id='nava'>Kurse</a>
                        <a href="Krafttraining.html" id='nava'>Krafttraining</a>
                        <a href="BMI-Rechner.php" id="nava">BMI-Rechner</a>
                        <a></a>

                    </nav>
                </td>
            </tr>

        </table>

    </div>

    <br>
    <div id="willkommen" style="height: 350px">
        <fieldset>
            <legend>
                <h1>Registrierung</h1>
            </legend>

            <form method="post">

                <p>
                    <label>Benutzername</label>
                    <input type=text name="Benutzername" required />
                </p>
                <p>
                    <label>E-Mail</label>
                    <input type="email" name="Email" required />
                </p>
                <p>
                    <label>Passwort</label>
                    <input type="password" name="Passwort" required />
                </p>
                <p>
                    <label>Passwort wiederholen</label>
                    <input type="password" name="Passwort2" required />
                </p>
                <p>
                    <button type="submit" id="abschicken">Abschicken</button>
                </p>
            </form>
        </fieldset>
    </div>

    <div style="height: 50px;padding:10px;">
        <?php

        error_reporting(0);
              #SQL-Daten
                $Servername = "localhost";
                $User = "USER367585_fee";
                $UserPW = "DiesIstEinStarkesPasswort";
                $Datenbank = "db_367585_2";
                
                $connection = new mysqli($Servername, $User, $UserPW, $Datenbank);
        
                if($connection->connect_error) echo "<p>Fehler bei dem Verbinden mit der Datenbak.<br>Versuchen Sie es später erneut!</p>";
        
              #PHP-Daten
                $Benutzername = $_POST['Benutzername'];
                $Passwort = $_POST['Passwort'];
                $Passwort2 = $_POST['Passwort2'];
                $Email = $_POST['Email'];
                
                $sql1 = "SELECT * FROM login";
                $ID = $connection->query($sql1);
                $ID = $ID->num_rows;
                $ID = $ID + 1;
        
           
                
                $sql2 = "INSERT INTO login VALUES($ID, '$Benutzername', '$Passwort')";
                $sql3 = "INSERT INTO mitglieder(Login_ID, Email) VALUES($ID, '$Email')";
                $sql4 = "SELECT Benutzername FROM login WHERE Benutzername='$Benutzername'";
                $sql5 = "DELETE FROM login WHERE ID=$ID";
                $sql6 = "DELETE FROM mitglieder WHERE Login_ID=$ID";
                
                $REsql4 = $connection->query($sql4);
                
                $Anfrage2 = FALSE;
                $Anfrage3 = FALSE;
    
              
   
               
                #Registrierung
                
                if(isset($_POST['Benutzername'])&& isset($_POST['Passwort'])&& isset($_POST['Passwort2']) && isset($_POST['Email'])){
                
                
                
                if($Passwort == $Passwort2){
                    if($REsql4->num_rows > 0)echo "<p>Benutzername vergeben</p>";
                    else{
                        
                        
                        if($connection->query($sql2) === TRUE){
                        
                        $Anfrage2 = TRUE;
                        }
                        else echo "<p>Connection 1 failed</p>";
                        
                        if($connection->query($sql3) === TRUE){
                        
                        $Anfrage3 = TRUE;
                        }
                        else echo "<p>Connection 2 failed</p>";
    
                        
                    }
                    
                    
                }
                else{
                    echo "<p>Unterschiedliche Passwörter eingegeben</p>";
                }
                
                if($Anfrage2 == TRUE && $Anfrage3 == TRUE) echo "<p>Registrierung erfolgreich</p>";
                else{
                    echo "<p>Registrierung fehlgeschlagen</p>";
                    $connection->query($sql5);
                    $connection->query($sql6);
                    
                    
                } 
                
                }
    
                
                
             
                
                
                $connection->close();
        
?>
    </div>

</body>

<div style="background-color: rgba(45, 45, 45, 0.7); margin-top: 20px; height:30px">
    <a href="impressum.html" style="margin-top: 10px;font-family: bangers;font-size: 18pt" id="nava">Impressum</a>
</div>

</html>
