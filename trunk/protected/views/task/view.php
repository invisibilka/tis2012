<?php
/**
 * @author Eva Libantova
 */

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
?>
<div class="task">
    <?php
    echo '<h2>' . $model->name . '</h2>';
    echo '<p>' . $model->html . '</p>';
    echo '<b>Klucove slova</b>';
    $keywords = $model->keywordsList;
    echo '<p>' . ($keywords ? $keywords : '<i>nezadane</i>') . '</p>';
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
        echo '<div class="comment"><div class="commentHead"><b>' . $comment->user->full_name . '</b>   ' . $comment->date . '</div>' .
            '<div class="commentBody">' . $comment->text . '</div></div>';
    }
    ?>
</div>

