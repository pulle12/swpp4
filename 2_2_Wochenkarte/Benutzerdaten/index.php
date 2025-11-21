<?php

$email = "";

$password = "";
//Anmeldeformular zur Benutzerauthentifikation
//Validierung der Zugangsdaten (mit Hilfe der Benutzer-Klasse) und Anzeige der Fehlermeldung
//Weiterleitung auf den internen Bereich nach erfolgreichem Login
//Direktes Öffnen des internen Bereichs nur möglich nach erfolgreicher Authentifikation, ansonsten erfolgt eine Weiterleitung auf die Startseite
//Mehrmaliges Öffnen des internen Bereichs muss mit einmaliger Authentifikation möglich sein
//Integration einer Cookie Abfrage auf der Startseite
?>
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
    <h1 class="mt-5 mb-4 text-center">Wochenkarte</h1>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-sm p-4">
                <form method="get" novalidate>
                    <div class="mb-3">
                        <label for="email" class="form-label">Bitte anmelden</label>
                        <input type="email" class="form-control" id="email" name="email"
                               value="<?= htmlspecialchars($email) ?>" placeholder="E-Mail eingeben" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="password" name="password"
                               value="<?= htmlspecialchars($password) ?>" placeholder="Passwort" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Anmelden</button>
                </form>
            </div>
        </div>
    </div>

    <table class="table table-striped table-bordered w50">
        <thead>
        <tr>
            <th>Name</th>
            <th>E-Mail</th>
            <th>Geburtsdatum</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['id']) ?></td>
                    <td>
                        <a href="lib/details.php?id=<?= $user['id'] ?>&suche=<?= urlencode($search) ?>">
                            <?= htmlspecialchars($user['firstname'] . ' ' . $user['lastname']) ?>
                        </a>
                    </td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td><?= htmlspecialchars($user['birthdate']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3" class="text-center">Keine Daten gefunden</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
