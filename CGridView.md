# Yii navod: CGridView, zaklady #
CGridView, ako napoveda nazov je tabulkove zobrazenie modelov, vhodne hlavne pre administracne rozhranie, alebo celkovo vsade, kde treba zobrazovat naraz velke mnozstvo dat v tabulkovom style.

CGridView je widget, co je v Yii terminologii menis samostatne fungujuci konfigurovatelny blok kodu, zahrnajuci vlastny mini controller a jeden - viacero viewov.

Widget je vzdy vygenerovany az vo view-e, volanim $this->widget s dvoma prametrami, prve je symbolicka cesta k widgetu , druhe parametre pre dany widget.

Najprv cely kod: (najdete vo views/site/test.php)

```
<?php $this->widget('zii.widgets.grid.CGridView', array(
'dataProvider' => $model->search(),
'id' => 'taskList',
'columns' => array(
array(
'name' => 'id',
'value' => '$data->id',
),
array(
'name' => 'name',
'value' => '$data->name',
),
array(
'class' => 'CButtonColumn',
'template' => '{update} {delete}',
'updateButtonUrl' => 'Yii::app()->request->baseUrl ."/edit?id=".$data->id',
'deleteButtonUrl' => 'Yii::app()->request->baseUrl ."/delete?id=".$data->id',

)
)
)); ?>
```

## Pre CGridView: ##
cesta: 'zii.widgets.grid.CGridView'

parametre, formou stringami indexovaneho pola:
//tie dolezite
  * id=> idcko pre html element
  * dataProvider => objekt typu CActiveDataProvider, k tomu viac niszsie, zatial, len tolko, ze odtialto su cgridviewu poskytovane data
  * columns => pole v ktorom nakonfigurujeme stlpce tabulky.
Kazdy stlpec je opat pole, kde sa zadavaju najma dva indexy:
  * name => nazov stplca v headery tabulky.
  * value => hodnota v kazdom riadku, na konkretny model sa odkazujeme cez $data.

Teda idcko kazdeho modelu by bolo '$data->id' , pozor, musi to byt cele ako string.

Posledny stlpec zvycajne obsahuje male buttoniky na edit / delete / pripadne dalsie veci.

Tu sa nezadavaju name a value, ale:
```
'class' => 'CButtonColumn',
'template' => '{update} {delete}', //tlacidla ake tam chceme mat
```
pokial pouzijeme update a delete ulahci nam to konfiguraciu tychto dvoch buttonov, kedze uz je pre ne urceny image aj dalsie veci, jedine co nam treba zadat su url, opat mame pristup k $data
```
'updateButtonUrl' => 'Yii::app()->request->baseUrl ."/edit?id=".$data->id',
'deleteButtonUrl' => 'Yii::app()->request->baseUrl ."/delete?id=".$data->id', 
```

Co je zaujimave je Yii::app()->request->baseUrl , toto nam vracia domovsku adresu aplikacie, co zabezpeci, ze cesty a odkazy budu spravne bez ohladu na to v akom apache priecinku to ma kazdy z nas / kde to bude na serveri

## CActiveData provider: ##
Potrebuje dva pratametre, prvy bud string ako nazov modelu, ale priamo nejaky model, druhy je stringom indexovane pole, v ktorom zadame 'criteria' (CDbCriteria, vid minuly navod) a pripadne paginaciu (velkost stranky).

Ak si vsimnte, ako dataProvider som do CGridView poslal vysledok model->search(), tu moze byt lubovolna funkcia, alebo priamo new CActiveDataProvider() s parametrami.

Cez funkciu v modeli je to lepsie, lebo mozme lahsie nastavit pripadne filtre.

To ale az v rozsirenom navode.


Celkovy kod k dnesnemu tutorialu je v troch castiach.
  * model-kod: Tasks.php //search
  * controller-kod: SiteController.php //actionTest
  * view-kod: site/test.php


---

Autor: Vladimir Jurenka