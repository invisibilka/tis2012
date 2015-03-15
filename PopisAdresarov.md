# Popis adresarov #

## Strucny popis adresarov, co si najdeme po zbehnuti checkoutu: ##
  * **/assets/** , sem nechodime, su tam nakopirovane rozne javascripty a podobne, sluzi pre framework ako optimalizacia zdrojov
  * **/css/** tu su hlavne css subory stranky
  * **/images/** prekvapivo obrazky :)
  * **/protected/** najdolezitejsi adresar, tuna bude nas kod, budem sa mu venovat zvlast nizsie
  * **/themes/** volitelny adresar na temy, na to asi cas nebudeme mat, staci nam jeden styl takze pre nas zbytocne
  * **/yii/** tu je ulozeny framework, tu nic nemenime, chodime sem len so zaujmu, ked nam nestaci oficialna dokumentacia a chceme sa pozriet radsej na kod.

  * ndex.php a index-test.php nechavame tak, je tam len inicializacny kod pre framework

## /protected adresar ##
tu je toho vela, ale co nas zaujima su 4 veci:

  * **/config/main.php** tu nastavime pripojenie k databaze a mame ho k dispozicii vsade
  * **/controlles/SiteController.php** tu je hlavne aplikacna logika, tu to bude plne cyklov / ifov a proste toho "zaujimaveho" kodu, tu sa urcuje co sa vykona ked je zadana adresa do prehliadaca actionIndex reprezentuje /index , actionHome by bolo /home atd, mapuje to za nas framework automaticky akonahle vytvorime v tejto triede funkciu ktora zacina slovom action. Kazda akcia by mala koncit volanim $this->render, kde je prvym parametrom nazov subora bez pripony v adresary views/nazovControllera/ , druhy je mapa (v php obycajne stringami indexovane pole ) nazov=>hodnota, kde si posielame premenne
  * **/models/** tu pride trieda za kazdu tabulku v databaze (Okrem N:M relacnych tabuliek, to je zbytocne), definuju v nej napr. pravidla validacie, vztahy medzi tabulkami (joiny) a pod. Tento kod je do znacnej miery copy/paste dokonca framework obsahuje aj generator, ukazku commitnem neskor.

Tiez sa sem davaju druhe typu modelov a to su modely formularov, kazdy formular ktory neposiela data priamo do databazy by mal mat zvlast model. Takych bude malo, ale napriklad Login Form / Password Reset Form, je toho prikladom. Resp vsetko co nie je vernym obrazom nejakej tabulky.
Vacsinou "nudny" kod..

  * **/views/** , je tu:
    * layouts/ to je hlavny layout stranky, tj ak ste strateny a hladate kde je vlastne < html > tag, tak je to tu v main.php :) , vsetko ostatne co vygenerujeme sa include do tohto layoutu. Layout sa da prepnut na iny v Controllery prostym nastavenim $this->layout = "inyLayout"; , kde inyLayout je subor v tomto adresary
  * **/site/** tu ma kazdy Controller svoj adresar v ktorom su jednotlive "views", tj to co sa realne zobrazi pouzivatelovi, vid Controller odsek. Uz ziadne triedy, len klasicke php. Tuna je teda "skaredy" kod, tj html zmiesane s php, javascriptom atd. Daju sa tu robit dost skarede veci, ale snad sa tomu vyhneme :)

Ok, to by asi stacilo, nabuduce k databaze / testom / uvidime ako to pojde

Kam dalej: [Modely](Modely.md)


---

Autor: Vladimir Jurenka