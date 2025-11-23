<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="" crossorigin="anonymous">

    <title>Wochenkarte</title>
</head>
<?php

session_start();

require_once 'Benutzer.php';
require_once 'CookieHelper.php';


$u = new Benutzer();
$message = '';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "benutzerdaten";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(CookieHelper::isAllowed()) {
    if (isset($_POST["login"])) {
        $u->setEmail( isset($_POST["email"]) ? $_POST["email"] : "");
        $u->setPassword( isset($_POST["password"]) ? $_POST["password"] : "");

        if ($u->login($conn)) {
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

    if (isset($_POST["create"])) {
        $u->setEmail( isset($_POST["email"]) ? $_POST["email"] : "");
        $u->setPassword( isset($_POST["password"]) ? $_POST["password"] : "");

        if ($u->validate()) {
            $u->save($conn);
        }
    }

    if(isset($_POST['rejectCookies'])) {
        CookieHelper::deleteCookie('cookieConsent', 1);
        header("Location: index.php");
    }
} else {
    echo '<div class="container" style="width: 20%">';
    echo '<h1 class="mt-5 mb-4 text-center">Wochenkarte</h1>';
    echo '<h2 class="mt-5 mb-4 text-center">Willkommen</h2>';
    echo '<h4 class="mt-5 mb-4 text-center">Diese Website verwendet Cookies.</h4>';
    echo '<form action="index.php" method="post">
        <input class="btn btn-primary w-100" type="submit" name="cookieConsent" value="Akzeptieren"/>
    </form>';
    echo '</div>';
    if (isset($_POST["cookieConsent"])) {
        CookieHelper::setCookie('cookieConsent', 1);
        CookieHelper::setCookie('user_ip', $_SERVER['REMOTE_ADDR']);
        CookieHelper::setCookie('lang', "de");
        CookieHelper::setCookie('user_agent', $_SERVER['HTTP_USER_AGENT']);
        header("Location: index.php");
    }
    exit;
}

//save besser verwenden (datenbank?)
//Mehrmaliges Öffnen des internen Bereichs muss mit einmaliger Authentifikation möglich sein
//Integration einer Cookie Abfrage auf der Startseite
//Datenbankanbindung für die User-Validierungs-Abfragen einrichten
?>
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
                               value="<?= isset($_POST['login']) ? htmlspecialchars($_POST['email']) : ''; ?>" placeholder="E-Mail eingeben" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control <?= $u->hasError('password') ? 'is-invalid' : '' ?>" id="password" name="password"
                               value="<?= isset($_POST['login']) ? htmlspecialchars($_POST['password']) : ''; ?>" placeholder="Passwort" required>
                    </div>
                    <button name="login" type="submit" class="btn btn-primary w-100">Anmelden</button>
                </form>
            </div>
            <p style="padding-bottom: 20px;"></p>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm p-4">
                <form method="POST" id="create_users" action="index.php">
                    <div class="mb-3">
                        <label for="email" class="form-label">Neuen Benutzer registrieren</label>
                        <input type="email" class="form-control <?= $u->hasError('email') ? 'is-invalid' : '' ?>" id="email" name="email"
                               value="<?= isset($_POST['create']) ? htmlspecialchars($_POST['email']) : ''; ?>" placeholder="E-Mail eingeben" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control <?= $u->hasError('password') ? 'is-invalid' : '' ?>" id="password" name="password"
                               value="<?= isset($_POST['create']) ? htmlspecialchars($_POST['password']) : ''; ?>" placeholder="Passwort" required>
                    </div>
                    <button name="create" type="submit" class="btn btn-primary w-100">Registrieren</button>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm p-4">
                <form method="POST" id="logout" action="index.php"">
                    <button name="rejectCookies" type="submit" class="btn btn-secondary w-100">Cookies nicht mehr zustimmen</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<script src="js/script.js" async defer></script>
</html>
