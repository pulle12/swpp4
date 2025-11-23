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

    <table class="table table-bordered text-center mx-auto" style="max-width: 900px; background: #f7f7f7;">
        <thead>
        <tr>
            <th>Montag</th>
            <th>Dienstag</th>
            <th>Mittwoch</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <img src="img/montag.jpg" style="width:120px; height:100px;"><br>
            </td>
            <td>
                <img src="img/dienstag.jpg" style="width:120px; height:100px;"><br>
            </td>
            <td>
                <img src="img/mittwoch.jpg" style="width:120px; height:100px;"><br>
            </td>
        </tr>
        <tr>
            <th>Donnerstag</th>
            <th>Freitag</th>
            <th>Samstag</th>
        </tr>
        <tr>
            <td>
                <img src="img/donnerstag.jpg" style="width:120px; height:100px;"><br>
            </td>
            <td>
                <img src="img/freitag.jpg" style="width:120px; height:100px;"><br>
            </td>
            <td>
                <img src="img/samstag.jpg" style="width:120px; height:100px;"><br>
            </td>
        </tr>
        </tbody>
    </table>


    <h4 class="mt-5 mb-2 text-center">Ihre Login-Daten:</h4>
    <p class="mt-1 mb-0 text-center">E-Mail: <?= $_SESSION['email']?></p>
    <p class="mt-0 mb-0 text-center">Passwort: <?= $_SESSION['password']?></p>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-sm p-4">
                <form method="POST" id="logout" action="wochenkarte.php"">
                    <button name="logout" type="submit" class="btn btn-primary w-100">Logout</button>
                    <button name="rejectCookies" type="submit" class="btn btn-secondary w-100">Cookies nicht mehr zustimmen</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<script src="js/script.js" async defer></script>
</html>

