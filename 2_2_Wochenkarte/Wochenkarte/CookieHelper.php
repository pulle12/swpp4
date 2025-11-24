<?php

class CookieHelper
{
    public static function isAllowed(): bool
    {
        if(isset($_COOKIE['cookieConsent'])) {
            return true;
        } else {
            Benutzer::logout();
            return false;
        }
    }

    public static function setCookie($name, $value) {
        setcookie($name, $value, time() + (86400 * 30), "/");
    }

    public static function deleteCookie($name, $value) {
        setcookie($name, $value, time() - (86400 * 30), "/");
    }
}