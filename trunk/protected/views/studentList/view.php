<?php
/**
 *@author Marek Oravec
 */

echo '<h2>'. $model->name .'</h2>';

$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $student->search(),
    'id' => 'studentList',
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
			'updateButtonLabel' => 'Upraviť',
            'updateButtonUrl' => 'Yii::app()->request->baseUrl ."/student/edit?id=".$data->id',
			'deleteButtonLabel' => 'Vymazať',
            'deleteButtonUrl' => 'Yii::app()->request->baseUrl ."/student/delete?id=".$data->id'
        )
    )
)); ?>
