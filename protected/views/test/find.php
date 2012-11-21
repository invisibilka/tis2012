<?php
/**
 *@author  Katka
 */
$this->pageTitle = "Zoznam písomiek";
echo '<h2>' . $this->pageTitle . '</h2>';

$this->functionSubmenu = '<ul class="subnavigation functions">';
$this->functionSubmenu .= '<li>' . CHtml::link('Vytvoriť novú písomku', $this->createUrl('test/update/')) . '</li>';
$this->functionSubmenu .= '</ul>';

?><div class="form"><?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $model->search(),
    'id' => 'Tests',
    'filter' => $model,
    'summaryText' => 'Záznam {start} až {end} z {count} výsledkov',
    'columns' => array(
        array(
            'type' => 'raw',
            'name' => 'name',
            'value' => 'CHtml::link($data->name ? CHtml::encode($data->name) : "<i>Nepomenovaná písomka</i>", Yii::app()->createUrl(\'test/view/id/\' . $data->id), array())'
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{update} {delete}',
            'header' => 'Úpravy',
            'deleteConfirmation'=>"js:'Ste si si istý, že chcete vymazať položku?'",
            'updateButtonLabel' => 'Upraviť',
            'deleteButtonLabel' => 'Vymazať',
            'updateButtonUrl' => 'Yii::app()->request->baseUrl ."/test/update?id=".$data->id',
            'deleteButtonUrl' => 'Yii::app()->request->baseUrl ."/test/delete?id=".$data->id',

        )
    ), 
	'cssFile' =>false
)); ?>
</div>