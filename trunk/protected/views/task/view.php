<?php
/**
 * @author Eva Libantova
 */

Yii::app()->clientScript->registerCSSFile(Yii::app()->request->baseUrl . '/css/starrating.css');

$isMyTask = $model->user_id == Yii::app()->user->id;
/*
if($isMyTask){
$this->breadcrumbs=array(
       'Správa úloh' => Yii::app()->request->baseUrl . '/task',
        'Moje úlohy'=>array('my'),
        $model->name,
    );
} else {
$this->breadcrumbs=array(
        'Správa úloh' => Yii::app()->request->baseUrl . '/task',
        'Vrejné úlohy'=>array('public'),
        $model->name,
    );
}*/
$this->pageTitle = "Úloha";
?>
<div class="task">
    <?php
    echo '<h2>' . CHtml::encode($model->name) . '</h2>';
    echo '<p>' . $model->html . '</p>';
    echo '<b>Klucove slova</b>';
    $keywords = $model->keywordsList;
    echo '<p>' . ($keywords ? $keywords : '<i>nezadane</i>') . '</p>';
    echo '<b>Hodnotenie</b>';
    echo CHtml::tag('ul', array('class' => 'star-rating'),
        CHtml::tag('li', array('class' => 'current-rating', 'id' => 'rating', 'style' => 'width: ' . $model->rating * 25 . 'px'), 'Currently ' . round($model->rating,1) . '/5 Stars.', true) .
            CHtml::tag('li', array(), CHtml::Link('1', 'javascript:rate(1)', array('title' => '1 z 5 hviezdičiek', 'class' => 'one-star')), true).
            CHtml::tag('li', array(), CHtml::Link('2', 'javascript:rate(2)', array('title' => '2 z 5 hviezdičiek', 'class' => 'two-stars')), true).
            CHtml::tag('li', array(), CHtml::Link('3', 'javascript:rate(3)', array('title' => '3 z 5 hviezdičiek', 'class' => 'three-stars')), true).
            CHtml::tag('li', array(), CHtml::Link('4', 'javascript:rate(4)', array('title' => '4 z 5 hviezdičiek', 'class' => 'four-stars')), true).
            CHtml::tag('li', array(), CHtml::Link('5', 'javascript:rate(5)', array('title' => '5 z 5 hviezdičiek', 'class' => 'five-stars')), true),
        true);
    if ($isMyTask) echo '<a href="' . Yii::app()->createUrl('task/update/id/' . $model->id) . '">Upraviť</a>';
    ?>
</div>

<div class="form">
    <h3>Pridať komentár</h3>
    <?php
    $form = $this->beginWidget('CActiveForm', array('id' => 'TasksComments')); ?>

    <?php echo $form->errorSummary($newComment); ?>

    <div class="row">
        <?php echo $form->labelEx($newComment, 'text'); ?>
        <?php echo $form->textArea($newComment, 'text', array('rows' => "5")); ?>

    </div>

    <div class="row submit">
        <?php echo CHtml::submitButton('Odoslať'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div>
<div class="comments">
    <h3>Komentáre</h3>
    <?php
    if (count($comments) == 0) {
        echo '<i>Túto úlohu ešte nikto neokomentoval.</i>';
    }
    foreach ($comments as $comment) {
        echo '<div class="comment"><div class="commentHead"><b>' . CHtml::encode($comment->user->full_name) . '</b>   ' . date('j. M Y', strtotime($comment->date)) . '</div>' .
            '<div class="commentBody">' . CHtml::encode($comment->text) . '</div></div>';
    }
    ?>
</div>


<script type="text/javascript">
    function rate(rating) {
        $.ajax({
            type:"GET",
            url:"<?php echo Yii::app()->baseUrl . '/task/rating/'; ?>",
            data:{ task_id: <?php echo $model->id; ?>, rating:rating }
        }).done(function (msg) {
                rating = ((parseFloat(msg) * 25)) | 0;
                $('#rating').width(rating + 'px');
            });
    }
</script>
