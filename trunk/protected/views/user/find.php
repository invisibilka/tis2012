<?php
/**
 *@author  Vladimir Jurenka
 */
$this->pageTitle = "Zoznam pouzivatelov";

$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $model->search(),
    'id' => 'taskList',
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'id',
            'value' => '$data->id',
        ),
        array(
            'name' => 'username',
            'value' => '$data->username',
        ),
        array(
            'name' => 'full_name',
            'value' => '$data->full_name',
        ),
        array(
            'name' => 'email',
            'value' => '$data->email',
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{update} {delete}',
            'updateButtonUrl' => 'Yii::app()->request->baseUrl ."/user/update?id=".$data->id',
            'deleteButtonUrl' => 'Yii::app()->request->baseUrl ."/user/delete?id=".$data->id',

        )
    )
)); ?>
