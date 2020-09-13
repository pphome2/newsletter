# Newletter

## Levelezőlistára jelentkezés, leiratkozás.

Fejlesztő: [pphome2](https:/github.com/pphome2)

**Aktuális verzió: -**

**Első megjelenés: 2018.**

A program fejlesztése befejeződött.
Hibajavítás nem várható.


A program a levelezőlistára jelentkezést teszi lehetővé.
Sagítségével egy kattintással le is lehet iratkozni.


Egyszerű:
- nem szükséges CMS a működéshez
- nincs külön felhasználókezelés, két felasználó jelszót tárol a `config` fájlban
- nem kell telepíteni
- nem használ SQL adatbázist
- használhat cookie-kat

### Telepítés

- felmásolni az összes fájlt a webserver megfelelő könyvtárába
- `config` könyvtár `config.php` fájlátnézése, a beállítások itt taláhatók
- írási jog kell a `config.php` fájlban megadott dokumentum tároló könyvtárra
- `config` könyvtárban találhatók a nyelvi fájlok, ha szükséges a módosítható


### Működés

Indítás:
- felhasználó: `index.html`
- adminisztráció: `admin.html`

