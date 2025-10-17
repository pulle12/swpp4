<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>

<div class="container">
    <h1 class="mt-5 mb-3">Sales Prediction</h1>
    <?php

    require "lib/func.inc.php";

    // Initialisierung der Variablen
    $tv = "";
    $radio = "";
    $newspaper = "";

    if (isset($_POST["submit"])) {
        $tv = isset($_POST["tv"]) ? $_POST["tv"] : "";
        $radio = isset($_POST["radio"]) ? $_POST["radio"] : "";
        $newspaper = isset($_POST["newspaper"]) ? $_POST["newspaper"] : "";

        if (validate($tv, $radio, $newspaper)) {
            echo "<p class='alert alert-success'>Die eingegebenen Daten sind in Ordnung!</p>";
        } else {
            echo "<div class='alert alert-danger'><p>Die eingegebenen Daten sind fehlerhaft!</p><ul>";

            foreach ($errors as $key => $value) {
                echo "<li>" . $value . "</li>";
            }
            echo "</ul></div>";
        }

        $data = array(
                "tv" => $tv,
                "radio" => $radio,
                "newspaper" => $newspaper
        );
        $json_data = json_encode($data);
        $url = "http://127.0.0.1:5000/predict";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        $response = curl_exec($ch);
        if ($response === false) {
            $err = curl_error($ch);
            curl_close($ch);
            die("cURL Fehler: $err");
        }
        curl_close($ch);
        $response_data = json_decode($response, true);
        echo "<b>Predicted Sales: </b>" . round($response_data["predicted_sales"], 1);

    }

    ?>

    <form id="form_salespred" method="POST" action="index.php">
        <div class="row mt-3">
            <div class="col-sm-12 form-group">
                <label for="tv">TV</label>
                <input type="number" name="tv" class="form-control <?= isset($errors['tv']) ? 'is-invalid' : '' ?>"
                       value="<?= htmlspecialchars($tv) ?>" min=1 required/>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-12 form-group">
                <label for="radio">Radio</label>
                <input type="number" name="radio" class="form-control <?= isset($errors['radio']) ? 'is-invalid' : '' ?>"
                       value="<?= htmlspecialchars($radio) ?>" min=1 required/>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-12 form-group">
                <label for="radio">Newspaper</label>
                <input type="number" name="newspaper" class="form-control <?= isset($errors['newspaper']) ? 'is-invalid' : '' ?>"
                       value="<?= htmlspecialchars($newspaper) ?>" min=1 required/>
            </div>
        </div>

        <div class="row mt-3">

            <div class="col-sm-3 mb-3">
                <input type="submit" name="submit" class="btn btn-primary btn-block" value="Vorhersagen">
            </div>

            <div class="col-sm-3">
                <a href="index.php" class="btn btn-secondary btn-block" role="button">Löschen</a>
            </div>
        </div>
    </form>
</div>

</body>
</html>