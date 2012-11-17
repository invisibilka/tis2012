<?php
/**
 *@author  Katka
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
            'updateButtonUrl' => 'Yii::app()->request->baseUrl ."/test/update?id=".$data->id',
            'deleteButtonUrl' => 'Yii::app()->request->baseUrl ."/test/delete?id=".$data->id',

        )
    )
)); ?>
