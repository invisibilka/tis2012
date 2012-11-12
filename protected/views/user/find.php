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
            'value' => '$data->full_name',
        ),
        array(
            'name' => 'login',
            'value' => '$data->username',
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{update} {delete}',
            'updateButtonUrl' => 'Yii::app()->request->baseUrl ."/user/update?id=".$data->id',
            'deleteButtonUrl' => 'Yii::app()->request->baseUrl ."/user/delete?id=".$data->id',

        )
    )
)); ?>
