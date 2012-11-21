<?php
/**
 * Zobrazi zonam pouzivatelov
 * @author  Vladimir Jurenka
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
            'type' => 'raw',
            'name' => 'username',
            'value' => 'CHtml::link( CHtml::encode($data->username) , Yii::app()->createUrl("user/view/", array("id"=>$data->id)))'
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
