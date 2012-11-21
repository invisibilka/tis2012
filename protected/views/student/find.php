<?php
/**
 * Zobrazi vsetkych studentov daneho pouzivatela
 * @author V.Jurenka
 */

$this->pageTitle = "Zoznam študentov";
echo '<h2>' . $this->pageTitle . '</h2>';

$this->functionSubmenu = '<ul class="subnavigation functions">';
$this->functionSubmenu .= '<li>' . CHtml::link('Pridať študenta', $this->createUrl('/student/update/')) . '</li>';
$this->functionSubmenu .= '</ul>';


$empty = new StudentLists();
$empty->name = 'Nezaradení študenti';
$empty->id = -1;
array_splice($lists, 0, 0, array($empty));

$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $model->search(),
    'id' => 'taskList',
    'filter' => $model,
    'summaryText' => 'Záznam {start} až {end} z {count} výsledkov',
    'columns' => array(
        array(
            'type' => 'raw',
            'name' => 'name',
            'value' => 'CHtml::Link(CHtml::encode($data->name), Yii::app()->createUrl("/student/update", array("id" => $data->id)), array())'
        ),
        array(
            'name' => 'email',
            'value' => '$data->email',
        ),
        array(
            'name' => 'list_id',
            'value' => '$data->numLists',
            'filter' => CHtml::listData($lists, 'id', 'name')
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => 'Úpravy',
            'deleteConfirmation'=>"js:'Ste si si istý, že chcete vymazať položku?'",
            'updateButtonLabel' => 'Upraviť',
            'deleteButtonLabel' => 'Vymazať',
            'template' => '{delete}',
            'updateButtonUrl' => 'Yii::app()->request->baseUrl ."/student/update?id=".$data->id',
            'deleteButtonUrl' => 'Yii::app()->request->baseUrl ."/student/delete?id=".$data->id',

        )
    )
)); ?>
