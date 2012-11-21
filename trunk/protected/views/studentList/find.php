<?php
/**
 *@author  V.Jurenka
 */

?>
<?php
    echo CHtml::link('Vytvorit novy zoznam', $this->createUrl('studentList/update/'));
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $model->search(),
    'id' => 'taskList',
    'filter' => $model,
    'columns' => array(
        array(
            'type' => 'raw',
            'name' => 'name',
            'value' => 'CHtml::Link(CHtml::encode($data->name), Yii::app()->createUrl("/studentList/update", array("id" => $data->id)), array())'
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{delete}',
            'updateButtonUrl' => 'Yii::app()->request->baseUrl ."/studentList/update?id=".$data->id',
            'deleteButtonUrl' => 'Yii::app()->request->baseUrl ."/studentList/delete?id=".$data->id',

        )
    )
)); ?>
