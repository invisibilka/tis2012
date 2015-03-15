# Controllery a CRUD operacie s modelmi #

Ako priklady modelov budem pouzivat triedy Tasks, Users z nasho projektu.

## CREATE: ##
### Vytvorenie noveho modelu: ###
```
$model = new Tasks();
$model->name = 'Moja prva uloha'; //priklad nastavenie atribtutu
...nastavime dalsie atributy....
$model->save();
```

Tu je dolezite, ze save je mozne spustat s nepovinnym parametrom (boolean) udavajucim, ci sa ma pred INSERT prikazdom skontrolovat ci je model validny. Defaultne sa to kontrolouje. Co to znamena?

V modeli sme doteraz vzdy pisali prazdnu funkciu rules().
Tu budeme neskor zadavat podmienky validacie. To znamena, ktore polozky su nutne, aku maju ktore maximalnu dlzku, aku je dirmat datumu, kde treba ako vstup cislo, kde treba mat cele cislo, atd.

Funkcia save nam vracia boolean, hovoriaci ci sa dotaz uspesne spustil = presiel validaciou + nenastal ziaden sql error (ak mame spravne urobene rules, nie je dovod aby nastal).

Treba tiez povedat, ze hned po save sa nam aktualizuju vsetky atributy modelu, teda mozme si hned jednoducho zistit ake `id` bolo zaznamu pridelene:
```
$model->id;
```

## READ: ##
Najcastejsie budeme vyhladavat podla primarneho kluca, co je vo vsetkych nasich tabulkach polozka 'id'. Primarny kluc nam vzdy pride ako GET parameter (kto si nepamata , GET parametre su polozky v url za ? , tj priklad: gumkaci.com/tasks/view?id=123 , GET parameter `id` , hodnota 123).

Podla primarneho kluca najdeme model volanim funkcie findByPk($id).

### Priklad: ###
```
$id = Yii::app()->request->getParam('id');
$model = Tasks::model()->findByPk($id);
if($model){
//zobraz model cez $this->render

}

//prislo neplatne id => zobraz warning, alebo bielu stranku, ak sme lenivi
```

### Trosku vysvetlenie: ###
**Yii::app()->request->getParam** je ziskanie get parametra teda vrati nam to v podstate to iste co $_GET['id']. Preco to pouzivat? Ma to niekolko vyhod, najpodstatnejsia, ze nam to vrati NULL, ak parameter nebol poslany, zatialco $_GET by spadol na neplatny index (museli by sme testovat na isset).

If je dolezity, kedze polozka s danym id v databaze nemusi existovat, vtedy nam _findByPk_ vrati NULL a to osetruje tento if.

### Jednoduche hladanie cez relacie: ###
Predstavne si, ze chceme najst vsetky ulohy, ktore vytvoril user s id = 456.

Vdaka tomu, ze sme napisali relaciu 'tasks' v modeli Users, mozeme k nim pristupovat priamo cez tohto usera.
```
$user = Users::model()->findByPk('456');
foreach( $user->tasks as $task ){
//$task je uz priamo model triedy Tasks
}
```

### Jednoduche hladanie bez relacii: ###
Predstavme si, ze hladame vsetky verejne ulohy (polozka is\_public ma hodnotu 1 ), s hodnotenim nad 3.0.
Na vyhladadavnie viacerych poloziek sa pouziva funkcia _findAll_:
  * bez parametrov: najde vsetky polozky v databaze
  * jeden parameter: vysvetlim neskor
  * dva prametre: 1. je WHERE cast sql prikazu, druhy su paramatre, vysvetlim po priklade:

#### Priklaz vyzera nasledovne: ####
```
//tieto dve veci asi budu malokedy konstatne, takze premenne, nech je to lepsi priklad
$is_public = 1; 
$rating = 3.0;

$tasks = Tasks::model()->findAll('is_public = :is_public AND rating >= :rating',
array(
':is_public' => $is_public,
':rating' = > $rating;
)
);
foreach($tasks as $model){
//kazdy model opat uz instancia Tasks
}
```

#### Vysvetlenie: ####
Tie veci za : su parametre SQL prikazu. Mohli by sme napisat:
```
findAll("is_public = $is_public AND rating >= $rating")
```
a preslo by to, ale urcite je vam znamy pojem SQL injection a prave preto to piseme tym dlhsim sposobom, tam za nas framework parametre osetri, mozeme byt pokojni a hlavne nemusime volat kadejake _mysql\_real\_escape_ a podobne.

### Zlozitejsie hladanie: ###
Predstavme si, ze mame nejake komplikovanjsie podmienky.
Kto mal oracle, tak groupovanie, alebo agregacne funkcie.
Alebo chceme spravit nejaky komplikovany join.

Co sa tyka nasho projektu, tak by sme naprkliad mohli chciet pouzit klauzulu LIMIT, teda obmedzit pocet vysledkov, alebo ich zoradit.

Na skontruovanie zlozitejsieho SQL prikazu sluzi trieda _CDBCriteria_.
Ma metody, napriklad _addCondition()_, vdaka ktorych vieme pridat podmienky, a tiez verejne premenne _'group'_ , _'join'_ , _order_ a okrem ineho aj nami zatial hypoteticky potrebovany _'limit'_.

