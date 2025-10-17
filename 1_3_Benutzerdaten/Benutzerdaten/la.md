# Lösungsansatz – Benutzerdaten suchen (PHP-Projekt)

## 1. Zielsetzung
Es soll eine Filter- und Anzeige-Funktion für Benutzerdaten entwickelt werden.  
Die Anwendung zeigt eine Übersicht aller Benutzer in Tabellenform und ermöglicht die Suche nach Namen oder E-Mail-Adresse.  
Daten stammen zunächst aus einem Array, später aus einer Datenbank.

---

## 2. Projektstruktur

| Datei | Zweck |
|-------|-------|
| `index.php` | Startseite mit Suchformular und Tabelle |
| `details.php` | Detailseite für Benutzerinformationen |
| `data.php` | Datenquelle (Array-Version) |
| `db.data.php` | Datenquelle (Datenbank-Version) |
| `functions.php` | Hilfsfunktionen (Formatierung, Sanitizing, URL-Aufbau) |
| `assets/` | Styles (Bootstrap, eigenes CSS) & Scripts (jQuery) |

---

## 3. Funktionsumfang

### Übersicht (index.php)
- Anzeige der wichtigsten Benutzerdaten in einer Tabelle:
    - Spalten: **Name (Vorname + Nachname)**, **E-Mail**, **Telefon**, **Geburtsdatum**, **Aktionen**
    - Zeilen abwechselnd farbig (Bootstrap `table-striped` oder eigene Klasse)
    - Datumsformat: `DD.MM.YYYY`
- Detail-Link:  
  `details.php?id=ID`  
  Beim Wechsel zur Detailseite sollen Suchparameter (`GET`) erhalten bleiben.
- Fehlermeldung, falls keine Treffer vorhanden.
- Responsives Design mit Bootstrap (`table-responsive`).

### Suchfunktion
- Eingabefeld für Namen oder E-Mail (Teilübereinstimmung ausreichend).
- Buttons:
    - **Suchen** (submit)
    - **Leeren** (setzt Filter zurück → lädt Seite ohne Suchparameter)
- Suchparameter werden per **GET** übergeben (z. B. `index.php?search=paul`).

### Detailseite (details.php)
- Übersichtliche Darstellung aller Benutzerdaten.
- Rück-Link zur Startseite mit Beibehaltung der Suchparameter: index.php?search=paul
- Fehlermeldung, wenn die ID ungültig oder nicht vorhanden ist.

---

## 4. Funktionen

### Datenfunktionen (in `data.php`)
- `function getAllData()`
- Gibt alle Datensätze zurück.
- `function getDataPerId($id)`
- Gibt den Datensatz mit der passenden ID zurück.
- `function getFilteredData($filter)`
- Durchsucht `firstname`, `lastname` und `email` nach Teilübereinstimmung.
- Case-insensitive Suche.

### Hilfsfunktionen (in `functions.php`)
- `formatDateToDDMMYYYY($date)` – formatiert Datum.
- `sanitizeOutput($string)` – schützt vor XSS.
- `buildQueryParams($allowedKeys)` – baut sichere URLs mit Whitelist der Parameter.

---

## 5. Validierung und Sicherheit
- Alle Ausgaben mit `htmlspecialchars()` escapen.
- IDs nur akzeptieren, wenn numerisch (`ctype_digit()`).
- GET-Parameter whitelisten (`search`, `id`).
- Bei Datenbank-Zugriff (später): **Prepared Statements** verwenden.
- Keine internen Fehlernachrichten an Benutzer ausgeben.

---

## 6. Zusatzaufgaben

### Zusatzaufgabe 1 – Suchparameter behalten
- Suchformular verwendet **GET**.
- Beim Aufruf von `details.php` aktuelle Suchparameter anhängen.
- Beim Zurück-Link (`index.php`) gleiche Parameter übernehmen.

### Zusatzaufgabe 2 – jQuery Live-Filter
- `input`-Event auf Suchfeld:
- Filtert Tabellenzeilen (`<tr>`) dynamisch nach Teilübereinstimmung in Name oder E-Mail.
- Kein Reload nötig.
- Debounce von ca. 200–300 ms einbauen.
- Funktioniert unabhängig vom Such-Button.

### Zusatzaufgabe 3 – Datenbankintegration
- `db.data.php` implementiert dieselben Funktionen wie `data.php`.
- Daten werden über PDO geladen.
- Suchanfrage:
```sql
SELECT * FROM user
WHERE firstname LIKE ? OR lastname LIKE ? OR email LIKE ?
```
(Prepared Statements mit `%search%`).

Datumsformatierung bleibt in PHP-Schicht.  
Verwendung von UTF8 empfohlen.

---

## 7. Design / UI

- Verwendung von **Bootstrap** für Layout und Responsivität.
- Formular oberhalb der Tabelle (Stack bei Mobile-Ansicht).
- Tabelle mit `table`, `table-striped`, `table-hover`.
- "Keine Einträge gefunden" → Hinweis über der Tabelle.
- Accessible Labels für Eingabefelder.
- `aria-live`-Region für dynamische Filtermeldung.

---

## 8. Test-Checkliste

| Testfall | Erwartetes Ergebnis |
|-----------|--------------------|
| Kein Filter gesetzt | Alle Benutzer werden angezeigt |
| Suchbegriff "ma" | Zeigt alle Benutzer mit "ma" im Namen oder E-Mail |
| Keine Treffer | Fehlermeldung „Keine Einträge gefunden“ |
| Klick auf Detail-Link | Öffnet Detailseite mit Benutzerinformationen |
| Klick auf „Zurück“ | Gelangt zur Startseite mit bestehendem Suchfilter |
| jQuery-Live-Filter aktiv | Tabelle filtert dynamisch beim Tippen |
| Responsives Verhalten | Tabelle auf Handy scrollbar, Layout bleibt sauber |
| Datenbank aktiv | Anzeige funktioniert, LIKE-Suche korrekt |
| Sicherheitsprüfung | XSS/SQL-Injection ausgeschlossen |

---

## 9. Erweiterungsmöglichkeiten

- **Pagination** für große Datensätze.
- **Sortierfunktion** (nach Name, Datum etc.).
- **CSV-Export** der Filterergebnisse.
- **Unit-Tests** für Datenfunktionen.
- **Mehrsprachigkeit** (z. B. Datumsausgabe nach Region).

---

## 10. Fazit

Der Lösungsansatz stellt eine **modulare**, **sicherheitsbewusste** und **erweiterbare Architektur** bereit,  
die sowohl als **Prototyp (Array-basiert)** als auch **produktiv (DB-basiert)** eingesetzt werden kann.

Der Code bleibt durch die **klare Trennung von Datenzugriff, Logik und Darstellung** wartbar und erweiterbar.

---

✅ **Tipp:**  
Wenn du möchtest, kann ich dir als Nächstes eine **Version mit Titelblatt und Projekt-Metadaten**  
(Autor, Firma, Version, Datum) generieren, damit du sie direkt als Projektdokumentation abgeben kannst.  
Möchtest du das?

