<?php
/**
 * Zobrazi zonam pouzivatelov
 * @author  Vladimir Jurenka
 */
$this->pageTitle = "Zoznam používateľov";
echo '<h2>' . $this->pageTitle . '</h2>';

?><div class="form"><?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $model->search(),
    'id' => 'taskList',
    'filter' => $model,
    'cssFile' => '',
    'summaryText' => 'Záznam {start} až {end} z {count} výsledkov',
    'emptyText' => 'Žiadne výsledky',
    'columns' => array(
        array(
            'name' => 'id',
            'value' => '$data->id',
        ),
        array(
            'type' => 'raw',
            'name' => 'username',
            'value' => 'CHtml::link( CHtml::encode($data->username) , Yii::app()->createUrl("user/view/", array("id"=>$data->id)))'
        ),
        array(
            'name' => 'full_name',
            'value' => '$data->full_name',
        ),
        array(
            'name' => 'email',
            'value' => '$data->email',
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => 'Úpravy',
            'deleteConfirmation'=>"js:'Ste si si istý, že chcete vymazať položku?'",
            'template' => '{update} {delete}',
            'updateButtonLabel' => 'Upraviť',
            'deleteButtonLabel' => 'Vymazať',
            'updateButtonUrl' => 'Yii::app()->request->baseUrl ."/user/update?id=".$data->id',
            'deleteButtonUrl' => 'Yii::app()->request->baseUrl ."/user/delete?id=".$data->id',

        )
    ), 
	'cssFile' =>false
)); ?>
</div>