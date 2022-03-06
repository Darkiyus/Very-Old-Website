<!doctype html>

<html>

<head>
    <title>Muckibude Feenstaub | BMI Rechner</title>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta name="viewport" content="initial-scale=1.0">
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



    <div style="background-color: rgba(45, 45, 45, 0.7);
    margin-top: 80px; height: 80px;">

        <h1>Der kluge BMI-Rechner, der dich über deinen Beitrag informiert!</h1>

    </div>

    <div style="background-color: rgba(45, 45, 45, 0.7);
    margin-top: 20px; height: 340px;">
        <form method="post">
            <fieldset>
                <legend>
                    <h1>BMI-Rechner</h1>
                </legend>

                <p>
                    <label>
                        <input type="radio" value="m" name="Geschlecht" required />Männlich
                    </label>

                    <label>
                        <input type="radio" value="w" name="Geschlecht" required />Weiblich
                    </label>

                </p>
                <p>
                    <label>Alter</label>
                    <input type="number" min="12" max="99" step="1" name="Alter" />
                </p>
                <p>
                    <label>Größe (in cm)</label>
                    <input type="number" min="50" max="300" step="1" name="Groesse" required />

                </p>
                <p>
                    <label>Gewicht (in kg)</label>
                    <input type="number" min="10" max="1000" step="0.01" name="Gewicht" required />
                </p>
                <p>
                    <button id="abschicken" type="submit">Absenden</button>
                </p>

            </fieldset>
        </form>


    </div>


    <div style="background-color: rgba(45, 45, 45, 0.7);
    margin-top: 20px; height: 180px;">

        <fieldset style="height: 130px;text-align: center;">
            <legend>
                <h1>Ergebnis</h1>
            </legend>

            <?php
                include('MFH.php');
                error_reporting(0);

                if(isset($_POST['Gewicht'])){

                    $Alter = $_POST['Alter'];
                    $Gewicht = $_POST['Gewicht'];
                    $Geschlecht = $_POST['Geschlecht'];
                    $Groesse = $_POST['Groesse'];

                    $BMI = bmi($Groesse, $Gewicht);
                    $Beitrag = Jahresbeitrag($Geschlecht, $Groesse, $Gewicht);

                    echo "<p>Dein BMI beträgt: <font id=pink>$BMI</font> </br> Somit würde dein Jahresbeitrag <font id=pink>$Beitrag € </font>betragen!</p>";

                }
                else echo "<p>Noch kein Ergebnis vorhanden</p>";
?>
        </fieldset>
    </div>
</body>

<div style="background-color: rgba(45, 45, 45, 0.7); margin-top: 20px; height:30px">
    <a href="../impressum.html" style="margin-top: 10px;font-family: bangers;font-size: 18pt" id="nava">Impressum</a>
</div>

</html>
