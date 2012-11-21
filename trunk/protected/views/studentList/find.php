<?php
/**
 *@author  V.Jurenka
 */
$this->pageTitle = 'Zoznamy študentov';
echo '<h2>' . $this->pageTitle . '</h2>';

$this->functionSubmenu = '<ul class="subnavigation functions">';
$this->functionSubmenu .= '<li>' . CHtml::link('Vytvoriť nový zoznam', $this->createUrl('studentList/update/')) . '</li>';
$this->functionSubmenu .= '</ul>';

$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $model->search(),
    'id' => 'taskList',
    'filter' => $model,
    'summaryText' => 'Záznam {start} až {end} z {count} výsledkov',
    'columns' => array(
        array(
            'type' => 'raw',
            'name' => 'name',
            'value' => 'CHtml::Link(CHtml::encode($data->name), Yii::app()->createUrl("/studentList/update", array("id" => $data->id)), array())'
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{delete}',
            'header' => 'Úpravy',
            'deleteConfirmation'=>"js:'Ste si si istý, že chcete vymazať položku?'",
            'updateButtonLabel' => 'Upraviť',
            'deleteButtonLabel' => 'Vymazať',
            'updateButtonUrl' => 'Yii::app()->request->baseUrl ."/studentList/update?id=".$data->id',
            'deleteButtonUrl' => 'Yii::app()->request->baseUrl ."/studentList/delete?id=".$data->id',

        )
    )
)); ?>
