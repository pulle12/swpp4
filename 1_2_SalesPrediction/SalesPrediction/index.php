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

    $tv = "";
    $radio = "";
    $newspaper = "";

    ?>

    <form id="form_salespred" method="POST" action="index.php">
        <div class="row">
            <div class="col-sm-12 form-group">
                <label for="tv">TV</label>
                <input type="text" name="tv" class="form-control <?= isset($errors['tv']) ? 'is-invalid' : '' ?>"
                       value="<?= htmlspecialchars($tv) ?>"/>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 form-group">
                <label for="radio">Radio</label>
                <input type="text" name="radio" class="form-control <?= isset($errors['radio']) ? 'is-invalid' : '' ?>"
                       value="<?= htmlspecialchars($radio) ?>"/>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 form-group">
                <label for="radio">Newspaper</label>
                <input type="text" name="newspaper" class="form-control <?= isset($errors['newspaper']) ? 'is-invalid' : '' ?>"
                       value="<?= htmlspecialchars($newspaper) ?>"/>
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