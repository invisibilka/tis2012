<?php
/**
 * Zobrazi vsetkych studentov daneho pouzivatela
 * @author V.Jurenka
 */
?>
<?php
echo CHtml::link('Pridať študenta', $this->createUrl('/student/update/'));
?>
<?php
$this->pageTitle = "Zoznam študentov";

$empty = new StudentLists();
$empty->name = 'Nezaradení tudenti';
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
            'value' => 'CHtml::Link(CHtml::encode($data->name), Yii::app()->createUrl("/student/update", array("id" => $data->id)), array())'
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
            'header' => 'Úpravy',
            'deleteConfirmation'=>"js:'Ste si si istý, že chcete vymazať položku?'",
            'updateButtonLabel' => 'Upraviť',
            'deleteButtonLabel' => 'Vymazať',
            'template' => '{delete}',
            'updateButtonUrl' => 'Yii::app()->request->baseUrl ."/student/update?id=".$data->id',
            'deleteButtonUrl' => 'Yii::app()->request->baseUrl ."/student/delete?id=".$data->id',

        )
    )
)); ?>
