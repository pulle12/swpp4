<?php
$message = '';

session_start();
require_once 'Benutzer.php';
require_once 'CookieHelper.php';

if(!CookieHelper::isAllowed() || empty($_SESSION['logged_in'])) {
    header("Location: index.php");
    exit;
}

if(isset($_POST['logout'])) {
    Benutzer::logout();
    header("Location: index.php");
}

if(isset($_POST['rejectCookies'])) {
    CookieHelper::deleteCookie('cookieConsent', 1);
    header("Location: index.php");
}

?>
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
<body>
<div class="container">
    <h1 class="mt-5 mb-4 text-center">Wochenkarte</h1>

    <?= $message ?>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-sm p-4">
                <form method="POST" id="logout" action="wochenkarte.php"">
                    <button name="logout" type="submit" class="btn btn-primary w-100">Logout</button>
                    <button name="rejectCookies" type="submit" class="btn btn-secondary w-100">Cookies nicht mehr zustimmen</button>
                </form>
            </div>
            <!-- Anzeige der aktuellen Tagesmenüs -->
        </div>
    </div>
</div>
</body>
<script src="js/script.js" async defer></script>
</html>

