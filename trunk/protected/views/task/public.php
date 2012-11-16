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
            'type' => 'raw',
            'name' => 'name',
            'value' => 'CHtml::Link($data->name, Yii::app()->createUrl(\'task/view/id/\' . $data->id), array())'
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
        ),
        array(
            'name' => 'user',
            'value' => '$data->user->full_name'
        )
))); ?>
