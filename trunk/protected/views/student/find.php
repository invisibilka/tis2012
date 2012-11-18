<?php
/**
 * Zobrazi vsetkych studentov daneho pouzivatela
 * @author V.Jurenka
 */
?>
<?php
echo CHtml::link('Pridat studenta', $this->createUrl('/student/update/'));
?>
<?php
$this->pageTitle = "Zoznam studentov";

$empty = new StudentLists();
$empty->name = 'Nezaradeni studenti';
$empty->id = -1;
array_splice($lists, 0, 0, array($empty));

$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $model->search(),
    'id' => 'taskList',
    'filter' => $model,
    'columns' => array(
        array(
            'type' => 'raw',
            'name' => 'name',
            'value' => 'CHtml::Link($data->name, Yii::app()->createUrl("/student/update", array("id" => $data->id)), array())'
        ),
        array(
            'name' => 'email',
            'value' => '$data->email',
        ),
        array(
            'name' => 'list_id',
            'value' => '$data->numLists',
            'filter' => CHtml::listData($lists, 'id', 'name')
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{delete}',
            'updateButtonUrl' => 'Yii::app()->request->baseUrl ."/student/update?id=".$data->id',
            'deleteButtonUrl' => 'Yii::app()->request->baseUrl ."/student/delete?id=".$data->id',

        )
    )
)); ?>