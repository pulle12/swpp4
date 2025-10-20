<?php
require "lib/func.inc.php";

$id = $_GET['id'] ?? 0;
$users = getAllData();
$userDetail = null;

foreach ($users as $user) {
    if ($user['id'] == $id) {
        $userDetail = $user;
        break;
    }
}

if (!$userDetail) {
    echo "<div class='container mt-5'><h1>Benutzer nicht gefunden!</h1></div>";
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Benutzerdetails</title>
</head>
<body>
<div class="container">
    <h1 class="mt-5 mb-3">Benutzerdetails</h1>

    <table class="table table-bordered w50">
        <tr>
            <th>ID</th>
            <td><?= htmlspecialchars($userDetail['id']) ?></td>
        </tr>
        <tr>
            <th>Vorname</th>
            <td><?= htmlspecialchars($userDetail['firstname']) ?></td>
        </tr>
        <tr>
            <th>Nachname</th>
            <td><?= htmlspecialchars($userDetail['lastname']) ?></td>
        </tr>
        <tr>
            <th>E-Mail</th>
            <td><?= htmlspecialchars($userDetail['email']) ?></td>
        </tr>
        <tr>
            <th>Telefon</th>
            <td><?= htmlspecialchars($userDetail['phone']) ?></td>
        </tr>
        <tr>
            <th>Geburtsdatum</th>
            <td><?= htmlspecialchars($userDetail['birthdate']) ?></td>
        </tr>
        <tr>
            <th>Straße</th>
            <td><?= htmlspecialchars($userDetail['street']) ?></td>
        </tr>
    </table>

    <a href="index.php" class="btn btn-secondary mt-3">Zurück zur Übersicht</a>
</div>
</body>
</html>

