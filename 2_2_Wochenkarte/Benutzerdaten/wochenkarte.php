<?php
//Anzeige der aktuellen Tagesmenüs
//Direktes Öffnen des internen Bereichs nur möglich nach erfolgreicher Authentifikation, ansonsten erfolgt eine Weiterleitung auf die Startseite

session_start();
require_once 'Benutzer.php';
require_once 'CookieHelper.php';

if(!CookieHelper::isAllowed() || empty($_SESSION['logged_in'])) {
    header("Location: index.php");
    exit;
}

?>