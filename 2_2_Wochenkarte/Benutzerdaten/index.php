<?php

session_start();

require_once 'Benutzer.php';
require_once 'CookieHelper.php';


$u = new Benutzer();
$message = '';

if(CookieHelper::isAllowed()) {
    if (isset($_POST["submit"])) {
        $u->setEmail( isset($_POST["email"]) ? $_POST["email"] : "");
        $u->setPassword( isset($_POST["password"]) ? $_POST["password"] : "");

        if ($u->validate()) {
            $u->save();
            $message = "<p class='alert alert-success'>Die eingegebenen Daten sind in Ordnung!</p>";
            header("Location: wochenkarte.php");
            exit();
        } else {
            $message = "<div class='alert alert-danger'><p>Die eingegebenen Daten sind fehlerhaft!</p><ul>";
            foreach ($u->getErrors() as $key => $value) {
                $message .= "<li>" . $value . "</li>";
            }
            $message .= "</ul></div>";
        }
    }
} else {
    // Cookie-Banner anzeigen
    echo '<h1 class="mt-5 mb-4 text-center">Wochenkarte</h1>';
    echo '<h2 class="mt-5 mb-4 text-center">Willkommen</h2>';
    echo '<h4 class="mt-5 mb-4 text-center">Diese Website verwendet Cookies.</h4>';
    echo '<form action="index.php" method="post">
        <input type="submit" name="cookieConsent" value="Akzeptieren"/>
    </form>';
    if (isset($_POST["cookieConsent"])) {
        CookieHelper::setCookie('cookieConsent', 1);
    }
    exit;
}

//Mehrmaliges Öffnen des internen Bereichs muss mit einmaliger Authentifikation möglich sein
//Integration einer Cookie Abfrage auf der Startseite
//Datenbankanbindung für die User-Validierungs-Abfragen einrichten
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

    <?= $message ?>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-sm p-4">
                <form method="POST" id="form_users" action="index.php">
                    <div class="mb-3">
                        <label for="email" class="form-label">Bitte anmelden</label>
                        <input type="email" class="form-control <?= $u->hasError('email') ? 'is-invalid' : '' ?>" id="email" name="email"
                               value="<?= htmlspecialchars($u->getEmail()) ?>" placeholder="E-Mail eingeben" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control <?= $u->hasError('password') ? 'is-invalid' : '' ?>" id="password" name="password"
                               value="<?= htmlspecialchars($u->getPassword()) ?>" placeholder="Passwort" required>
                    </div>
                    <button name="submit" type="submit" class="btn btn-primary w-100">Anmelden</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<script src="js/script.js" async defer></script>
</html>
