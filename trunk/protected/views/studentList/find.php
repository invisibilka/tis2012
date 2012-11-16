<?php
/**
 *@author  V.Jurenka
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
            'updateButtonUrl' => 'Yii::app()->request->baseUrl ."/studentList/edit?id=".$data->id',
            'deleteButtonUrl' => 'Yii::app()->request->baseUrl ."/studentList/delete?id=".$data->id',

        )
    )
)); ?>
