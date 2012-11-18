<?php
/**
 * Zobrazi vsetkych studentov daneho pouzivatela
 * @author V.Jurenka
 */
?>
<?php
$this->pageTitle = "Zoznam studentov";

$models = StudentLists::model()->findAll();
$empty = new StudentLists();
$empty->name = 'Nezaradeni studenti';
$empty->id = -1;
array_splice($models, 0, 0, array($empty));

$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $model->search(),
    'id' => 'taskList',
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'name',
            'value' => '$data->name',
        ),
        array(
            'name' => 'email',
            'value' => '$data->email',
        ),
        array(
            'name' => 'list_id',
            'value' => '$data->numLists',
            'filter' => CHtml::listData($models, 'id', 'name')
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{update} {delete}',
            'updateButtonUrl' => 'Yii::app()->request->baseUrl ."/student/update?id=".$data->id',
            'deleteButtonUrl' => 'Yii::app()->request->baseUrl ."/student/delete?id=".$data->id',

        )
    )
)); ?>
