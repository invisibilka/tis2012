<?php
/**
 * Zoznam úloh prihláseného učiteľa.
 * @author Eva Libantova
 */

$this->breadcrumbs=array(
    'Správa úloh' => Yii::app()->request->baseUrl . '/task',
    'Moje úlohy'
);
echo '<a href="' . Yii::app()->request->baseUrl . '/task/update">Vytvoriť novú úlohu</a><br />';
if($saved){
    echo 'Úloha bola úspešne uložená.';
}

    $this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $model->search(),
    'id' => 'taskList',
    'columns' => array(
        array(
            'name' => 'id',
            'value' => '$data->id',
        ),
        array(
            'type' => 'raw',
            'name' => 'name',
            'value' => 'CHtml::Link($data->name, Yii::app()->createUrl(\'task/view/id/\' . $data->id), array())'
          /*       'class'=>'CLinkColumn',
                   'labelExpression'=>'$data->name',
                   'urlExpression'=>'Yii::app()->request->baseUrl ."/task/view/id/".$data->id',
                   'header'=>'name',
            */
        ),
        array(
            'name' => 'is_public',
            'value' => '$data->is_public',
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{update} {delete}',
            'header' => 'Úpravy',
            'updateButtonLabel' => 'Upraviť',
            'updateButtonUrl' => 'Yii::app()->request->baseUrl ."/task/update?id=".$data->id',
            'deleteButtonLabel' => 'Zmazať',
            'deleteButtonUrl' => 'Yii::app()->request->baseUrl ."/task/delete?id=".$data->id',

        )
    )
)); ?>