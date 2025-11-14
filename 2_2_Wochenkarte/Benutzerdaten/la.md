# Lösungsansatz – Benutzerdaten suchen

## Ziel
Ein Prototyp zum Anzeigen und Filtern von Benutzerdaten soll erstellt werden.  
Die Daten werden zuerst aus einem Array geladen und später aus einer Datenbank.

---

## Aufbau
Das Projekt besteht aus einer Übersichtsseite mit allen Benutzern und einer Detailseite für einzelne Benutzer.

---

## Funktionen

### Benutzerübersicht
- Darstellung aller Benutzer in einer Tabelle
- Vor- und Nachname werden in einer gemeinsamen Spalte angezeigt (bedeutet vorname nachname verbinden)
- Jeder Benutzer hat einen Link zur Detailseite mit seiner ID
- Das Datum wird im Format **DD.MM.YYYY** angezeigt
- Die Tabellenzeilen sind abwechselnd farbig gestaltet
- Ein Eingabefeld ermöglicht die Suche nach Namen oder E-Mail
- Buttons zum **Suchen** und **Leeren** stehen zur Verfügung
- Wird kein Treffer gefunden, erscheint eine Fehlermeldung
- Die Seite ist **responsive** und nutzt ein Framework wie **Bootstrap**

---

### Detailseite
- Zeigt alle Daten eines Benutzers übersichtlich an
- Über einen **Zurück-Link** gelangt man wieder zur Übersichtsseite

---

### Zusatzaufgabe 1 ist auch integriert
- Suchparameter bleibt bestehen wenn man von der Detailseite auf die Hauptseite zurück geht.

## Funktionen im Hintergrund
- **getAllData()** liefert alle Benutzer
- **getDataPerId($id)** liefert die Daten eines bestimmten Benutzers
- **getFilteredData($filter)** liefert alle Benutzer, deren Name oder E-Mail den Suchbegriff enthält

---

## Design
- Verwendung von **Bootstrap** für ein modernes und responsives Layout
- Tabellen mit abwechselnden Farben für bessere Lesbarkeit
- Klare und einfache Struktur, damit der Code leicht verständlich bleibt

---

## Zielgruppe
Backend-Administratoren, die das CMS verwenden.  
Der Code soll übersichtlich, modern und nach gängigen Webstandards geschrieben sein.

---

## Ergebnis
Ein funktionierender Prototyp, der Benutzerdaten anzeigen und nach Namen oder E-Mail filtern kann.  
Der Prototyp kann später leicht in das CMS integriert werden.
