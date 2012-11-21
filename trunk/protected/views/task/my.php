<?php
/**
 * Zoznam úloh prihláseného učiteľa.
 * @author Eva Libantova
 */

$this->pageTitle = "Moje úlohy";
echo '<h2>' . $this->pageTitle . '</h2>';
/*
$this->breadcrumbs = array(
    'Správa úloh' => Yii::app()->request->baseUrl . '/task',
    'Moje úlohy'
);*/
$this->functionSubmenu = '<ul class="subnavigation functions">';
$this->functionSubmenu .= '<li>' . CHtml::link('Vytvoriť novú úlohu', $this->createUrl('task/update/')) . '</li>';
$this->functionSubmenu .= '</ul>';

if ($saved) {
    echo 'Úloha bola úspešne uložená.';
}

$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $model->search(),
    'filter' => $model,
    'id' => 'Tasks',
    'summaryText' => 'Záznam {start} až {end} z {count} výsledkov',
    'columns' => array(
        array(
            'type' => 'raw',
            'name' => 'name',
            'value' => 'CHtml::Link(CHtml::encode($data->name), Yii::app()->createUrl(\'task/view/id/\' . $data->id), array())'
        ),
        array(
            'name' => 'keyword',
            'value' => '$data->keywordsList',
            // 'filter' => CHtml::listData(Keywords::model()->findAll(), 'name', 'name')
        ),
        array(
            'name' => 'is_public',
            'value' => '$data->is_public ? "Verejná" : "Súkromná" ',
            'filter'=>CHtml::listData(Tasks::model()->getPublicStates(), 'id', 'name'),
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{update} {delete}',
            'header' => 'Úpravy',
            'deleteConfirmation'=>"js:'Ste si si istý, že chcete vymazať položku?'",
            'updateButtonLabel' => 'Upraviť',
            'updateButtonUrl' => 'Yii::app()->request->baseUrl ."/task/update?id=".$data->id',
            'deleteButtonLabel' => 'Zmazať',
            'deleteButtonUrl' => 'Yii::app()->request->baseUrl ."/task/delete?id=".$data->id',

        )
    )
)); ?>
