<?php
/**
 *@author  Katka
 */
$this->pageTitle = "Zoznam písomiek";
?>
<?php
echo CHtml::link('Vytvoriť novú písomku', $this->createUrl('test/update/'));
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $model->search(),
    'id' => 'Tests',
    'filter' => $model,
    'columns' => array(
        array(
            'type' => 'raw',
            'name' => 'name',
            'value' => 'CHtml::link($data->name ? CHtml::encode($data->name) : "<i>Nepomenovaná písomka</i>", Yii::app()->createUrl(\'test/view/id/\' . $data->id), array())'
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{update} {delete}',
            'updateButtonUrl' => 'Yii::app()->request->baseUrl ."/test/update?id=".$data->id',
            'deleteButtonUrl' => 'Yii::app()->request->baseUrl ."/test/delete?id=".$data->id',

        )
    )
)); ?>
