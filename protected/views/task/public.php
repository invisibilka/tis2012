<?php
/**
 * Zoznam verejných úloh ostatných učiteľov.
 * @author Eva Libantova
 */

Yii::app()->clientScript->registerCSSFile(Yii::app()->request->baseUrl . '/css/starrating.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/rating.js', CClientScript::POS_HEAD);
$this->breadcrumbs=array(
    'Správa úloh' => Yii::app()->request->baseUrl . '/task',
    'Verejné úlohy'
);
$this->widget('zii.widgets.grid.CGridView', array(
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
            /*
                'class'=>'CLinkColumn',
                'labelExpression'=>'$data->name',
                'urlExpression'=>'"task/view?id=".$data->id',
                'header'=>'name',
             */
        ),
        array(
            'name' => 'rating',
            'type' => 'raw',
            'value' => "CHtml::tag('ul', array('class' => 'star-rating' ), " .
                          'CHtml::tag(\'li\', array(\'class\' => \'current-rating\', \'id\' => \'current-rating\' . $data->id, \'style\' => \'width: \' . $data->rating*25 . \'px\'), \'Currently \' . $data->rating . \'/5 Stars.\' , true) . ' .
                          "CHtml::tag('li', array(), " .
                             'CHtml::Link(\'1\', \'javascript:rate(1,\' . $data->id . \')\', array(\'title\' => \'1 z 5 hviezdičiek\', \'class\' => \'one-star\'))' .
                          ", true) . " .
                          "CHtml::tag('li', array(), " .
                'CHtml::Link(\'2\', \'javascript:rate(2,\' . $data->id . \')\', array(\'title\' => \'2 z 5 hviezdičiek\', \'class\' => \'two-stars\'))' .
                          ", true) . " .
                          "CHtml::tag('li', array(), " .
                'CHtml::Link(\'3\', \'javascript:rate(3,\' . $data->id . \')\', array(\'title\' => \'3 z 5 hviezdičiek\', \'class\' => \'three-stars\'))' .
                          ", true) . " .
                          "CHtml::tag('li', array(), " .
                'CHtml::Link(\'4\', \'javascript:rate(4,\' . $data->id . \')\', array(\'title\' => \'4 z 5 hviezdičiek\', \'class\' => \'four-stars\'))' .
                          ", true) . " .
                          "CHtml::tag('li', array(), " .
                'CHtml::Link(\'5\', \'javascript:rate(5,\' . $data->id . \')\', array(\'title\' => \'5 z 5 hviezdičiek\', \'class\' => \'five-stars\'))' .
                          ", true)" .
                       ", true)"
             /*
<ul class="star-rating">
    <li><a href="javascript:rateImg(1,' . $taskId . ')" title="1 star out of 5" class="one-star">1</a></li>
    <li><a href="javascript:rateImg(2,' . $taskId . ')" title="2 stars out of 5" class="two-stars">2</a></li>
    <li><a href="javascript:rateImg(3,' . $taskId . ')" title="3 stars out of 5" class="three-stars">3</a></li>
    <li><a href="javascript:rateImg(4,' . $taskId . ')" title="4 stars out of 5" class="four-stars">4</a></li>
    <li><a href="javascript:rateImg(5,' . $taskId . ')" title="5 stars out of 5" class="five-stars">5</a></li>
</ul>
    */
            //'$data->rating',
        ),
       /* array(
            'class' => 'CButtonColumn',
            'template' => '{update} {delete}',
            'header' => 'Úpravy',
            'updateButtonLabel' => 'Upraviť',
            'updateButtonUrl' => 'Yii::app()->request->baseUrl ."/task/update?id=".$data->id',
            'deleteButtonLabel' => 'Zmazať',
            'deleteButtonUrl' => 'Yii::app()->request->baseUrl ."/task/delete?id=".$data->id',

        )
       */
    )
)); ?>
