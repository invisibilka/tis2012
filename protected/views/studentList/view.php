<?php
/**
 * Zoznam študentov v danej skupine. 
 *@author Marek Oravec
 */
/*
$this->breadcrumbs=array(
    'Študenti',
    $model->name
);*/
$this->pageTitle = $model->name;

echo '<h2>'. $model->name .'</h2>';

$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $student->search(),
    'id' => 'studentList',
    'columns' => array(
        array(
            'name' => 'name',
            'value' => '$data->name',
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{update} {delete}',
            'header' => 'Úpravy',
            'deleteConfirmation'=>"js:'Ste si si istý, že chcete vymazať položku?'",
			'updateButtonLabel' => 'Upraviť',
            'updateButtonUrl' => 'Yii::app()->request->baseUrl ."/student/update?id=".$data->id',
			'deleteButtonLabel' => 'Vymazať',
            'deleteButtonUrl' => 'Yii::app()->request->baseUrl ."/studentList/removeStudent?id='.$model->id.'&student_id=".$data->id'
        )
    )
)); ?>
