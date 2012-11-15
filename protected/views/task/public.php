<?php
/**
 * Zoznam verejných úloh ostatných učiteľov.
 * @author Eva Libantova
 */

$this->breadcrumbs=array(
    'Verejné úlohy'
);

$this->widget('zii.widgets.grid.CGridView', array(
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
            /*
                'class'=>'CLinkColumn',
                'labelExpression'=>'$data->name',
                'urlExpression'=>'"task/view?id=".$data->id',
                'header'=>'name',
             */
        ),
        array(
            'name' => 'rating',
            'type' => 'html',
            'value' => 'CHtml::image(Yii::app()->request->baseUrl . \'/images/star.png\', \'hodnotenie\')',
            //'$data->rating',
        ),
       /* array(
            'class' => 'CButtonColumn',
            'template' => '{update} {delete}',
            'header' => 'Úpravy',
            'updateButtonLabel' => 'Upraviť',
            'updateButtonUrl' => 'Yii::app()->request->baseUrl ."/task/update?id=".$data->id',
            'deleteButtonLabel' => 'Zmazať',
            'deleteButtonUrl' => 'Yii::app()->request->baseUrl ."/task/delete?id=".$data->id',

        )
       */
    )
)); ?>
