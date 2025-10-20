<?php
require __DIR__ . "/func.inc.php"; // Funktionen laden

// ID aus GET-Parameter holen
$id = $_GET['id'] ?? null;
if (!$id) {
    echo "Keine Benutzer-ID angegeben!";
    exit;
}

// Alle User laden
$users = getAllData();

// User anhand der ID finden
$user = null;
foreach ($users as $u) {
    if ($u['id'] == $id) {
        $user = $u;
        break;
    }
}

if (!$user) {
    echo "Benutzer nicht gefunden!";
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Benutzer Details</title>
</head>
<body>
<div class="container">
    <h1 class="mt-5 mb-3">Benutzer Details</h1>
    <table class="table table-bordered w50">
        <tr>
            <th>ID</th>
            <td><?= htmlspecialchars($user['id']) ?></td>
        </tr>
        <tr>
            <th>Vorname</th>
            <td><?= htmlspecialchars($user['firstname']) ?></td>
        </tr>
        <tr>
            <th>Nachname</th>
            <td><?= htmlspecialchars($user['lastname']) ?></td>
        </tr>
        <tr>
            <th>E-Mail</th>
            <td><?= htmlspecialchars($user['email']) ?></td>
        </tr>
        <tr>
            <th>Telefon</th>
            <td><?= htmlspecialchars($user['phone']) ?></td>
        </tr>
        <tr>
            <th>Geburtsdatum</th>
            <td><?= htmlspecialchars($user['birthdate']) ?></td>
        </tr>
        <tr>
            <th>Straße</th>
            <td><?= htmlspecialchars($user['street']) ?></td>
        </tr>
    </table>
    <a href="../index.php" class="btn btn-secondary">Zurück zur Übersicht</a>
</div>
</body>
</html>
