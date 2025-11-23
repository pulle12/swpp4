<?php

class CookieHelper
{
    public static function isAllowed(): bool
    {
        if(isset($_COOKIE['cookieConsent'])) {
            return true;
        } else {
            session_destroy();
            setcookie(session_name(), '', time() - 3600, '/');
            return false;
        }
    }

    public static function setCookie($name, $value) {
        setcookie($name, $value, time() + (86400 * 30), "/");
    }
}