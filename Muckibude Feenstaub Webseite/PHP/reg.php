<!doctype html>

<html>

<head>
    <title>Muckibude Feenstaub | Registrierung</title>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-cache">
    <link href="../style.css" rel="stylesheet" />
    <link type="image/png" rel="icon" href="../Bilder/unicorn.png" sizes="16x16" />
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
                <td><img src="../Bilder/M11.png" style="width: auto; height: auto;" /></td>
                <td>
                    <nav>
                        <a href="../index.html" id='nava'>Startseite</a>
                        <a href="login.php" id='nava'>Login</a>
                        <a href="../game1.html" id='nava'>Spiel</a>
                        <a href="../Kurse.html" id='nava'>Kurse</a>
                        <a href="../Krafttraining.html" id='nava'>Krafttraining</a>
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
            include ('MFH.php');
            error_reporting(0);

            
            
            if(isset($_POST['Benutzername'])){
            
            #PHP-Daten
            $Benutzername = $_POST['Benutzername'];
            $Passwort = $_POST['Passwort'];
            $Passwort2 = $_POST['Passwort2'];
            $Email = $_POST['Email'];
                
            $re = Reg($Benutzername, $Email, $Passwort, $Passwort2);


            switch($re){
                case 0: echo "<p>PHP wurde nicht ausgeführt</p>";
                    break;
                case 1: echo "<p>Fehler, bei der Verbindung zur Datenbank</p>";
                    break;
                case 4: echo "<p>Fehler, Benutzername vergeben</p>";
                    break;
                case 5: echo "<p>Fehler, unterschiedliche Passwörter eingegeben</p>";
                    break;
                case 6: echo "<p>Fehler, Registrierung fehlgeschlagen</p>";
                    break;
                case 11: echo"<p>Registrierung erfolgreich</p>";
                    break;
            }
            }
        


        ?>
    </div>

</body>

<div style="background-color: rgba(45, 45, 45, 0.7); margin-top: 20px; height:30px">
    <a href="../impressum.html" style="margin-top: 10px;font-family: bangers;font-size: 18pt" id="nava">Impressum</a>
</div>

</html>
