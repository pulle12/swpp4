<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Notenerfassung</title>

    <script type="text/javascript" src="js/index.js"></script>
</head>
<body>
<div class="container">
    <h1 class="mt-5 mb-3">Notenerfassung</h1>

    <form id="form_grade" method="POST" action="index.php">
        <div class="row">
            <div class="col-sm-6 form-group">
                <label for="name">Name*</label>
                <input type="text" name="name" class="form-control" checked="checked" maxLength="20" required/>
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">E-Mail</label>
                <input type="text" name="email" class="form-control" checked="checked"/>
            </div>
        </div>

        <div class="row">

            <div class="col-sm-4 form-group">
                <label for="subject">Fach*</label>
                <select name="subject" class="custom-select" required>
                    <option>Mathematik</option>
                    <option>Deutsch</option>
                    <option>Englisch</option>
                </select>
            </div>

            <div class="col-sm-4 form-group">
                <label for="grade">Note*</label>
                <input type="number" name="grade" class="form-control" checked="checked" min="1" max="5" required/>
            </div>

            <div class="col-sm-4 form-group">
                <label for="examDate">Prüfungsdatum</label>
                <input type="date" name="examDate" class="form-control" checked="checked" required/>
            </div>
        </div>

            <div class="row mt-3">

                <div class="col-sm-3 mb-3">
                    <input type="submit" name="submit" class="btn btn-primary btn-block" value="Validieren">
                </div>

                <div class="col-sm-3">
                    <a href="index.php" class="btn btn-secondary btn-block" role="button">Löschen</a>
                </div>
            </div>
    </form>
</div>

</body>
</html>