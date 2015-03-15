# Inštalačná príručka k systému Gumkáčik #
## 1.	Požiadavky na inštaláciu ##
Pre nainštalovanie je potrebné mať server, na ktorom beží nasledovné:
  * Apache Server
  * PHP 5.4 alebo vyššie
  * MySql
  * PhpMyAdmin (odporúča sa na import a export údajov)
## 2.	Proces inštalácie: ##
### 2.1.	Krok 1 ###
Do koreňového adresára serveru pre webové dokumenty nahráme všetky súbory systému.
### 2.2.	Krok 2 ###
V súbore protected/config/main.php nastavíme prístupové údaje k databáze (riadky 73 - 79):
```
  'connectionString' => 'mysql:host=localhost;dbname=tis',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
```
Základné nastavenia zodpovedajú  užívateľovi root s prázdnym heslom. Toto nastavenie sa však z bezpečnostných dôvodov neodporúča.
### 2.3.	Krok 3 ###
V súbore protected/config/main.php nastavíme adresu použitú ako odosielateľa mailov (riadok 111):
```
'adminEmail' => 'webmaster@example.com',
```
### 2.4.	Krok 4 ###
Do MySql importujeme skript sql/localhost.sql . Toto vytvorí prázdnu databázu a potrebné štruktúry.
### 2.5.	Krok 5 ###
V MySql do databázy ‘tis’ importujeme skript sql/localhost.sql . Toto vytvorí užívateľa admin s heslom admin.

Týmto je proces inštalácie dokončený.