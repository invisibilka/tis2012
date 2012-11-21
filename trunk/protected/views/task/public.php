<?php
/**
 * Zoznam verejných úloh ostatných učiteľov.
 * @author Eva Libantova
 */

$this->pageTitle = "Verejné úlohy";
echo '<h2>' . $this->pageTitle . '</h2>';

Yii::app()->clientScript->registerCSSFile(Yii::app()->request->baseUrl . '/css/starrating.css');

$this->functionSubmenu = '<ul class="subnavigation functions">';
$this->functionSubmenu .= '<li>' . CHtml::link('Vytvoriť novú úlohu', $this->createUrl('task/update/')) . '</li>';
$this->functionSubmenu .= '</ul>';
/*
$this->breadcrumbs = array(
    'Správa úloh' => Yii::app()->request->baseUrl . '/task',
    'Verejné úlohy'
);*/
?><div class="form"><?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $model->search(),
    'id' => 'Tasks',
    'filter' => $model,
    'summaryText' => 'Záznam {start} až {end} z {count} výsledkov',
    'columns' => array(
        array(
            'type' => 'raw',
            'name' => 'name',
            'value' => 'CHtml::Link(CHtml::encode($data->name), Yii::app()->createUrl(\'task/view/id/\' . $data->id), array())'
        ),
        array(
            'name' => 'keyword',
            'value' => '$data->keywordsList',
            // 'filter' => CHtml::listData(Keywords::model()->findAll(), 'name', 'name')
        ),
        array(
            'name' => 'rating',
            'type' => 'raw',
            'value' => "CHtml::tag('ul', array('class' => 'star-rating' ), " .
                'CHtml::tag(\'li\', array(\'class\' => \'current-rating\', \'id\' => \'current-rating\' . $data->id, \'style\' => \'width: \' . $data->rating*25 . \'px\'), \'Currently \' . round($data->rating,1) . \'/5 Stars.\' , true) . ' .
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
            'type' => 'raw',
            'name' => 'username',
            'value' => '$data->user ? CHtml::link( CHtml::encode($data->user->full_name) , Yii::app()->createUrl("user/view/", array("id"=>$data->user_id))): "Neznámy autor"'
        )
    ), 
	'cssFile' =>false)); ?>
</div>

<script type="text/javascript">
    function rate(rating, id) {
        $.ajax({
            type:"GET",
            url:"<?php echo Yii::app()->baseUrl . '/task/rating/'; ?>",
            data:{ task_id:id, rating:rating }
        }).done(function (msg) {
                rating = ((parseFloat(msg) * 25)) | 0;
                $('#current-rating' + id).width(rating + 'px');
            });
    }
</script>