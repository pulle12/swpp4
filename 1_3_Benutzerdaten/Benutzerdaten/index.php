<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="" crossorigin="anonymous">

    <title>Benutzerdaten</title>
</head>
<body>

<div class="container">
    <h1 class="mt-5 m-3">Benutzerdaten anzeigen</h1>
    <div class="row m-3 align-items-center">
        <label for="suche" class="col-sm-1 col-form-label">Suche:</label>
        <div class="col-sm-3">
            <input type="text" id="suche" name="suche" class="form-control" required />
        </div>
        <div class="col-sm-auto">
            <button type="button" class="btn btn-primary me-2" id="anzeigen">Suchen</button>
            <button type="button" class="btn btn-secondary" id="leeren">Leeren</button>
        </div>
    </div>

    <?php

    require "lib/func.inc.php";



    ?>


</div>

</body>
</html>