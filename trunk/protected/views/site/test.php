<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Vladimir
 * Date: 5.11.2012
 * Time: 11:01
 * To change this template use File | Settings | File Templates.
 */
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
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
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{update} {delete}',
            'updateButtonUrl' => 'Yii::app()->request->baseUrl ."/edit?id=".$data->id',
            'deleteButtonUrl' => 'Yii::app()->request->baseUrl ."/delete?id=".$data->id',

        )
    )
)); ?>
