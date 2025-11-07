<?php

use models\GradeEntry;

session_start();

require_once './models/GradeEntry.php';

$e = new GradeEntry();
$message = '';

if (isset($_POST["submit"])) {
    $e->setName( isset($_POST["name"]) ? $_POST["name"] : "");
    $e->setEmail( isset($_POST["email"]) ? $_POST["email"] : "");
    $e->setExamDate( isset($_POST["examDate"]) ? $_POST["examDate"] : "");
    $e->setGrade( isset($_POST["grade"]) ? $_POST["grade"] : "");
    $e->setSubject( isset($_POST["subject"]) ? $_POST["subject"] : "");

    if ($e->validate()) {
        $e->save();
        $message = "<p class='alert alert-success'>Die eingegebenen Daten sind in Ordnung!</p>";
    } else {
        $message = "<div class='alert alert-danger'><p>Die eingegebenen Daten sind fehlerhaft!</p><ul>";
        foreach ($e->getErrors() as $key => $value) {
            $message .= "<li>" . $value . "</li>";
        }
        $message .= "</ul></div>";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Notenerfassung 2.0</title>

    <script type="text/javascript" src="js/index.js"></script>
</head>
<body>
<div class="container">
    <h1 class="mt-5 mb-3">Notenerfassung</h1>

    <?= $message ?>

    <form id="form_grade" method="POST" action="index.php">
        <div class="row">
            <div class="col-sm-6 form-group">
                <label for="name">Name*</label>
                <input type="text" name="name" class="form-control <?= $e->hasError('name') ? 'is-invalid' : '' ?>"
                       maxLength="20" required value="<?= htmlspecialchars($e->getName()) ?>"/>
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">E-Mail</label>
                <input type="text" name="email" class="form-control <?= $e->hasError('email') ? 'is-invalid' : '' ?>"
                       value="<?= htmlspecialchars($e->getEmail()) ?>"/>
            </div>
        </div>

        <div class="row">

            <div class="col-sm-4 form-group">
                <label for="subject">Fach*</label>
                <select name="subject" class="custom-select <?= $e->hasError('subject') ? 'is-invalid' : '' ?>"
                        required>
                    <option value="" hidden>- Fach auswählen -</option>
                    <option value="m" <?php if ($e->getSubject() == "m") echo "selected='selected'"; ?>>Mathematik</option>
                    <option value="d" <?php if ($e->getSubject() == "d") echo "selected='selected'"; ?>>Deutsch</option>
                    <option value="e" <?php if ($e->getSubject() == "e") echo "selected='selected'"; ?>>Englisch</option>
                </select>
            </div>

            <div class="col-sm-4 form-group">
                <label for="grade">Note*</label>
                <input type="number" name="grade"
                       class="form-control <?= $e->hasError('grade') ? 'is-invalid' : '' ?>" min="1" max="5" required
                       value="<?= htmlspecialchars($e->getGrade()) ?>"/>
            </div>

            <div class="col-sm-4 form-group">
                <label for="examDate">Prüfungsdatum</label>
                <input type="date" name="examDate"
                       class="form-control <?= $e->hasError('examDate') ? 'is-invalid' : '' ?>" required
                       onchange="validateExamDate(this)" value="<?= htmlspecialchars($e->getExamDate()) ?>"/>
            </div>
        </div>

        <div class="row mt-3">

            <div class="col-sm-3 mb-3">
                <input type="submit" name="submit" class="btn btn-primary btn-block" value="Speichern">
            </div>

            <div class="col-sm-3">
                <a href="index.php" class="btn btn-secondary btn-block">Löschen</a>
            </div>
        </div>
    </form>

    <h2 class="mt-3">Noten</h2>

    <div id="grades">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>E-Mail</th>
                    <th>Prüfungsdatum</th>
                    <th>Fach</th>
                    <th>Note</th>
                </tr>
            </thead>
            <tbody>
            <?php

            $grades = GradeEntry::getAll();

            foreach($grades as $g) {
                echo "<tr>";
                echo "<td>" . $g->getName() . "</td>";
                echo "<td>" . $g->getEmail() . "</td>";
                echo "<td>" . $g->getExamDateFormatted() . "</td>";
                echo "<td>" . $g->getSubjectFormatted() . "</td>";
                echo "<td>" . $g->getGrade() . "</td>";
                echo "</tr>";
            }

            ?>
            </tbody>
        </table>
    </div>
    <?php
    if (count($grades) > 0) {
    ?>
    <form action="clear.php" method="post">
        <input type="submit" name="clear" class="btn btn-danger" value="Alle Noten löschen"/>
    </form>
    <?php
    }
    ?>
</div>

</body>
</html>