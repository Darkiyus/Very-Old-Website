<!doctype html>

<html>

<head>
    <title>Muckibude Feenstaub | Login</title>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-cache">
    <link href="../style.css" rel="stylesheet" />
    <link type="image/png" rel="icon" href="../Bilder/unicorn.png" sizes="16x16" />

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
    <div id="willkommen" style="height: 300px">
        <fieldset>
            <legend>
                <h1>Login</h1>
            </legend>

            <form method="post">
                <p>
                    <label>
                        Benutzername
                    </label>
                    <input type=text name="Benutzername" required />
                </p>
                <p>
                    <label>
                        Passwort
                    </label>
                    <input type="password" name="Passwort" required />
                </p>
                <p>
                    <button type="submit" id="abschicken">Abschicken</button>
                </p>
            </form>
            <br>
            <a id="nava" href="reg.php" style="border: none;">Noch kein Mitglied?</a>
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

        $re = Login($Benutzername, $Passwort);


        switch($re){
            case 0: echo "<p>PHP wurde nicht ausgeführt</p>";
                break;
            case 1: echo "<p>Fehler, bei der Verbindung zur Datenbank</p>";
                break;
            case 2: echo "<p>Fehler, Benutzer nicht gefunden</p>";
                break;
            case 3: echo "<p>Fehler, Passwort falsch</p>";
                break;
            case 12: echo"<p>Login erfolgreich</p>";
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