Parametre nastavujeme cez verejnu premennu params (pole).
Takze co ak by sme chceli 10 uloh s najlepsim hodnotenim?
```
$max = '10';

$criteria = new CDBCritera();
$criteria->limit = ':limit';
$criteria->order= '`rating` DESC';
$criteria->params = array(':limit' => $max);

$tasks = Tasks::model()->findAll($criteria);
foreach($tasks as $model){
//kazdy model opat uz instancia Tasks
}
```

#### Vysvetlenie: ####
_findAll_ s jednym parametrom berie objekt typu _CDBCriteria_. Pri limite asi budeme pouzivat nami zvolenu konstantu, takze by sme sa realne zaoblisli bez parametrizovania, tu som to dal ako demonstraciu.

### Najzlozitejsie vyhladavanie: ###
Existuje trieda _CActiveDataProvider_ http://www.yiiframework.com/doc/api/1.1/CActiveDataProvider/
Pouziva sa v spojeni s criteriami a ma jedno specialne vyuzite a to ze velmi dobre zvlada strankovanie. Rozumie si taktiez s _CGridView_, ktory dokaze filtrovat.

Tieto dve triedy nam dokazu zabezpecit strankovane a filtrovane zoznamy poloziek s minimom namahy ( ale treba pochopit este par veci). Toto vyuzijme vsade tam, kde budu zoznamy, ci uz uloh alebo ziakov.

Nanestastie pouzitie _CGridView_ by si vyzadovalo trosku dlhsi clanok. Rozpisem az budeme pisat tie jednotlive zoznamy, resp filtre.

Nejaky screen z webu ako to vyzera:
http://goo.gl/dwFXR

V screenshote je dolezita ta tabulka, to je gridview , vsimnite si filtre nad nou a pravy stlpec s buttonmi, dole je potom este prepinanie stranok.

## UPDATE: ##
Tak predstavme si, ze mame funkcny formular, ktory nam posiela data cez post:

K tym sa dostaneme surovo cez $_POST, ale predtym, nez zacneme aktualizovat model, musime si dat pozor na jednu vec._

Totiz je taka pekna 'feature' a to validacia ajaxom, ktora nas stoji +-4 riadky kodu na formular, ale vyzera to o vela lepsie, ked je to zapnute. Funguje to tak, ze nam posle $_POST request a pyta sa to napsat informacie o nevalidnych polozkach._

### Kompletny priklad editacie nejakej ulohy: ###
```
//co chceme editovat?
$id = Yii::app()->request->getParam('id');
$model = Tasks::model()->findByPk($id);
if ($model == NULL) {
//mozeme spravit nieco krajsie nez obycajne echo
echo 'invalid id';
exit;
}
//ajax validacia
if (isset($_POST['ajax']) && $_POST['ajax'] == 'Tasks') {
$model->setAttributes($_POST['Tasks']);
echo CActiveForm::validate($model);
Yii::app()->end();
}
//normalna validacia a ulozenie
if (isset($_POST['Tasks'])) {
$model->setAttributes($_POST['Tasks']);
if ($model->save()) {
//tu mozeme dat nejaky redirect a nie iba end (biela stranka)
Yii::app()->end();
}
}
//tu je samotny formulat, vsimnut si, ze ak nepresiel model->save(), 
//ma stale nastavene nove atributy, tj aj ked to validaciou nepreslo,
//uzviatel neprisiel o polozky co zadal
$this->render('edit', array(
'model' => $model
));
```

### Vysvetlenie: ###
Magicky riadkok je
```
$model->setAttributes($_POST['Tasks']);
```

Toto nam namapuje vsetky attributy z formulara na atributy modelu.
Dolezita poznamka, mapuje to len atributy, pre ktore existuju pravidla validacie, kedze mi ich zatial nemame, nenamapovalo by to zatial nic. Ako to obist, je zavolat to s dvoma prametrami, druhym 'false'. Tj:
```
$model->setAttributes($_POST['Tasks'], false);
```

Preco to tak je? Bezpecnost. Lebo inak by si 'sikovny' user mohol formular upravit a napriklad poslat na zmenu atribut persmissions (urcujuci ci je admin), alebo zmenit vlastnika nejakeho objektu ( pripadne zmenit idcko a tym menit rovno cudzi objekt ) a to by boli vsetko vazne zasahy do integrity systemu.

Ajax validacia, to je vzdy copy&paste, jediny menime nazov indexu Tasks a za nejaky iny model co potrebujeme.

Normalna validacia je uz celkom priamociara vec.

## DELETE: ##
To uz je to najlahsie:

Funkcia delete je analaogicka k funckii find, teda takisto vieme volat deleteByPk, delete cez kriteria, delete all alebo tento druhy sposob. (Najprv zistime ci taky prvok mame, ak ano, delete, ak nie mozme zobrazit warning)
```
$id = Yii::app()->request->getParam('id');
$model = Tasks::model()->findByPk($id);
if ($model) {
$model->delete();
}
else{
//warning, model sa nenasiel
}
```

---

Autor: Vladimir Jurenka