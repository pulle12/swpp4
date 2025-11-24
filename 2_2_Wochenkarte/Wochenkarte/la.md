# Lösungsansatz – Wochenkarte (PHP-Prototyp)

## 1. Architektur

Die Anwendung ist in Darstellung und Logik getrennt.

### Komponentenstruktur

- index.php  
  Startseite mit Cookie-Abfrage und Login-Formular

- wochenkarte.php  
  Geschützter interner Bereich mit Anzeige der Menüs

- logout.php  
  Abmeldung und Session-Zerstörung

- classes/User.php  
  Beinhaltet die gesamte Authentifizierungslogik

- classes/CookieHelper.php  
  Verwaltung der Cookie-Zustimmung


## 2. Ablauf

### Startseite (index.php)
1. CookieHelper::isAllowed() prüfen
2. Falls false → Cookie-Formular anzeigen
3. Falls true → Login-Formular anzeigen
4. Nach POST:
    - User::get(email, password)
    - Wenn Objekt zurückgegeben:
        - $user->login()
        - Weiterleitung zu wochenkarte.php
    - Sonst Fehler anzeigen


### Interner Bereich (wochenkarte.php)
1. Cookie-Prüfung
2. User::isLoggedIn() prüfen
3. Bei Erfolg:
    - Anzeige der Wochenmenüs (Bootstrap Grid)
4. Logout-Button anzeigen


### Logout (logout.php)
1. Cookie-Prüfung
2. User::logout()
3. Redirect zu index.php


## 3. Klasse CookieHelper

Aufgaben:
- Prüfen ob Cookie gesetzt ist
- Setzen des Cookies bei Zustimmung

### Methoden:
- isAllowed() : bool
- setCookie() : void


## 4. Klasse User

### Attribute:
- email : string
- password : string
- errors : array

### Konstanten:
- VALID_EMAIL
- VALID_PASSWORD

### Methoden:
- __construct(email, password)
- validate() : bool
- login() : bool
- static get(email, password) : User|null
- static logout() : void
- static isLoggedIn() : bool


## 5. Validierung

- E-Mail: 5 – 30 Zeichen
- Passwort: 5 – 20 Zeichen
- Bei Fehlern Speicherung im errors-Array


## 6. Sicherheit & Erweiterbarkeit

- Session-basierte Authentifizierung
- Vorbereitete Struktur für spätere Datenbankintegration
- Saubere Trennung von Logik und UI
