Tu su controllery, nachadza sa v nich aplikacna logika
kazdy nich je dostupny na adrese /_C_ vtedy a len vtedy ked existuje subor /protected/controllers/_C_Controller.php

StudentListController
zmeny:
actionImport -> zlucene s actionUpdate
nove akcie:
actionFind -> zoznam zoznamov studentov
actionRemoveStudent -> odoberie studenta zo zoznamu

TaskController
zmeny:
actionAddComment -> zlucene a actionView
filterAccessControl -> kontrola pristupu presunuta do nadtriedy Controller
actionFind -> rozdelena na actionMy a actionPublic, prva zobrazuje moje ulohy, druha verejne od vsetkych ucitelov


TestController
zmeny:
filterAccessControl -> kontrola pristupu presunuta do nadtriedy Controller
nove akcie:
actionPreview -> zobrazi nahlad pisomky pred tlacou
actionAjaxTasks -> zobrazi vypis uloh v teste
actionAjaxAddToTest -> pridalu ulohu do testu
actionAjaxRemoveFromTest -> odoberie ulohu z testu
actionAjaxMove -> zmeni poradie ulohy v teste
actionAjaxRename -> premenuje pisomku

UserController:
nove akcie:
actionRegister -> registracia pomocou odkazu z mailu
actionFind -> zoznam uzivatelov, len rpe administratora
accessRules -> definuje verejne akcie, (prihlasovanie) a registraciu z mailu