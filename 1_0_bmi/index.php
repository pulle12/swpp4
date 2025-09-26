<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mein erstes PHP_Skript</title>
</head>

<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Größe in m: <input type="text" name="groesse" required> <!-- required: client-seitige Validierung -->
    <br>
    Gewicht in kg: <input type="text" name="gewicht" max="150" required >
    <br>
    <input type="submit" value="Berechnen">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $groesse = (float)$_POST['groesse'];
    $gewicht = (float)$_POST['gewicht'];
    $bmi = $gewicht / ($groesse * $groesse);
    echo "Der BMI ist: " . $bmi;
    echo "<br>";
    if ($bmi < 18.5) {
        echo "Sie sind untergewichtig.";
    } else if ($bmi <= 24.9) {
        echo "Sie sind normalgewichtig.";
    } else if ($bmi <= 29.9) {
        echo "Sie sind übergewichtig.";
    } else if ($bmi <= 34.9) {
        echo "Sie haben Adipositas Grad I.";
    } else if ($bmi <= 39.9) {
        echo "Sie haben Adipositas Grad II.";
    } else if ($bmi >= 40.0) {
        echo "Sie haben Adipositas Grad III.";
    }
}
?>
</body>
</html>